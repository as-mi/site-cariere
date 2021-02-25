<!DOCTYPE html>
<html lang="en">

<?php include_once "shared/company.php"; ?>

<?php
    $company = $_GET["company"];
    $company_details = get_company_details("companies/".$company.".json");
    $GLOBALS["title"] = $company_details["name"];
    $GLOBALS["icon"] = $company_details["logo"];
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
        <div class="pt-3 container">
            <div class="row">
                <div class="col-6">
                    <ol>
                        <li><a href="/">Acasă</a></li>
                        <li class="text-white"><?php echo $company_details["name"]; ?></li>
                    </ol>
                    <h2 class="text-white"><?php echo $company_details["name"]; ?></h2>
                </div>
                <div class="col-6">
                    <img src="<?php echo $company_details["logo-header"]; ?>" width="200px" class="float-end">
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="portfolio-details-container">

                <div class="owl-carousel portfolio-details-carousel">
                    <?php if(isset($company_details["video"])): ?>
                        <video width="100%" height="auto" controls autoplay>
                            <source src="<?php echo $company_details["video"]; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php elseif(isset($company_details["banner"])): ?>
                        <?php foreach ($company_details["banner"] as $banner_img): ?>
                            <img src="<?php echo $banner_img; ?>" class="img-fluid" alt="" style="max-height: 600px">
                        <?php endforeach; ?>
                    <?php else: ?>
                        <img src="images/banner-illustration.svg" class="img-fluid" alt="" style="max-height: 600px">
                    <?php endif; ?>
                </div>

                <div class="portfolio-info">
                    <img src="<?php echo $company_details["logo"]; ?>" width="100px">
                    <br><br>
                    <ul>
                        <!--<li><strong>Categorie</strong>: <?php echo $company_details["category"]; ?></li>
                        <li><strong>Client</strong>: ASU Company</li>
                        <li><strong>Project date</strong>: 01 March, 2020</li>-->
                        <li><strong>URL</strong>: <a href="<?php echo $company_details["url"]; ?>" target="_blank"><?php echo str_replace("https://", "", $company_details["url"]); ?></a></li>
                    </ul>
                </div>

            </div>

            <div class="portfolio-description">
                <br><br>

                <?php
                if(isset($company_details["template"])):
                    echo $company_details["template"];
                endif;
                ?>
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