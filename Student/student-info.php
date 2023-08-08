<?php include('include/student-head.php'); ?>
<head>

<link href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css' rel='stylesheet'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet'>
<link href='assets/css/table.css' rel='stylesheet'>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
</head>
<body>
<?php include('include/sidebar.php'); ?>
<div class="app-main__outer">
<div class="app-main__inner">
    <div class="container">
        <div class="row flex-lg-nowrap">
            <div class="col mb-2">
                        <div class="scp-breadcrumb">
                            <ul class="breadcrumb">
                                <li><a href="index.php">Dashboard </a></li>
                                <i class="bx bx-chevron-right bx-sm"></i>
                                <li class="active"> Student Information </li>
                            </ul>
                        </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="e-profile">
                            <div class="row">
                                <div class="col-12 col-sm-auto mb-3">
                                    <div class="mx-auto" style="width: 140px;">
                                        <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                        <img src="https://png.pngtree.com/png-vector/20210128/ourlarge/pngtree-flat-student-avatar-png-image_2850360.jpg" height="140px" width="140px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Cara Parkenstacker</h4>
                                        <p class="mb-0">BNHS Student</p>
                                    </div>
                                </div>
                                </div>
                                        <form class="form-sample ">
                                            <p>
                                            <br><b>Student Information</b>
                                            </p>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Student Number </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="9874563211" disabled/>
                                                        </div>
                                                    </div>
                                                </div>                    
                                            </div>                         
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Grade Level </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="Grade 8" disabled />
                                                        </div>
                                                    </div>
                                                </div>                    
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Section </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="3-Makahiya" disabled/>
                                                        </div>
                                                    </div>
                                                </div>                    
                                            </div>     
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Student Type </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="Old Student" disabled />
                                                        </div>
                                                    </div>
                                                </div>                    
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Enrollment Status </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="Enrolled" disabled/>
                                                        </div>
                                                    </div>
                                                </div>                    
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Requirement Status </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="Completed" disabled/>
                                                        </div>
                                                    </div>
                                                </div>                    
                                            </div>
                                            
                                        </form>          
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><?php include('include/footer.php'); ?>   
</div>


<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
</body>
</html>
