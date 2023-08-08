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
                                <li class="active"> Account Settings </li>
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
                                    </div>
                                </div>
                                </div>
                                        <form class="form-sample ">
                                            <p><br><b>Account Settings</b></p> 
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">                                                   
                                                    <label class="col-sm-4 col-form-label">Old Password</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" />
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">                                                   
                                                    <label class="col-sm-4 col-form-label">New Password</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" />
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Repeat New Password</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" />
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                            <hr>
                                            <button type="button" class="btn btn-submit bg-dark text-white">
                                                <i class="fa fa-paper-plane"></i>
                                                Save Changes
                                            </button>
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
