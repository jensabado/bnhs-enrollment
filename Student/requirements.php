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
            <div class="col mb-3">
                        <div class="scp-breadcrumb">
                            <ul class="breadcrumb">
                                <li><a href="index.php">Dashboard </a></li>
                                <i class="bx bx-chevron-right bx-sm"></i>
                                <li class="active"> Requirements </li>
                            </ul>
                        </div>
                <div class="card mt-3">
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
                                <div class="table-responsive">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Form 137</th>
                                                <th class="text-center">Form 138</th>
                                                <th class="text-center">PSA</th>
                                                <th class="text-center">Good Moral</th>
                                                <th class="text-center">Guardian's ID</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                <img src="https://imgv2-1-f.scribdassets.com/img/document/65471094/original/802c2dd3e9/1689288443?v=1" height="140px" width="140px">
                                                </td>
                                                <td>
                                                <img src="https://imgv2-1-f.scribdassets.com/img/document/65471094/original/802c2dd3e9/1689288443?v=1" height="140px" width="140px">
                                                </td>
                                                <td class="text-center"><img src="https://imgv2-1-f.scribdassets.com/img/document/65471094/original/802c2dd3e9/1689288443?v=1" height="140px" width="140px"></td>
                                                <td class="text-center"><img src="https://imgv2-1-f.scribdassets.com/img/document/65471094/original/802c2dd3e9/1689288443?v=1" height="140px" width="140px"></td>
                                                <td class="text-center"><img src="https://imgv2-1-f.scribdassets.com/img/document/65471094/original/802c2dd3e9/1689288443?v=1" height="140px" width="140px"></td>
                                                <td class="text-center"><img src="https://imgv2-1-f.scribdassets.com/img/document/65471094/original/802c2dd3e9/1689288443?v=1" height="140px" width="140px"></td>
                                                <td class="text-center">
                                                    <div class="badge badge-success">COMPLETED</div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="m-2 text-center">
                                        <a href="requirements-update.php"><button class="btn bg-dark text-white" type="button">
                                            <i class="bx bx-refresh bx-md"></i><br>
                                            <span>Update Requirements</span>
                                        </button></a>
                                    </div>
                                    </div>
                                </div>
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
