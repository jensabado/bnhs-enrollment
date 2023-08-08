<?php
session_start();
if(isset($_SESSION['bnhses_admin_id'])) {
    echo "<script>
    location.href = 'index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/css/bootstrap.min.css"
        rel="stylesheet">
    <!-- bootstrap script -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/js/bootstrap.min.js"></script>
    <!-- google font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- custom stylesheet -->
    <link href="assets/css/admin-login.css" rel="stylesheet">
</head>

<body style="background-image: url('assets/img/bg6.png'); background-size: cover;">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-4 justify-content-center">
                    <div style="text-align: center;">
                        <a href="javascript:void(0)"><img src="assets/img/logo.png" alt=""
                                class="slogo"></a>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="card shadow bg-white">
                        <div class="card-body p-5">
                            <form id="admin_login_form" class="mb-3 mt-md-4">
                                <h2 class="fw-bold mb-2 text-uppercase text-center">ADMIN LOGIN</h2>
                                <div class="mb-3">
                                    <label for="email" class="form-label ">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="*******">
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-outline-dark"
                                        style="background-color: #274c43; color: #fff; font-weight: bold;"
                                        type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
        $('#admin_login_form').on('submit', function(e) {
            e.preventDefault();

            var form = new FormData(this);
            form.append('login', true);

            $.ajax({
                type: "POST",
                url: "./controller/backend.php",
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#login_btn').addClass('d-none');
                    $('.spinner').removeClass('d-none');
                },
                complete: function() {
                    $('#login_btn').removeClass('d-none');
                    $('.spinner').addClass('d-none');
                },
                success: function(response) {
                    if (response.includes('email not registered')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Sorry!',
                            text: 'Email not registered!',
                            iconColor: '#274c43',
                            confirmButtonColor: '#274c43',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            color: '#274c43',
                            background: '#fff',
                        })
                    } else if (response.includes('incorrect password')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Sorry!',
                            text: 'Password incorrect!',
                            iconColor: '#274c43',
                            confirmButtonColor: '#274c43',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            color: '#274c43',
                            background: '#fff',
                        })
                    } else if (response.includes('success')) {
                        location.href = './index.php';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Sorry!',
                            text: 'Something went wrong!',
                            iconColor: '#274c43',
                            confirmButtonColor: '#274c43',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            color: '#274c43',
                            background: '#fff',
                        })
                    }
                    console.log(response);
                }
            })
        })
    })
    </script>
</body>

</html>