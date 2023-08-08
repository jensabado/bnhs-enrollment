<?php include('include/head.php'); ?>
<body style="background-image: url('assets/img/gallery/b4.png'); background-size: cover;">
<div class="vh-100 d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-8 col-lg-4">
            <div class="card shadow bg-white">
              <div class="card-body p-5">
                <div style="text-align: center;"><a href="index.php"><img src="assets/img/logo.png" alt="" width="150"></a></div>
                <form class="mb-3 mt-md-4">
                  <h2 class="fw-bold mb-2 text-uppercase text-center">STUDENT LOGIN</h2>
                  <div class="mb-3">
                    <label for="email" class="form-label ">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label ">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="*******">
                  </div>
                  <p class="small"><a class="text-primary" href="forget-password.php">Forgot password?</a></p>
                  <div class="d-grid">
                    <button class="btn btn-outline-dark" style="background-color: #274c43; color: #fff; font-weight: bold;" type="submit">Login</button>
                  </div>
                </form>
                <div>
                  <p class="mb-0  text-center">Don't have an account? <a href="registration.php" class="text-primary fw-bold">Sign
                      Up</a></p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
