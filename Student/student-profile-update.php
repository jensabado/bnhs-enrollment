<?php include('include/student-head.php'); ?>
<head>

<link href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css' rel='stylesheet'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet'>
<link href='assets/css/table.css' rel='stylesheet'>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                                <li><a href="student-profile.php">Student Profile</a></li>
                                <i class="bx bx-chevron-right bx-sm"></i>
                                <li class="active"> Update Student Profile </li>
                            </ul>
                        </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="e-profile">
                            <div class="row">
                                <div class="col-12 col-sm-auto mb-3">
                                    <div class="mx-auto" style="width: 140px;">
                                        <div id="divImageMediaPreview" class="d-flex justify-content-center align-items-center" style="height: 140px; background-color: #f4f4f4;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <div class="mt-2">
                                        <div class="file-drop-area">
                                            <h6>Change Profile Picture</h6>
                                        <input type="file" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif">
                                        </div></div>
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
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Last Name</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                        <label class="col-sm-1 col-form-label">MI</label>
                                                        <div class="col-sm-3">
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
                                            </div>
                                        
                                            <p><br><b>Contact Information</b></p>                    
                                            <div class="row">
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
                                            <div class="text-right">
                                            <hr>
                                            <button type="button" class="btn btn-submit bg-dark text-white text-right">
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
<script>
$(document).on('change', '.file-input', function() {


var filesCount = $(this)[0].files.length;

var textbox = $(this).prev();

if (filesCount === 1) {
var fileName = $(this).val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}



if (typeof (FileReader) != "undefined") {
var dvPreview = $("#divImageMediaPreview");
dvPreview.html("");            
$($(this)[0].files).each(function () {
var file = $(this);                
    var reader = new FileReader();
    reader.onload = function (e) {
        var img = $("<img />");
        img.attr("style", "width: 150px; height:100px; padding: 10px");
        img.attr("src", e.target.result);
        dvPreview.append(img);
    }
    reader.readAsDataURL(file[0]);                
});
} else {
alert("This browser does not support HTML5 FileReader.");
}


});
</script>
</body>
</html>
