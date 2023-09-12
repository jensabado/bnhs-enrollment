<?php
session_start();
$page_title = 'Home';
ob_start();
?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex">
    <div class="container d-flex align-content-center flex-wrap">
        <div class="row d-flex align-content-center flex-wrap">
            <div class="col-lg-3 text-center">
                <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-logo" width="220px"></a>
            </div>
            <div class="col-lg-9 text-right">
                <h1 style="color: #fff !important;" class="mt-2 font-weight-bold">Bacoor National High School</h1>
                <h2>Molino Main Campus</h2>
                <h4>A better learning future starts here.</h4>
                <a href="registration.php" target="_blank" class="btn-get-started scrollto mt-3"><b>ENROLL NOW</b></a>
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">
    <!-- ======= Why Us Section ======= -->
    <section id="about" class="why-us">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-lg-5">
                    <img src="assets/img/gallery/bnhs2.jpg" width="500" />
                </div>
                <div class="col-lg-7">
                    <h4 class="text-dark mt-3"><b>About BNHS- Molino Main Campus</b></h4>
                    <p style="text-align: justify;">Education is the foundation of progress and development for any
                        nation. In the Philippines, Bacoor National High School – Molino Main (BNHS Molino Main) stands
                        as a beacon of knowledge and empowerment. Established on Tuesday, January 01, 1985, BNHS Molino
                        Main has played a crucial role in shaping the minds of countless students in Bacoor, Cavite.
                        This essay explores the history, impact, and significance of BNHS Molino Main as an educational
                        institution.
                        <br><br>
                        BNHS Molino Main operates as a monograde class organization, focusing on delivering quality
                        education and personalized attention to each student. The curricular class at the school is
                        designed to impart essential knowledge and skills to prepare students for higher education and
                        future challenges.
                    </p>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4 d-flex align-items-stretch ">
                    <div class="content text-white p-4 mb-2" style="background-color: #274c43; border-radius: 5px;">

                        <h3><i class="bx bx-book"></i> HISTORY</h3>
                        <p style="text-align: justify;">
                            BNHS Molino Main, previously known as Bacoor NHS – Molino Annex, originated as an extension
                            of Bacoor National High School. Recognizing the need to cater to the growing population in
                            the Molino area, the Department of Education (DepEd) established this annex school in 1985.
                            It was a strategic move to provide accessible education to the local community without the
                            need for students to travel long distances.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content text-white p-4 mb-2" style="background-color: #274c43; border-radius: 5px;">
                        <h3><i class="bx bx-target-lock"></i> MISSION</h3>
                        <p style="text-align: justify;">To protect and promote the right of every Filipino to quality,
                            equitable, culture-based, and complete basic education where:<br><br>Students learn in a
                            child-friendly, gender-sensitive, safe, and motivating environment.
                            Teachers facilitate learning and constantly nurture every learner.
                            Administrators and staff, as stewards of the institution, ensure an enabling and supportive
                            environment for effective learning to happen.
                            Family, community, and other stakeholders are actively engaged and share responsibility for
                            developing life-long learners.

                        </p>

                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content text-white p-4 mb-2" style="background-color:#274c43; border-radius: 5px;">
                        <h3><i class="bx bx-notepad"></i> VISION</h3>
                        <p style="text-align: justify;">
                            We dream of Filipinos who passionately love their country and whose values and competencies
                            enable them to realize their full potential and contribute meaningfully to building the
                            nation. <br><br>As a learner-centered public institution, the Department of Education
                            continuously improves itself to better serve its stakeholders.
                        </p>
                    </div>
                </div>
            </div>
    </section>

    <!-- Portfolio-->
    <section id="announcement" style="background-image: url('assets/img/gallery/b5.png'); background-size: cover;">
        <div class="container px-4 px-lg-5 ">
            <div class="section-title">
                <h2 class="text-white">ANNOUNCEMENT</h2>
            </div>
            <div class="row gx-0">
                <div class="col-lg-4 p-1">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <!-- <div class="h2">Event name</div>
                              <p class="mb-0">Put description here</p> -->
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/gallery/A1.jpg" alt="..." />
                    </a>
                </div>
                <div class="col-lg-4  p-1">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <!-- <div class="h2">Event name</div>
                            <p class="mb-0">Put description here</p> -->
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/gallery/A7.jpg" alt="..." />
                    </a>
                </div>
                <div class="col-lg-4  p-1">
                    <a class="portfolio-item" href="#!">
                        <div class="caption">
                            <div class="caption-content">
                                <!-- <div class="h2">Event name</div>
                            <p class="mb-0">Put description here</p> -->
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/gallery/A2.jpg" alt="..." />
                    </a>
                </div>

            </div>
        </div>

    </section>
    <!-- ======= Admissions Section ======= -->
    <section id="admission">
        <div class="container">
            <div class="section-title">
                <h2>ADMISSION REQUIREMENTS</h2>
            </div>
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-4 d-flex align-items-stretch ">
                        <div class="content p-4 mb-2"
                            style="background-color: #fff; border: 3px solid #274c43; border-radius: 5px; color: #274c43 !important;">
                            <h3 style="background-color: #274c43; color: #fff; padding: 12px; border-radius: 5px;">
                                <b>NEW STUDENT</b></h3>
                            <ul style="text-align: left; ">
                                <li> Application Form</li>
                                <li> Original copy of Form 137</li>
                                <li> Original copy of Form 138 (Student’s report card properly accomplished and signed
                                    by the school’s director or principal issuing it.)</li>
                                <li> Certified true copy of Birth Certificate (PSA/NSO)</li>
                                <li> Latest 2×2 photograph (4 copies)</li>
                                <li> Certificate of good moral character by the principal or guidance counselor</li>
                                <li> Barangay Certificate</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content p-4 mb-2"
                            style="background-color: #fff; border: 3px solid #274c43; border-radius: 5px; color: #274c43 !important;">
                            <h3 style="background-color: #274c43; color: #fff; padding: 12px; border-radius: 5px;">
                                <b>OLD STUDENT</b></h3>
                            <ul style="text-align: left;">
                                <li> Original copy of Form 138 (Student’s report card properly accomplished and signed
                                    by the school’s director or principal issuing it.)</li>
                                <li> Latest 2×2 photograph (4 copies)</li>
                                <li> Barangay Certificate</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content p-4 mb-2"
                            style="background-color: #fff; border: 3px solid #274c43; border-radius: 5px; color: #274c43 !important;">
                            <h3 style="background-color: #274c43; color: #fff; padding: 12px; border-radius: 5px;">
                                <b>TRANSFEREE</b></h3>
                            <ul style="text-align: left;">
                                <li> Application Form</li>
                                <li> Original copy of Form 138 (Student’s report card properly accomplished and signed
                                    by the school’s director or principal issuing it.)</li>
                                <li> Certified true copy of Birth Certificate (PSA/NSO)</li>
                                <li> Latest 2×2 photograph (4 copies)</li>
                                <li> Certificate of good moral character by the principal or guidance counselor</li>
                                <li> Barangay Certificate</li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
    </section><!-- End Departments Section -->

</main><!-- End #main -->

<?php
$content = ob_get_clean();
ob_start();
?>
<script>
$(document).ready(function() {
    if (localStorage.getItem('status') == 'registration_submitted') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: localStorage.getItem('message'),
            iconColor: '#274c43',
            confirmButtonColor: '#274c43',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            color: '#000',
            background: '#fff',
        })
        localStorage.removeItem('status');
        localStorage.removeItem('message');
    }
})
</script>
<?php
$script = ob_get_clean();
include('./layout/master.php');
?>