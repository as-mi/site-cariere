<?php

    function get_program_details($company){
        $string = file_get_contents($company);
        $program_details = json_decode($string, true);
        $program_details['date'] = DateTime::createFromFormat('Y-m-d', $program_details['date']);

        $today = new DateTime('now');
        $program_details['date']->setTime(0, 0, 0);
        $today->setTime(0, 0, 0);
        $date_case = 0;

        if ($today > $program_details['date']) {
            $date_case = 0;
        }else if($today == $program_details['date']) {
            $date_case = 1;
        }else {
            $date_case = 2;
        }

        $program_details += array('date_case' => $date_case);

        return $program_details;
    }

    function get_event_draw_decision($program_details, $event) {
        $format_wrapper = array(
            '<li class="na"><i class="bx bx-x"></i><a href="%s"><span>%s</span></a></li>',
            '<li><i class="bx bx-timer text-danger"></i><a href="%s"><span>%s</span></a></li>',
            '<li><i class="bx bx-time-five"></i><a href="%s"><span>%s</span></a></li>'
        );

        $format_index = $program_details['date_case'];

        try {
            if ($format_index == 1){
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
            }
        } catch (Exception $exception) {
            $format_index = 0;
        }

        return sprintf($format_wrapper[$format_index], $event['url'], $event['title'].' - '.$event['start'].' : '.$event['end']);
    }
?>