<?php
require_once('../database/connection.php');
$page_title = 'Teacher';
ob_start();
?>
<div class="modal fade" tabindex="-1" role="dialog" id="add_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="add_teacher_form" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="add_f_name" id="add_f_name"
                                placeholder="Enter first name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="add_l_name" id="add_l_name"
                                placeholder="Enter last name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="">Gender</label>
                            <select class="form-control" name="add_gender" id="add_gender" required>
                                <option value="" disabled selected>SELECT GENDER</option>
                                <option value="FEMALE">FEMALE</option>
                                <option value="MALE">MALE</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Mobile Number</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">+63</span>
                                <input type="text" class="form-control" name="add_mobile_no" id="add_mobile_no"
                                    placeholder="Enter mobile number" minlength="10" maxlength="10" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="">Display Picture</label>
                            <input type="file" class="form-control" name="add_avatar" id="add_avatar" accept="image/*">
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6 d-flex flex-column align-items-center">
                            <label for="" class="text-center">Image Preview</label>
                            <img id="imagePreview" src="#" alt="Preview" class="text-center"
                                style="width: 200px; max-width: 100%; border: 1px solid black;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="add_email" id="add_email"
                                placeholder="Enter email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="add_password" id="add_password"
                                    placeholder="Enter password"
                                    pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"
                                    title="Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character."
                                    required>
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-eye"
                                        style="color: #274c43;" id="show"></i></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add_teacher_form" id="add_teacher_btn">Add</button>
                <a href="#" class="btn disabled btn-primary btn-progress d-none spinner">Progress</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="edit_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="edit_teacher_form">
                    <div class="row mb-3 d-none">
                        <div class="col-12">
                            <label for="">Teacher ID</label>
                            <input class="form-control" type="text" name="edit_teacher_id" id="edit_teacher_id"
                                placeholder="Enter room id" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="edit_f_name" id="edit_f_name"
                                placeholder="Enter first name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="edit_l_name" id="edit_l_name"
                                placeholder="Enter last name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="">Gender</label>
                            <select class="form-control" name="edit_gender" id="edit_gender" required>
                                <option value="" disabled selected>SELECT GENDER</option>
                                <option value="FEMALE">FEMALE</option>
                                <option value="MALE">MALE</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Mobile Number</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">+63</span>
                                <input type="text" class="form-control" name="edit_mobile_no" id="edit_mobile_no"
                                    placeholder="Enter mobile number" minlength="10" maxlength="10" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="">Display Picture</label>
                            <input type="file" class="form-control" name="edit_avatar" id="edit_avatar"
                                accept="image/*">
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center mb-3">
                        <div class="col-md-6 d-flex flex-column align-items-center">
                            <label for="" class="text-center">Image Preview</label>
                            <img id="edit_imagePreview" src="#" alt="Preview" class="text-center"
                                style="width: 200px; max-width: 100%; border: 1px solid black;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Account Status</label>
                            <select name="edit_status" id="edit_status" class="form-control">
                                <option value="" disabled selected>SELECT STATUS</option>
                                <option value="enable">ENABLE</option>
                                <option value="disable">DISABLE</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit_teacher_form" id="edit_teacher_btn">Save
                    changes</button>
                <a href="#" class="btn disabled btn-primary btn-progress d-none spinner">Progress</a>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="section-header">
        <h1>Teacher</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" id="add_building"><i class="fa-solid fa-plus pr-1"></i> ADD
                    TEACHER</button>
            </div>
            <div class="card-body">
                <div class="row align-items-center justify-content-center mb-3">
                    <div class="col-sm-3 mb-3 mb-md-0">
                        <select class="form-control" name="filter_status" id="filter_status">
                            <option selected value="">SELECT STATUS</option>
                            <option value="enable">ENABLE</option>
                            <option value="disable">DISABLE</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mb-3 mb-md-0">
                        <select class="form-control" name="filter_gender" id="filter_gender">
                            <option value="" selected disabled>SELECT GENDER</option>
                            <option value="FEMALE">FEMALE</option>
                            <option value="MALE">MALE</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-warning" id="reset_filter">RESET FILTER</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Mobile No.</th>
                                <th scope="col">Email</th>
                                <th scope="col">Account Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();
ob_start();
?>
<script>
$(document).ready(function() {
    // initializing datatables
    var dataTable = $('#table').DataTable({
        "serverSide": true,
        "paging": true,
        "pagingType": "simple",
        "scrollX": true,
        "sScrollXInner": "100%",
        "ajax": {
            url: "./controller/datatables.php",
            type: "POST",
            data: function(d) {
                return $.extend({}, d, {
                    "teacher": true,
                    "filter_status": $('#filter_status').val(),
                    "filter_gender": $('#filter_gender').val()
                })
            },
            error: function(xhr, error, code) {
                console.log(xhr, code);
            }
        },
        "order": [
            [0, 'desc']
        ],
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ]
    });

    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();

    setInterval(function() {
        dataTable.ajax.reload(null, false);
    }, 10000); // END DATATABLES

    dataTable.draw();

    // select2
    $('#filter_status').select2();
    $('#filter_gender').select2();

    $('#filter_status, #filter_gender').bind("keyup change", function() {
        dataTable.draw();
    })

    // reset filter
    $('#reset_filter').on('click', function(e) {
        e.preventDefault();

        $('#filter_status').val('').trigger("change");
    })

    // SHOW|HIDE PASSWORD FUNCTION
    $('#show').on('click', function(e) {
        e.preventDefault();

        if ($('#add_password').attr('type') === 'password') {
            $('#add_password').attr('type', 'text');
            $('#show').removeClass('fa-eye-slash');
            $('#show').addClass('fa-eye');
        } else {
            $('#add_password').attr('type', 'password');
            $('#show').removeClass('fa-eye');
            $('#show').addClass('fa-eye-slash');
        }
    })

    // image preview
    $(document).ready(function() {
        $("#add_avatar, #edit_avatar").change(function() {
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#imagePreview").attr("src", e.target.result);
                $("#imagePreview").css("display", "block");
                $("#edit_imagePreview").attr("src", e.target.result);
                $("#edit_imagePreview").css("display", "block");
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // modal function
    $(document).on('click', '#add_building', function(e) {
        e.preventDefault();

        $('#add_modal').modal('show');
    })

    // - submit add modal
    $(document).on('submit', '#add_teacher_form', function(e) {
        e.preventDefault();

        if ($('#add_avatar')[0].files.length === 0) {
            let form = new FormData(this);
            form.append('add_teacher', true);

            $.ajax({
                type: "POST",
                url: "./controller/backend.php",
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#add_teacher_btn').addClass('d-none');
                    $('.spinner').removeClass('d-none');
                },
                complete: function() {
                    $('#add_teacher_btn').removeClass('d-none');
                    $('.spinner').addClass('d-none');
                },
                success: function(response) {
                    console.log(response);
                    if (response.includes('success')) {
                        $('#add_modal').modal('hide');
                        dataTable.ajax.reload(null, false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Teacher added successfully!',
                            iconColor: '#274c43',
                            confirmButtonColor: '#274c43',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            color: '#000',
                            background: '#fff',
                        })
                    } else if (response.includes('already exist')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Sorry!',
                            text: 'Teacher already exist!',
                            iconColor: '#274c43',
                            confirmButtonColor: '#274c43',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            color: '#000',
                            background: '#fff',
                        })
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
                            color: '#000',
                            background: '#fff',
                        })
                    }
                }
            })
        } else {
            let image_ext = $('#add_avatar').val().split('.').pop().toLowerCase();

            if ($.inArray(image_ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Sorry!',
                    text: 'File not supported!',
                    iconColor: '#274c43',
                    confirmButtonColor: '#274c43',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    color: '#000',
                    background: '#fff',
                })
            } else {
                let image_size = $('#add_avatar')[0].files[0].size;

                if (image_size > 10485760)[
                    Swal.fire({
                        icon: 'error',
                        title: 'Sorry!',
                        text: 'File too large!',
                        iconColor: '#274c43',
                        confirmButtonColor: '#274c43',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        color: '#000',
                        background: '#fff',
                    })
                ]
                else {
                    let form = new FormData(this);
                    form.append('add_teacher', true);

                    $.ajax({
                        type: "POST",
                        url: "./controller/backend.php",
                        data: form,
                        processData: false,
                        contentType: false,
                        cache: false,
                        beforeSend: function() {
                            $('#add_teacher_btn').addClass('d-none');
                            $('.spinner').removeClass('d-none');
                        },
                        complete: function() {
                            $('#add_teacher_btn').removeClass('d-none');
                            $('.spinner').addClass('d-none');
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.includes('success')) {
                                $('#add_modal').modal('hide');
                                dataTable.ajax.reload(null, false);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Teacher added successfully!',
                                    iconColor: '#274c43',
                                    confirmButtonColor: '#274c43',
                                    showConfirmButton: false,
                                    timer: 5000,
                                    timerProgressBar: true,
                                    color: '#000',
                                    background: '#fff',
                                })
                            } else if (response.includes('already exist')) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Sorry!',
                                    text: 'Teacher already exist!',
                                    iconColor: '#274c43',
                                    confirmButtonColor: '#274c43',
                                    showConfirmButton: false,
                                    timer: 5000,
                                    timerProgressBar: true,
                                    color: '#000',
                                    background: '#fff',
                                })
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
                                    color: '#000',
                                    background: '#fff',
                                })
                            }
                        }
                    })
                }
            }
        }
    })

    // - get data edit modal
    $(document).on('click', '#get_edit', function(e) {
        e.preventDefault();

        let teacher_id = $(this).data('id');
        let form = new FormData();
        form.append('get_teacher_info', true);
        form.append('teacher_id', teacher_id);

        $.ajax({
            type: "POST",
            url: "./controller/backend.php",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                console.log(response);
                $('#edit_modal').modal('show');
                let data = JSON.parse(response);
                $('#edit_teacher_id').val(data.id);
                $('#edit_f_name').val(data.f_name);
                $('#edit_l_name').val(data.l_name);
                $('#edit_gender').val(data.gender);
                $('#edit_mobile_no').val(data.mobile_no);
                $('#edit_imagePreview').attr('src', './assets/img/avatar/' + data.avatar);
                $('#edit_status').val(data.status);
            }
        })
    })

    // submit edit building
    $(document).on('submit', '#edit_teacher_form', function(e) {
        e.preventDefault();

        if ($('#edit_avatar')[0].files.length === 0) {
            let form = new FormData(this);
            form.append('edit_teacher', true);

            $.ajax({
                type: "POST",
                url: "./controller/backend.php",
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#edit_teacher_btn').addClass('d-none');
                    $('.spinner').removeClass('d-none');
                },
                complete: function() {
                    $('#edit_teacher_btn').removeClass('d-none');
                    $('.spinner').addClass('d-none');
                },
                success: function(response) {
                    console.log(response);
                    if (response.includes('success')) {
                        $('#edit_modal').modal('hide');
                        dataTable.ajax.reload(null, false);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Teacher updated successfully!',
                            iconColor: '#274c43',
                            confirmButtonColor: '#274c43',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            color: '#000',
                            background: '#fff',
                        })
                    } else if (response.includes('already exist')) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Sorry!',
                            text: 'Teacher already exist!',
                            iconColor: '#274c43',
                            confirmButtonColor: '#274c43',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            color: '#000',
                            background: '#fff',
                        })
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
                            color: '#000',
                            background: '#fff',
                        })
                    }
                }
            })
        } else {
            let image_ext = $('#edit_avatar').val().split('.').pop().toLowerCase();

            if ($.inArray(image_ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Sorry!',
                    text: 'File not supported!',
                    iconColor: '#274c43',
                    confirmButtonColor: '#274c43',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    color: '#000',
                    background: '#fff',
                })
            } else {
                let image_size = $('#edit_avatar')[0].files[0].size;

                if (image_size > 10485760)[
                    Swal.fire({
                        icon: 'error',
                        title: 'Sorry!',
                        text: 'File too large!',
                        iconColor: '#274c43',
                        confirmButtonColor: '#274c43',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        color: '#000',
                        background: '#fff',
                    })
                ]
                else {
                    let form = new FormData(this);
                    form.append('edit_teacher', true);

                    $.ajax({
                        type: "POST",
                        url: "./controller/backend.php",
                        data: form,
                        processData: false,
                        contentType: false,
                        cache: false,
                        beforeSend: function() {
                            $('#edit_teacher_btn').addClass('d-none');
                            $('.spinner').removeClass('d-none');
                        },
                        complete: function() {
                            $('#edit_teacher_btn').removeClass('d-none');
                            $('.spinner').addClass('d-none');
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.includes('success')) {
                                $('#edit_modal').modal('hide');
                                dataTable.ajax.reload(null, false);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Teacher updated successfully!',
                                    iconColor: '#274c43',
                                    confirmButtonColor: '#274c43',
                                    showConfirmButton: false,
                                    timer: 5000,
                                    timerProgressBar: true,
                                    color: '#000',
                                    background: '#fff',
                                })
                            } else if (response.includes('already exist')) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Sorry!',
                                    text: 'Teacher already exist!',
                                    iconColor: '#274c43',
                                    confirmButtonColor: '#274c43',
                                    showConfirmButton: false,
                                    timer: 5000,
                                    timerProgressBar: true,
                                    color: '#000',
                                    background: '#fff',
                                })
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
                                    color: '#000',
                                    background: '#fff',
                                })
                            }
                        }
                    })
                }
            }
        }
    })

    // delete info
    $(document).on('click', '#get_delete', function(e) {
        e.preventDefault();

        let id = $(this).data('id');

        Swal.fire({
            icon: 'question',
            title: 'Hey!',
            text: 'Are you sure you want to delete this data?',
            iconColor: '#274c43',
            confirmButtonColor: '#274c43',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: `Yes`,
            color: '#000',
            background: '#fff',
        }).then((result) => {
            if (result.isConfirmed) {
                let form = new FormData();
                form.append('id', id);
                form.append('delete_teacher', true);

                $.ajax({
                    type: "POST",
                    url: "./controller/backend.php",
                    data: form,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        console.log(response);
                        if (response.includes('success')) {
                            dataTable.ajax.reload(null, false);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Data deleted successfully!',
                                iconColor: '#274c43',
                                confirmButtonColor: '#274c43',
                                showConfirmButton: false,
                                timer: 5000,
                                timerProgressBar: true,
                                color: '#000',
                                background: '#fff',
                            })
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
                                color: '#000',
                                background: '#fff',
                            })
                        }
                    }
                })
            }
        })
    })

    // hide modal reset 
    $('#add_modal').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
        $('#imagePreview').attr('src', '');
        $('#edit_imagePreview').attr('src', '');
    });

    $('#edit_modal').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
        $('#imagePreview').attr('src', '');
        $('#edit_imagePreview').attr('src', '');
    });
})
</script>
<?php
$script = ob_get_clean();
include('./layout/master.php');
?>