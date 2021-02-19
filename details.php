<!DOCTYPE html>
<html lang="en">

<?php include_once "shared/company.php"; ?>

<?php
    $company = $_GET["company"];
    $company_details = get_company_details("companies/".$company.".json");
    $GLOBALS["title"] = $company_details["name"];
?>

<?php include_once "components/head.php"; ?>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages bg-white">
    <div class="container d-flex align-items-center">
        <a href="index.php" class="logo me-auto"><img src="images/cariere-small.png"  alt="" class="img-fluid"></a>
    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs" style="margin-top:60px">
        <div class="container pt-3">
            <ol>
                <li><a href="/">Acasă</a></li>
                <li class="text-white"><?php echo $company_details["name"]; ?></li>
            </ol>
            <h2 class="text-white"><?php echo $company_details["name"]; ?></h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="portfolio-details-container">

                <div class="owl-carousel portfolio-details-carousel">
                    <img src="https://atta.systems/wp-content/uploads/2019/06/banner-illustration.svg" class="img-fluid" alt="" style="max-height: 600px">
                    <!--<img src="assets/img/portfolio/portfolio-details-2.jpg" class="img-fluid" alt="">
                    <img src="assets/img/portfolio/portfolio-details-3.jpg" class="img-fluid" alt="">-->
                </div>

                <div class="portfolio-info">
                    <h3>Atta Systems</h3>
                    <ul>
                        <li><strong>Category</strong>: <?php echo $company_details["category"]; ?></li>
                        <li><strong>Client</strong>: ASU Company</li>
                        <li><strong>Project date</strong>: 01 March, 2020</li>
                        <li><strong>Project URL</strong>: <a href="<?php echo $company_details["url"]; ?>" target="_blank"><?php echo str_replace("https://", "", $company_details["url"]); ?></a></li>
                    </ul>
                </div>

            </div>

            <div class="portfolio-description">
                <?php echo $company_details["template"]; ?>
            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->

<?php include_once "components/footer.php"; ?>

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
<div id="preloader"></div>

<?php include_once "components/scripts.php"; ?>

</body>

</html>