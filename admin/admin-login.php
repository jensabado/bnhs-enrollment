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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom stylesheet -->
    <link href="assets/css/admin-login.css" rel="stylesheet">
</head>

<body style="background-image: url('assets/img/bg6.png'); background-size: cover;">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-4 justify-content-center">
                    <div style="text-align: center;">
                        <a href="javascript:void(0)"><img src="assets/img/logo.png" alt="" class="slogo"></a>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <div class="card shadow bg-white">
                        <div class="card-body p-5">
                            <form id="admin_login_form" class="mb-3 mt-md-4">
                                <h2 class="fw-bold mb-2 text-uppercase text-center">ADMIN LOGIN</h2>
                                <div class="mb-3">
                                    <label for="email" class="form-label ">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="name@example.com"
                                        value="<?php if(isset($_COOKIE['bnhses_email'])) { echo $_COOKIE['bnhses_email']; } ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="*******"
                                            value="<?php if(isset($_COOKIE['bnhses_password'])) { echo $_COOKIE['bnhses_password']; } ?>">
                                        <span class="input-group-text"><i style="color: #274c43;" class="fa-regular fa-eye" id="show"></i></span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <input type="checkbox" name="rem" id="rem"
                                                <?php if (isset($_COOKIE["bnhses_email"]) && isset ($_COOKIE["bnhses_password"])) { echo "checked"; } ?>>
                                            <span style="font-size: 14px;">Remember me</span>
                                        </div>
                                        <a style="font-size: 14px;" href="">Forgot password?</a>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-outline-dark"
                                        style="background-color: #274c43; color: #fff; font-weight: bold;"
                                        type="submit">Login</button>
                                    <p style="font-size: 14px;" class="text-center mt-2">Don't have an account? <a
                                            href="#">Register here</a></p>
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
        // SHOW|HIDE PASSWORD FUNCTION
        $('#show').on('click', function(e) {
            e.preventDefault();

            if($('#password').attr('type') === 'password') {
                $('#password').attr('type', 'text');
                $('#show').removeClass('fa-eye-slash');
                $('#show').addClass('fa-eye');
            } else {
                $('#password').attr('type', 'password');
                $('#show').removeClass('fa-eye');
                $('#show').addClass('fa-eye-slash');
            }
        })

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