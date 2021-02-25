<?php

    class program_object {
        static $paths = [];
        static $paths_id = 0;
        static $events_running = [];
        static $current_program = NULL;
        static $event_templates = array(
            '<li class="na"><i class="bx bx-x" style="margin-top: 3px"></i><a href="%s" target="_blank" style="text-decoration: none" class="text-muted"><span>%s</span></a></li>',
            '<li><i class="bx bx-timer text-danger" style="margin-top: 2px"></i><a href="%s" target="_blank"><span>%s</span></a></li>',
            '<li><i class="bx bx-time-five" style="margin-top: 3px"></i><a href="%s" target="_blank"><span>%s</span></a></li>'
        );

        static function collect_programs ($programs_glob_pattern) {
            program_object::$paths = glob($programs_glob_pattern);
        }

        static function it_next_program() {
            if (program_object::$paths_id >= count(program_object::$paths)){
                return FALSE;
            }

            $string = file_get_contents(program_object::$paths[program_object::$paths_id]);
            $program = json_decode($string, true);
            $program['date'] = DateTime::createFromFormat('Y-m-d', $program['date']);

            $today = new DateTime('now');
            $program['date']->setTime(0, 0, 0);
            $today->setTime(0, 0, 0);

            if ($today > $program['date']) {
                $date_case = 0;
            }else if($today == $program['date']) {
                $date_case = 1;
            }else {
                $date_case = 2;
            }

            $program += array('date_case' => $date_case);

            program_object::$paths_id += 1;
            program_object::$current_program = $program;

            return TRUE;
        }

        static function handle_event_draw_decision($initial_format_decision, $event) {
            $format_index = $initial_format_decision;

            if ($format_index == 1){
                try {
                    $start = new DateTime($event['start']);
                    $end = new DateTime($event['end']);
                    $now = new DateTime(date("H:i"));

                    if ($start > $end) {
                        $format_index = 0;
                    } else {
                        if ( $start < $now && $end < $now ) {
                            $format_index = 0;
                        } else if ($start <= $now && $end >= $now) {
                            $format_index = 1;
                        } else if ($start > $now && $end > $now) {
                            $format_index = 2;
                        }
                    }
                } catch (Exception $exception) {
                    $format_index = 0;
                }
            }

            return $format_index;
        }

        static function draw_events() {
            foreach (program_object::$current_program['events'] as $event) {
                $initial_format_decision = program_object::$current_program['date_case'];

                $decision = program_object::handle_event_draw_decision($initial_format_decision, $event);

                if ($decision == 1) {
                    array_push(program_object::$events_running, $event);
                }

                echo sprintf(program_object::$event_templates[$decision], $event['url'], $event['title'].' - '.$event['start'].' : '.$event['end']);
            }
        }

        static function draw_title() {
            echo program_object::$current_program['date']->format('d ')."Martie";
        }

        static function draw_subtitle() {
            if(isset(program_object::$current_program['subtitle']))
                echo program_object::$current_program['subtitle'];
        }

        static function draw_curent_events_shortcuts() {
            $events_count = count(program_object::$events_running);

            switch ($events_count){
                case 0: {
                    echo "Nu sunt evenimente în desfăsurare acum!";
                    return;
                }
                case 1: {
                    echo "Alătură-te prezentării ";
                    break;
                }
                default:
                    echo "Alătură-te prezentărilor ";
            }

            for ($i = 0; $i < $events_count; $i++) {
                $event = program_object::$events_running[$i];
                $delimiter = (($i+1) === $events_count) ? ' ' : ', ';

                echo sprintf("<a href='%s' target='_blank'>%s</a>%s", $event['url'], $event['title'], $delimiter);
            }
        }
    }
?>