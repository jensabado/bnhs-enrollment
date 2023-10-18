<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/bnhs-enrollment/database/connection.php');

if(!isset($_SESSION['bnhses_admin_id'])) {
    echo "<script>
    location.href = 'admin-login';
    </script>";
} else {
    $admin_id = $_SESSION['bnhses_admin_id'];
    $get_admin_info = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE id = $admin_id");
    $fetch_admin_info = mysqli_fetch_array($get_admin_info);
    $admin_name = $fetch_admin_info['name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $page_title; ?></title>

  <!-- Google Font -->
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= $rootSiteURLAdmin ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" r$rootSiteURLAdminel="stylesheet"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= $rootSiteURLAdmin ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= $rootSiteURLAdmin ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= $rootSiteURLAdmin ?>assets/modules/owlcarousel2/dist/<?= $rootSiteURLAdmin ?>assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= $rootSiteURLAdmin ?>assets/modules/owlcarousel2/dist/<?= $rootSiteURLAdmin ?>assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= $rootSiteURLAdmin ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= $rootSiteURLAdmin ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= $rootSiteURLAdmin ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= $rootSiteURLAdmin ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= $rootSiteURLAdmin ?>assets/css/components.css">
</head>

<body>
  <div id="app">
    <button id="scrollToTopButton">Scroll to Top</button>
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                  class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?= $rootSiteURLAdmin ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1" alt="">
              <div class="d-sm-none d-lg-inline-block"><?= $admin_name ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="./controller/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="./"><img src="<?= $rootSiteURL ?>assets/img/logo.png" alt="" style="width: 50px;"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="./"><img src="<?= $rootSiteURL ?>assets/img/logo.png" alt="" style="width: 30px;"></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="<?= $rootSiteURLAdmin ?>"><i class="fas fa-solid fa-fire-flame-curved"></i></i>
                <span>Dashboard</span></a></li>
            <li class="menu-header">School Information</li>
            <li><a class="nav-link" href="<?= $rootSiteURLAdmin ?>building"><i class="fas fa-solid fa-building"></i>
                <span>Building</span></a></li>
            <li><a class="nav-link" href="<?= $rootSiteURLAdmin ?>room"><i class="fas fa-solid fa-house"></i>
                <span>Room</span></a></li>
            <li><a class="nav-link" href="<?= $rootSiteURLAdmin ?>section"><i class="fas fa-solid fa-house-circle-check"></i>
                <span>Section</span></a></li>
            <li><a class="nav-link" href="<?= $rootSiteURLAdmin ?>subject"><i class="fas fa-solid fa-book"></i>
                <span>Subject</span></a></li>
            <li><a class="nav-link" href="<?= $rootSiteURLAdmin ?>teacher"><i class="fas fa-solid fa-chalkboard-user"></i>
                <span>Teacher</span></a></li>
            <li><a class="nav-link" href="<?= $rootSiteURLAdmin ?>teacher-subject"><i class="fas fa-solid fa-person-chalkboard"></i>
                <span>Teacher Subject</span></a></li>
            <li><a class="nav-link" href="<?= $rootSiteURLAdmin ?>classroom-advisory"><i class="fas fa-solid fa-person-shelter"></i>
                <span>Classroom Advisory</span></a></li>
            <li><a class="nav-link" href="<?= $rootSiteURLAdmin ?>classroom-schedule"><i class="fas fa-regular fa-calendar-days"></i>
                <span>Classroom Schedule</span></a></li>
            <li class="menu-header">Pending Enrollees</li>
            <li><a class="nav-link" href="<?= $rootSiteURLAdmin ?>enrollees/"><i class="fas fa-solid fa-building"></i>
                <span>Grade 7</span></a></li>
            <!-- <li class="menu-header">Stisla</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                                <span>Components</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link beep-sidebar" href="components-wizard.html">Wizard</a></li>
                            </ul>
                        </li> -->
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <?php echo $content; ?>
      </div>

    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/jquery.min.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/popper.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/tooltip.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> -->

  <script src="<?= $rootSiteURLAdmin ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/moment.min.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/chart.min.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  <!-- Page Specific JS File -->
  <script src="<?= $rootSiteURLAdmin ?>assets/js/page/index.js"></script>

  <!-- Template JS File -->
  <script src="<?= $rootSiteURLAdmin ?>assets/js/scripts.js"></script>
  <script src="<?= $rootSiteURLAdmin ?>assets/js/custom.js"></script>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var scrollToTopButton = document.getElementById('scrollToTopButton');

    // Show the button when the user scrolls down 200px
    window.onscroll = function() {
      if (document.documentElement.scrollTop > 200 || document.body.scrollTop > 200) {
        scrollToTopButton.style.display = 'block';
      } else {
        scrollToTopButton.style.display = 'none';
      }
    };

    // Scroll to the top when the button is clicked
    scrollToTopButton.onclick = function() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    };
  });

  $(document).ready(function() {
    $(window).on('resize', function() {
      // Reload the page when the window is resized
      location.reload();
    });
  })
  </script>

  <?php echo $script; ?>
</body>

</html>