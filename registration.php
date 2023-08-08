<?php include('include/head.php'); ?>
<head>
<link href="assets/css/registration.css" rel="stylesheet">
</head>

<body >
  <!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
     
      <h1 class="logo me-auto"><a href="index.php"> <a href="index.html" class="logo me-auto">
        <img src="assets/img/bnhs-logo.png" alt="" class="img-fluid">
      </a> BNHS</a></h1>
      

      <nav id="navbar" class="navbar order-last order-lg-0">
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Login</a>

    </div>
  </header><!-- End Header -->

  <main id="main" >

    <!-- ======= Registration Section ======= -->
    <section id="registration" class="registration section-bg mt-5" >
      <div class="w-100 p-3 text-center" style="background-image: url('assets/img/gallery/b4.png'); color: #ffff;"><h3 style="font-weight: bold;">Registration Form</h3></div>
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
                              <h4 class="card-title" style="color: #274c43; font-weight: bold;">New Student Registration Form</h4>
                              <form class="form-sample">
                                <p class="card-description">
                                  Personal Information
                                </p>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">First Name</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Last Name</label>
                                      <div class="col-sm-6">
                                        <input type="text" class="form-control" />
                                      </div>
                                      <label class="col-sm-1 col-form-label">MI</label>
                                      <div class="col-sm-2">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>                              
                                </div>                         
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Gender</label>
                                      <div class="col-sm-9">
                                        <select class="form-control">
                                          <option>Male</option>
                                          <option>Female</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Date of Birth</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Address</label>
                                      <div class="col-sm-9">
                                        <textarea class="form-control" row="3"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Place of Birth</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text"/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Nationality</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text"/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Religion</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text"/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Civil Status</label>
                                      <div class="col-sm-9">
                                        <select class="form-control">
                                          <option>Single</option>
                                          <option>Married</option>
                                          <option>Widow</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>                            
                                <div class="row">
                                  <p><br> 
                                        Contact Information
                                      </p>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Contact No.</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Guardian</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Email</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Contact No.</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <div class="row"><p><br> 
                                        Account Information
                                      </p>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      
                                      <label class="col-sm-3 col-form-label">Username</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Password</label>
                                      <div class="col-sm-9">
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
                  <div class="tab-pane" id="tab-2">
                    <div class="row gy-4">
                      <div class="col-lg-12 details order-2 order-lg-1">
                        <div class="col-12 grid-margin">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title" style="color: #274c43; font-weight: bold;">Old Student Registration Form</h4>
                              <form class="form-sample">
                                <p class="card-description">
                                  Academic Year: <b></b>2023-2024</b>
                                </p>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Student No.</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Email</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>                              
                                </div>                         
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Grade Level</label>
                                      <div class="col-sm-9">
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
                                      <label class="col-sm-3 col-form-label">Upload Old ID</label>
                                      <div class="col-sm-9">
                                        <input type="file" class="btn"/>
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
                              <h4 class="card-title" style="color: #274c43; font-weight: bold;">Transferee Student Registration Form</h4>
                              <form class="form-sample">
                                <p class="card-description">
                                  Academic Year: <b>2023-2024</b>
                                </p>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">First Name</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Last Name</label>
                                      <div class="col-sm-6">
                                        <input type="text" class="form-control" />
                                      </div>
                                      <label class="col-sm-1 col-form-label">MI</label>
                                      <div class="col-sm-2">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>                              
                                </div>                         
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Gender</label>
                                      <div class="col-sm-9">
                                        <select class="form-control">
                                          <option>Male</option>
                                          <option>Female</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Date of Birth</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Address</label>
                                      <div class="col-sm-9">
                                        <textarea class="form-control" row="3"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Place of Birth</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text"/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Nationality</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text"/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Religion</label>
                                      <div class="col-sm-9">
                                        <input class="form-control" type="text"/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Civil Status</label>
                                      <div class="col-sm-9">
                                        <select class="form-control">
                                          <option>Single</option>
                                          <option>Married</option>
                                          <option>Widow</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>                            
                                <div class="row">
                                  <p><br> 
                                        Contact Information
                                      </p>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Contact No.</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Guardian</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Email</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Contact No.</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <div class="row"><p><br> 
                                        Account Information
                                      </p>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      
                                      <label class="col-sm-3 col-form-label">Username</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Password</label>
                                      <div class="col-sm-9">
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
  <?php include('include/footer.php'); ?>
</body>
 
