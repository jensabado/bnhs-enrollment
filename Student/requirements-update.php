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
            <div class="col mb-3">
                        <div class="scp-breadcrumb">
                            <ul class="breadcrumb">
                                <li><a href="index.php">Dashboard </a></li>
                                <i class="bx bx-chevron-right bx-sm"></i>
                                <li><a href="requirements.php"> Requirements </a></li>
                                <i class="bx bx-chevron-right bx-sm"></i>
                                <li class="active"> Update Requirements </li>
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
                                   
                                </div><form>
                                <div class="table-responsive">
                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Requirements</th>
                                                <th class="text-center">Upload</th>
                                                <th class="text-center">Preview</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <span class="choose-file-button">ID</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <input type="file" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div id="divImageMediaPreview">

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <span class="choose-file-button">Form 137</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <input type="file" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div id="divImageMediaPreview">

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr><td>
                                                    <div class="file-drop-area">
                                                    <span class="choose-file-button">Form 138</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <input type="file" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div id="divImageMediaPreview">

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <span class="choose-file-button">PSA</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <input type="file" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div id="divImageMediaPreview">

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <span class="choose-file-button">Good Moral</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <input type="file" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div id="divImageMediaPreview">

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <span class="choose-file-button">Guardian's ID</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="file-drop-area">
                                                        <input type="file" class="file-input" accept=".jfif,.jpg,.jpeg,.png,.gif" multiple>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div id="divImageMediaPreview">

                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="m-2 text-right">
                                            
                                        <a href="requirements-update.php"><button class="btn bg-dark text-white" type="button">
                                            <h6><span><i class="bx bx-upload"></i> Submit Requirements </h6></span>
                                            
                                        </button></a>
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
