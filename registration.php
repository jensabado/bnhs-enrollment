<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register - Bacoor National High School</title>
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
    <link href="assets/css/registration.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 style="cursor: pointer;" onclick="window.location.href='index'" class="logo me-auto">
                <a href="index">
                    <a href="index" class="logo me-auto">
                        <img src="assets/img/bnhs-logo.png" alt="" class="img-fluid">
                    </a> BNHS
                </a>
            </h1>


            <nav id="navbar" class="navbar order-last order-lg-0">
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Login</a>

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Registration Section ======= -->
        <section style="margin-top: 24px !important;" id="registration" class="registration section-bg">
            <div class="w-100 p-3 text-center"
                style="background-image: url('assets/img/gallery/b4.png'); color: #ffff;">
                <h3 style="font-weight: bold;">Registration Form</h3>
            </div>
            <div class="container  pt-5">

                <div class="row gy-4">
                    <div class="col-lg-2">
                        <ul class="nav nav-tabs flex-column" style="text-align: left;">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">New Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Old Student</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Transferee Student</a>
                            </li>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row gy-4">
                                    <div class="col-lg-12 details order-2 order-lg-1">
                                        <div class="col-12 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title" style="color: #274c43; font-weight: bold;">
                                                        New Student Registration Form</h4>
                                                    <form class="form-sample" id="add_new_student_form">
                                                        <p class="card-description fw-bold">
                                                            Personal Information
                                                        </p>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">First
                                                                        Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control"
                                                                            id="add_firstname" name="add_firstname"
                                                                            placeholder="Ex: John" />

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_firstname_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Last
                                                                        Name</label>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                            id="add_lastname" name="add_lastname"
                                                                            placeholder="Ex: Smith" />

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_lastname_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                    <label class="col-md-1 col-form-label">MI</label>
                                                                    <div class="col-md-2">
                                                                        <input type="text" class="form-control"
                                                                            id="add_mi" name="add_mi"
                                                                            placeholder="Ex: M" />

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_mi_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-md-3 col-form-label">Gender</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control" id="add_gender"
                                                                            name="add_gender">
                                                                            <option value="Male">Male</option>
                                                                            <option value="Female">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Date of
                                                                        Birth</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" id="add_bdate"
                                                                            type="date" name="add_bdate"
                                                                            placeholder="dd/mm/yyyy"
                                                                            data-inputmask-alias="datetime"
                                                                            data-inputmask-inputformat="dd/mm/yyyy" />

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_bdate_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-md-3 col-form-label">Address</label>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control" row="4"
                                                                            id="add_address" name="add_address"
                                                                            placeholder="Ex: 123 Main Street Citytown, State 12345"></textarea>

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_address_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Place of
                                                                        Birth</label>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control" row="4"
                                                                            id="add_placebirth" name="add_placebirth"
                                                                            placeholder="Ex: 123 Main Street Cityville, Stateville Countryland"></textarea>

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_placebirth_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-md-3 col-form-label">Nationality</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" type="text"
                                                                            id="add_nationality" name="add_nationality"
                                                                            placeholder="Ex: Filipino" />

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_nationality_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-md-3 col-form-label">Religion</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" type="text"
                                                                            id="add_religion" name="add_religion"
                                                                            placeholder="Ex: Catholic" />

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_religion_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Civil
                                                                        Status</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control"
                                                                            id="add_civil_status"
                                                                            name="add_civil_status">
                                                                            <option>Single</option>
                                                                            <option>Married</option>
                                                                            <option>Widow</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <p class="fw-bold"><br>
                                                                    Contact Information
                                                                </p>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Student
                                                                            Contact
                                                                            No.</label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                <span
                                                                                    style="height: 45px !important; font-size: 14px !important;"
                                                                                    class="input-group-text">+63</span>
                                                                                <input type="text" class="form-control"
                                                                                    id="add_contact" name="add_contact"
                                                                                    placeholder="Ex: 9735628646">
                                                                            </div>
                                                                            <span
                                                                                style="font-size: 13px; font-weight: 500;"
                                                                                id="add_contact_error"
                                                                                class="text-danger errors"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-md-3 col-form-label">Guardian's
                                                                            Name</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"
                                                                                id="add_guardian" name="add_guardian"
                                                                                placeholder="Ex: Sophia Smith" />

                                                                            <span
                                                                                style="font-size: 13px; font-weight: 500;"
                                                                                id="add_guardian_error"
                                                                                class="text-danger errors"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Student
                                                                            Email</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"
                                                                                id="add_email" name="add_email"
                                                                                placeholder="Ex: example@gmail.com" />

                                                                            <span
                                                                                style="font-size: 13px; font-weight: 500;"
                                                                                id="add_email_error"
                                                                                class="text-danger errors"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-md-3 col-form-label">Guardian's
                                                                            Contact
                                                                            No.</label>
                                                                        <div class="col-md-9">
                                                                            <div class="input-group">
                                                                                <span
                                                                                    style="height: 45px !important; font-size: 14px !important;"
                                                                                    class="input-group-text">+63</span>
                                                                                <input type="text" class="form-control"
                                                                                    id="add_guardian_contact"
                                                                                    name="add_guardian_contact"
                                                                                    placeholder="Ex: 9827592749">
                                                                            </div>
                                                                            <span
                                                                                style="font-size: 13px; font-weight: 500;"
                                                                                id="add_guardian_contact_error"
                                                                                class="text-danger errors"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <p class="fw-bold"><br>
                                                                Requirements
                                                            </p>
                                                            <p style="font-size: 13px; font-weight: 500;">*Please
                                                                carefully follow these steps: Record a video of yourself
                                                                reading and answering to the question in the provided
                                                                PDF. After recording, upload the video file. Ensure you
                                                                also compile your answers into a single file and convert
                                                                it to PDF format. Use the designated field below for
                                                                both the video and the PDF submission. Your accurate
                                                                cooperation is highly appreciated.</p>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <button class="btn btn-submit d-flex align-items-center"
                                                                    style="font-weight: 500;"
                                                                    onclick="window.open('./admin/assets/pdf/two-leaves.pdf', '_blank')"><i
                                                                        class='bx bxs-download pe-1'></i>DOWNLOAD
                                                                    PDF</button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Video
                                                                        Record</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_video" name="add_video">
                                                                        </div>
                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_video_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">PDF
                                                                        File</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_pdf_file" name="add_pdf_file">
                                                                        </div>

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_pdf_file_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Form
                                                                        138</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_form_138" name="add_form_138">
                                                                        </div>
                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_form_138_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">PSA Birth
                                                                        Cert</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_psa" name="add_psa">
                                                                        </div>

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_psa_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Brgy
                                                                        Clearance</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_brgy_clearance"
                                                                                name="add_brgy_clearance">
                                                                        </div>

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_brgy_clearance_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Good
                                                                        Moral</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_good_moral"
                                                                                name="add_good_moral">
                                                                        </div>
                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_good_moral_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">ID of
                                                                        Guardian</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_guardian_id"
                                                                                name="add_guardian_id">
                                                                        </div>

                                                                        <span style="font-size: 13px; font-weight: 500;"
                                                                            id="add_guardian_id_error"
                                                                            class="text-danger errors"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="row">
                                                            <p class="fw-bold"><br>
                                                                Account Information
                                                            </p>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">

                                                                    <label
                                                                        class="col-md-3 col-form-label">Username</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-md-3 col-form-label">Password</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div>
                                                            <hr>
                                                            <button type="submit" class="btn btn-submit"
                                                                id="add_new_student_btn">
                                                                <i class="fa fa-paper-plane"></i>
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row gy-4">
                                    <div class="col-lg-12 details order-2 order-lg-1">
                                        <div class="col-12 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title" style="color: #274c43; font-weight: bold;">
                                                        Old Student Registration Form</h4>
                                                    <form class="form-sample">
                                                        <p class="card-description">
                                                            Academic Year: <b></b>2023-2024</b>
                                                        </p>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Student
                                                                        No.</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Email</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Grade
                                                                        Level</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control">
                                                                            <option>Grade 8</option>
                                                                            <option>Grade 9</option>
                                                                            <option>Grade 10</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Upload Old
                                                                        ID</label>
                                                                    <div class="col-md-9">
                                                                        <input type="file" class="btn" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div>
                                                            <hr>
                                                            <button type="button" class="btn btn-submit">
                                                                <i class="fa fa-paper-plane"></i>
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row gy-4">
                                    <div class="col-lg-12 details order-2 order-lg-1">
                                        <div class="col-12 grid-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title" style="color: #274c43; font-weight: bold;">
                                                        Transferee Student Registration Form</h4>
                                                    <form class="form-sample">
                                                        <p class="card-description">
                                                            Academic Year: <b>2023-2024</b>
                                                        </p>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">First
                                                                        Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Example: John" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Last
                                                                        Name</label>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" />
                                                                    </div>
                                                                    <label class="col-md-1 col-form-label">MI</label>
                                                                    <div class="col-md-2">
                                                                        <input type="text" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-md-3 col-form-label">Gender</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control">
                                                                            <option value="Male">Male</option>
                                                                            <option value="Female">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Date of
                                                                        Birth</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" id="date"
                                                                            type="date" name="date"
                                                                            placeholder="dd/mm/yyyy"
                                                                            data-inputmask-alias="datetime"
                                                                            data-inputmask-inputformat="dd/mm/yyyy" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-md-3 col-form-label">Address</label>
                                                                    <div class="col-md-9">
                                                                        <textarea class="form-control"
                                                                            row="3"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Place of
                                                                        Birth</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-md-3 col-form-label">Nationality</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-md-3 col-form-label">Religion</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" type="text" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Civil
                                                                        Status</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control">
                                                                            <option>Single</option>
                                                                            <option>Married</option>
                                                                            <option>Widow</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <p class="fw-bold"><br>
                                                                    Contact Information
                                                                </p>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Contact
                                                                            No.</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-md-3 col-form-label">Guardian</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-md-3 col-form-label">Email</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Contact
                                                                            No.</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <p class="fw-bold"><br>
                                                                Requirements
                                                            </p>
                                                            <p style="font-size: 13px; font-weight: 500;">*Please
                                                                carefully follow these steps: Record a video of yourself
                                                                reading and answering to the question in the provided
                                                                PDF. After recording, upload the video file. Ensure you
                                                                also compile your answers into a single file and convert
                                                                it to PDF format. Use the designated field below for
                                                                both the video and the PDF submission. Your accurate
                                                                cooperation is highly appreciated.</p>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <button class="btn btn-submit d-flex align-items-center"
                                                                    style="font-weight: 500;"
                                                                    onclick="window.open('./admin/assets/pdf/two-leaves.pdf', '_blank')"><i
                                                                        class='bx bxs-download pe-1'></i>DOWNLOAD
                                                                    PDF</button>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Video
                                                                        Record</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_video" name="add_video">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">PDF
                                                                        File</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_pdf_file" name="add_pdf_file">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Form
                                                                        138</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_form_138" name="add_form_138">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">PSA Birth
                                                                        Cert</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_psa" name="add_psa">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Brgy
                                                                        Clearance</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_brgy_clearance"
                                                                                name="add_brgy_clearance">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">Good
                                                                        Moral</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_good_moral"
                                                                                name="add_good_moral">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 col-form-label">ID of
                                                                        Guardian</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group custom-file-button">
                                                                            <label style="font-size: 14px;"
                                                                                class="input-group-text">Choose
                                                                                File</label>
                                                                            <input type="file" class="form-control"
                                                                                id="add_guardian_id"
                                                                                name="add_guardian_id">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <p class="fw-bold"><br>
                                                                Account Information
                                                            </p>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">

                                                                    <label
                                                                        class="col-md-3 col-form-label">Username</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-md-3 col-form-label">Password</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <hr>
                                                            <button type="button" class="btn btn-submit">
                                                                <i class="fa fa-paper-plane"></i>
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            </div>

            </div>
        </section><!-- End registration Section -->


    </main><!-- End #main -->

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
                            <li><i class="bx bx-chevron-right"></i> <a href="./">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="./#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="./#announcement">Announcement</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="./#admission">Admission</a></li>
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

    <script>
    $(document).ready(function() {
        $('.nav-link').click(function() {
            // Get the ID of the tab being clicked
            var tabId = $(this).attr('href');

            $(tabId + ' form').trigger('reset');
            $('input.border-danger').removeClass('border-danger');
            $('textarea.border-danger').removeClass('border-danger');
            $('.errors').html('');
        });

        $('#add_new_student_form').on('submit', function(e) {
            e.preventDefault();

            let form = new FormData(this);
            form.append('add_new_student', true);

            $.ajax({
                type: "POST",
                url: "./controller/backend",
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#add_new_student_btn').prop('disabled', true);
                },
                complete: function() {
                    $('#add_new_student_btn').prop('disabled', false);
                },
                success: function(response) {
                    console.log(response);
                    $('#add_new_student_btn').prop('disabled', false);
                    let data = JSON.parse(response);
                    if (data.status === 'invalid') {
                        if (data.add_firstname != '') {
                            $('#add_firstname_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_firstname);
                            $("#add_firstname").addClass('border-danger');
                        } else {
                            $('#add_firstname_error').html('');
                            $("#add_firstname").removeClass('border-danger');
                        }

                        if (data.add_lastname != '') {
                            $('#add_lastname_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_lastname);
                            $("#add_lastname").addClass("border-danger");
                        } else {
                            $('#add_lastname_error').html('');
                            $("#add_lastname").removeClass('border-danger');
                        }

                        if (data.add_bdate != '') {
                            $('#add_bdate_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_bdate);
                            $("#add_bdate").addClass("border-danger");
                        } else {
                            $('#add_bdate_error').html('');
                            $("#add_bdate").removeClass('border-danger');
                        }

                        if (data.add_address != '') {
                            $('#add_address_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_address);
                            $("#add_address").addClass("border-danger");
                        } else {
                            $('#add_address_error').html('');
                            $("#add_address").removeClass('border-danger');
                        }

                        if (data.add_placebirth != '') {
                            $('#add_placebirth_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_placebirth);
                            $("#add_placebirth").addClass("border-danger");
                        } else {
                            $('#add_placebirth_error').html('');
                            $("#add_placebirth").removeClass('border-danger');
                        }

                        if (data.add_nationality != '') {
                            $('#add_nationality_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_nationality);
                            $("#add_nationality").addClass("border-danger");
                        } else {
                            $('#add_nationality_error').html('');
                            $("#add_nationality").removeClass('border-danger');
                        }

                        if (data.add_religion != '') {
                            $('#add_religion_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_religion);
                            $("#add_religion").addClass("border-danger");
                        } else {
                            $('#add_religion_error').html('');
                            $("#add_religion").removeClass('border-danger');
                        }

                        if (data.add_civil_status != '') {
                            $('#add_civil_status_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_civil_status);
                            $("#add_civil_status").addClass("border-danger");
                        } else {
                            $('#add_civil_status_error').html('');
                            $("#add_civil_status").removeClass('border-danger');
                        }

                        if (data.add_contact != '') {
                            $('#add_contact_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_contact);
                            $("#add_contact").addClass("border-danger");
                        } else {
                            $('#add_contact_error').html('');
                            $("#add_contact").removeClass('border-danger');
                        }

                        if (data.add_guardian != '') {
                            $('#add_guardian_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_guardian);
                            $("#add_guardian").addClass("border-danger");
                        } else {
                            $('#add_guardian_error').html('');
                            $("#add_guardian").removeClass('border-danger');
                        }

                        if (data.add_email != '') {
                            $('#add_email_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_email);
                            $("#add_email").addClass("border-danger");
                        } else {
                            $('#add_email_error').html('');
                            $("#add_email").removeClass('border-danger');
                        }

                        if (data.add_guardian_contact != '') {
                            $('#add_guardian_contact_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_guardian_contact);
                            $("#add_guardian_contact").addClass("border-danger");
                        } else {
                            $('#add_guardian_contact_error').html('');
                            $("#add_guardian_contact").removeClass('border-danger');
                        }

                        if (data.add_video != '') {
                            $('#add_video_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_video);
                            $("#add_video").addClass("border-danger");
                        } else {
                            $('#add_video_error').html('');
                            $("#add_video").removeClass('border-danger');
                        }

                        if (data.add_pdf_file != '') {
                            $('#add_pdf_file_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_pdf_file);
                            $("#add_pdf_file").addClass("border-danger");
                        } else {
                            $('#add_pdf_file_error').html('');
                            $("#add_pdf_file").removeClass('border-danger');
                        }

                        if (data.add_form_138 != '') {
                            $('#add_form_138_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_form_138);
                            $("#add_form_138").addClass("border-danger");
                        } else {
                            $('#add_form_138_error').html('');
                            $("#add_form_138").removeClass('border-danger');
                        }

                        if (data.add_psa != '') {
                            $('#add_psa_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_psa);
                            $("#add_psa").addClass("border-danger");
                        } else {
                            $('#add_psa_error').html('');
                            $("#add_psa").removeClass('border-danger');
                        }

                        if (data.add_brgy_clearance != '') {
                            $('#add_brgy_clearance_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_brgy_clearance);
                            $("#add_brgy_clearance").addClass("border-danger");
                        } else {
                            $('#add_brgy_clearance_error').html('');
                            $("#add_brgy_clearance").removeClass('border-danger');
                        }

                        if (data.add_good_moral != '') {
                            $('#add_good_moral_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_good_moral);
                            $("#add_good_moral").addClass("border-danger");
                        } else {
                            $('#add_good_moral_error').html('');
                            $("#add_good_moral").removeClass('border-danger');
                        }

                        if (data.add_guardian_id != '') {
                            $('#add_guardian_id_error').html(
                                '<i class="fa-solid fa-triangle-exclamation pe-1"></i>' +
                                data.add_guardian_id);
                            $("#add_guardian_id").addClass("border-danger");
                        } else {
                            $('#add_guardian_id_error').html('');
                            $("#add_guardian_id").removeClass('border-danger');
                        }
                    } else if (data.status === 'success') {
                        localStorage.setItem('status', 'registration_submitted');
                        localStorage.setItem('message', data.message);
                        window.location.href = 'index';
                    } else if (data.status === 'failed') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: localStorage.getItem('message'),
                            iconColor: '#274c43',
                            confirmButtonColor: '#274c43',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            color: '#000',
                            background: '#fff',
                        })
                    }
                }
            })
        })
    })
    </script>
</body>