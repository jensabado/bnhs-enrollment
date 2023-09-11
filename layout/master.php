<?php
require_once('./database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $page_title; ?> - Bacoor National High School</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.php"> <a href="index.html" class="logo me-auto">
                        <img src="assets/img/bnhs-logo.png" alt="" class="img-fluid">
                    </a> BNHS</a></h1>


            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="./#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="./#about">About</a></li>
                    <li><a class="nav-link scrollto" href="./#announcement">Announcement</a></li>
                    <li><a class="nav-link scrollto" href="./#admission">Admission</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Login</a>

        </div>
    </header><!-- End Header -->

    <?php echo $content; ?>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-2 col-md-6 footer-links">
                        <a href="index.html"><img src="assets/img/logo.png" alt="" width="200px"></a>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h3>BNHS-Molino Main</h3>
                        <p>
                            Molino Road <br>
                            Molino 1 4102 Bacoor,<br>
                            Philippines <br><br>
                            <strong>Phone:</strong> (046) 417 6149<br>
                            <strong>Email:</strong> 301171@deped.gov.ph<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="./index">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="./index#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="./index#announcement">Announcement</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="./index#admission">Admission</a></li>
                        </ul>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no"
                                    marginheight="0" marginwidth="0"
                                    src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=bacoor national high school molino&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                    href="https://connectionsgame.org/">Connections Game</a></div>
                            <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 300px;
                            }

                            .gmap_iframe {
                                height: 300px !important;
                            }
                            </style>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Bacoor National High School - Molino Main</span></strong>. All Rights
                    Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="https://www.google.com/maps/place/Bacoor+National+High+School+-+Main/@14.4227532,120.9406304,14z/data=!4m10!1m2!2m1!1sbacoor+national+high+school+mission!3m6!1s0x3397d279a3f75eff:0x10ef3a203beeee93!8m2!3d14.4227532!4d120.9756493!15sCiNiYWNvb3IgbmF0aW9uYWwgaGlnaCBzY2hvb2wgbWlzc2lvbpIBBnNjaG9vbOABAA!16s%2Fg%2F1tcxm5x6?entry=ttu"
                    class="twitter"><i class="bx bxl-google"></i></a>
                <a href="https://www.facebook.com/BacoorNHS.main.OFFICIAL" class="facebook"><i
                        class="bx bxl-facebook"></i></a>
                <a href="https://twitter.com/i/flow/login?redirect_after_login=%2Fbnhsmain" class="twitter"><i
                        class="bx bxl-twitter"></i></a>
                <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <?php echo $script; ?>

</body>

</html>