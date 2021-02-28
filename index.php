<!DOCTYPE html>
<html lang="en">

<?php date_default_timezone_set('Europe/Bucharest'); ?>
<?php include_once "shared/company.php"; ?>
<?php include_once "shared/program.php"; ?>
<?php include_once "components/head.php"; ?>
 
<body >

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <a href="index.php" class="logo me-auto"><img src="images/cariere-small-white.png" class="img-fluid"></a>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="#header">Acasă</a></li>
                <li><a href="#about">Despre</a></li>
                <li><a href="#details">Detalii</a></li>
                <li><a href="#partners">Parteneri</a></li>
                <li><a href="#program">Program</a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column align-items-center" style="min-height: 100vh">

    <div class="container">
      <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center pt-lg-0 order-1 order-lg-1 aos-init aos-animate">
              <div data-aos="fade-right" data-aos-delay="200">
                  <img src="images/cariere-white.png" style="width: 350px" alt="" class="img-fluid">
                  <br><br>
                  <a href="#about" class="btn-get-started scrollto mt-5">Despre Cariere</a>
                  <a href="https://youtu.be/utLKZIhdjGE" class="venobox btn-watch-video vbox-item mb-5" data-vbtype="video" data-autoplay="true"> Vezi video <i class="icofont-play-alt-2"></i></a>
              </div>
          </div>
        <div class="col-lg-6 order-2 order-lg-2 hero-img mt-5" style="text-align: left!important;" data-aos="fade-up" data-aos-delay="600">
          <div class="wsize1 bor1" style="height: 450px">
				<div class="panel">
					<i class="fa fa-circle" style="color:rgb(237,106,94);margin-left: 15px"></i>
					<i class="fa fa-circle" style="color:rgb(245,189,79);margin-left: 5px"></i>
					<i class="fa fa-circle" style="color:rgb(98,198,85);margin-left: 5px"></i>
				</div>
				<div class="terminal">
					<div id="history">
					</div>
					<div class="line">
						<span id="path">Cariere>&nbsp;</span>
						<input type="text" id="input">
					</div>
				</div>
              <p class="text-center" style="color: rgba(230,230,230,0.3);font-size: 12px">* Press enter to submit command</p>
			</div>
        </div>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= clients Section ======= -->
    <section id="top-clients" class="top-clients bg-light" style="padding: 5px 0">
        <div class="container">

            <div class="row" data-aos="zoom-in">


          <div class="col-4 d-flex align-items-center justify-content-center">
              <a href="https://www.asmi.ro/"  target="_blank">
                  <img src="images/asmi-long.png" width="300px" class="img-fluid" alt="">
              </a>
          </div>

          <div class="col-4 d-flex align-items-center justify-content-center">
              <a href="https://fmi.unibuc.ro/" target="_blank">
                  <img src="images/FMI2.png" width="450px" class="img-fluid" alt="">
              </a>
          </div>

          <div class="col-4 d-flex align-items-center justify-content-center">
              <a href="https://unibuc.ro/" target="_blank">
                  <img src="images/logo-unibuc.png" width="200px" class="img-fluid" alt="">
              </a>
              </div>

            </div>

        </div>
    </section><!-- End clients Section -->

    <section id="about" class="about">

        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Despre Cariere</h2>
            </div>
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h2>Obiective</h2>
                        <p>
                            Cariere este un târg de joburi și internship-uri care oferă un sprijin în dezvoltarea pe
                            plan profesional a studenților, realizând o legătura între aceștia (participanți) și o parte
                            din cele mai cunoscute companii din piața IT din Romania
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center mt-5 mt-md-0" style="justify-content: center" data-aos="zoom-out"
                     data-aos-delay="200">
                    <img style="height: 400px" src="images/about-us-1.png" class="img-fluid" alt="">
                </div>

            </div>
        </div>

    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="details" class="why-us bg-light">
        <div class="container-fluid" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-5 align-items-stretch order-2 order-lg-1 img"
                     style='background-image: url("images/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;
                </div>
                <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-1 order-lg-2">

                    <div class="content">
                        <h3 class="text-dark">Detalii <strong>Eveniment</strong></h3>
                    </div>
                    <div class="accordion-list">
                        <ul>
                            <li>
                                <strong class="strong-blue"><span class="fas fa-book-open"></span>Prezentări</strong> de
                                30 de minute ale companiilor participante unde puteti afla detalii despre oportunitalite
                                oferite
                            </li>
                            <li>
                                <strong class="strong-blue"><span class="fas fa-desktop"></span>Sesiuni</strong> de
                                networking unde poti intra in contact direct cu firmele prezente pentru a primi
                                raspunsuri la toate intrebarile tale
                            </li>
                            <li>
                                <strong class="strong-blue"><span class="fas fa-code"></span>Workshop-uri</strong>
                                menite sa-ti dezvolte atat cunostintele tehnice, cat si abilitatile de comunicare
                            </li>
                            <li>
                                <strong class="strong-blue"><span class="fas fa-laptop"></span>Concursuri</strong> pe
                                toata durata evenimentului
                            </li>

                        </ul>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Partners Section ======= -->
    <section id="partners" class="team section-bg">
        <div class="container" data-aos="zoom-in">
            <div class="section-title">
                <h2>Partenerii noștri</h2>
                <p>Apasă pe logo-ul companiilor pentru a vedea ofertele lor de angajare!</p>
            </div>
            <?php $companies = glob("companies/*.json"); ?>

            <?php foreach(["gold", "silver", "bronze"] as $package): ?>
                <div class="row py-5 mb-5" data-aos="zoom-in">
                    <h3 class="mb-4" style="color: white; text-align: center;">[ &nbsp Parteneri <span style="color: <?php echo package_color($package); ?>;"><?php echo ucfirst($package); ?></span> &nbsp ]</h3>
                    <?php foreach ($companies as $company): ?>
                        <?php $company_details = get_company_details($company); ?>
                        <?php if($company_details["type"]==$package): ?>
                            <div class="col-lg-6 pt-4">
                                <div class="member d-flex align-items-center justify-content-center" style="padding-bottom: 40px;height: 190px" data-aos="zoom-in"
                                     data-aos-delay="100">
                                    <div style="width:180px; padding-top:10px; ">
                                        <a target="_blank" href="details.php?company=<?php echo $company_details['id']; ?>">
                                            <img src="<?php echo $company_details['logo']; ?>" style="max-height: 100px" class="img-fluid" >
                                        </a>
                                    </div>
                                    <div class="member-info pt-3" style="width: 250px;">
                                        <a target="_blank" href="details.php?company=<?php echo $company_details['id']; ?>">
                                            <h4><?php echo $company_details['name']; ?></h4></a>
                                        <hr style="margin-top: 0; margin-bottom: 25px; border-top: 1px solid grey">
                                        <span>
                                            <i class="fas fa-medal" style="color: <?php echo package_color($company_details["type"]); ?>"></i>
                                            &nbsp; Partener <?php echo ucfirst($company_details["type"]); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

        </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Program Section ======= -->
    <section id="program" class="pricing">
        <div class="container d-flex flex-column" data-aos="fade-up">
            <?php program_object::collect_programs("programs/*.json"); ?>

            <div class="row order-2">
                <div class="row" style="padding-right: 0!important;padding-top: 10px!important">
                    <?php while (program_object::it_next_program()): ?>
                        <div class="col-lg-4 mt-3" style="padding-right: 0!important" data-aos="fade-up" data-aos-delay="100">
                            <div class="box" style="padding-bottom: 0!important;">
                                <h3>
                                    <?php program_object::draw_title() ;?>
                                </h3>
                                <h6 class="text-muted mt-0 mb-0">
                                    <?php program_object::draw_subtitle() ;?>
                                </h6>
                                <ul>
                                    <?php program_object::draw_events() ;?>
                                </ul>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <br><br>
            </div>

            <div class="section-title order-1">
                <h2>Programul evenimentului</h2>
                <p><?php program_object::draw_curent_events_shortcuts(); ?></p>
            </div>
    </section>
    <!-- End Program Section -->

</main><!-- End #main -->

<?php include_once "components/footer.php"; ?>

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

<?php include_once "components/scripts.php"; ?>

</body>

</html>
