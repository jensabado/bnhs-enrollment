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
                                <li class="active"> Student Profile </li>
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
                                        <p class="mb-0">Student Number: 1924588714</p>
                                        <span class="badge badge-secondary">Enrolled</span>
                                        <p class="mb-0">@cara.p</p>
                                        <div class="mt-2">
                                        <a href="student-profile-update.php"><button class="btn bg-dark text-white" type="button">
                                            <i class="fa fa-fw fa-refresh"></i>
                                            <span>Update Profile</span>
                                        </button></a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                        <form class="form-sample ">
                                            <p>
                                            <br><b>Personal Information</b>
                                            </p>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">First Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" value="Cara" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Last Name</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" value="Parkenstacker" disabled/>
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">MI</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" value="S" disabled/>
                                                        </div>
                                                    </div>
                                                </div>                              
                                            </div>                         
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Gender</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" disabled>
                                                        <option>Male</option>
                                                        <option selected>Female</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" value="10/10/2000" disabled/>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" row="3" value="b2 l8 basta ganon ganon liko ka tas deretso" disabled></textarea>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Place of Birth</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="Sta. Cruz, Manila" disabled/>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nationality</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="Filipino" disabled/>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Religion</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="Roman Catholic" disabled/>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Civil Status</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" disabled>
                                                        <option selected>Single</option>
                                                        <option>Married</option>
                                                        <option>Widow</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <p><br><b>Contact Information</b></p>                    
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Contact No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="9874563211" disabled/>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Guardian</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="Aston Parkenstacker" disabled/>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="@cara.p" disabled/>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Contact No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="9874563222" disabled/>
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
