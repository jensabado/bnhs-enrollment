<?php
require_once('../database/connection.php');
$page_title = 'Teacher Subject';
ob_start();

?>
<div class="modal fade" tabindex="-1" role="dialog" id="add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Teacher Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="add_teacher_subject_form">
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Teacher</label>
                            <select style="width: 100% !important" class="form-control" name="add_teacher_id"
                                id="add_teacher_id" required>
                                <option disabled value="" selected>SELECT TEACHER</option>';
                                <?php
                                $query = "SELECT id, f_name, l_name FROM tbl_teacher WHERE is_deleted = 'no' AND status = 'enable'";
                                $get_teacher = mysqli_prepare($conn, $query);

                                if ($get_teacher) {
                                    mysqli_stmt_execute($get_teacher);

                                    mysqli_stmt_bind_result($get_teacher, $id, $f_name, $l_name);

                                    while (mysqli_stmt_fetch($get_teacher)) {
                                        $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
                                        $name = htmlspecialchars($f_name . ' ' . $l_name, ENT_QUOTES, 'UTF-8');
                                        echo '<option value="' . $id . '">' . ucwords($name) . '</option>';
                                    }

                                    mysqli_stmt_close($get_teacher);
                                } else {
                                    echo '<option value="" selected disabled>NO RESULT</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Grade Level</label>
                            <select style="width: 100% !important" name="add_grade_level_id" id="add_grade_level_id"
                                class="form-control" required>
                                <option value="" selected disabled>SELECT GRADE LEVEL</option>
                                <?php
                                $query = "SELECT id, grade FROM tbl_grade_level";
                                $get_grade_level = mysqli_prepare($conn, $query);

                                if ($get_grade_level) {
                                    mysqli_stmt_execute($get_grade_level);

                                    mysqli_stmt_bind_result($get_grade_level, $id, $grade);

                                    while (mysqli_stmt_fetch($get_grade_level)) {
                                        $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
                                        $grade_level = htmlspecialchars($grade, ENT_QUOTES, 'UTF-8');
                                        echo '<option value="' . $id . '">' . ucwords($grade_level) . '</option>';
                                    }

                                    mysqli_stmt_close($get_grade_level);
                                } else {
                                    echo '<option value="" selected disabled>NO RESULT</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Subject</label>
                            <select style="width: 100% !important" name="add_subject_id" id="add_subject_id"
                                class="form-control" disabled required>

                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add_teacher_subject_form"
                    id="add_teacher_subject_btn">Add</button>
                <a href="#" class="btn disabled btn-primary btn-progress d-none spinner">Progress</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Building</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="edit_teacher_subject_form">
                    <div class="row mb-3 d-none">
                        <div class="col-12">
                            <label for="">Teacher Subject ID</label>
                            <input class="form-control" type="text" name="edit_teacher_subject_id"
                                id="edit_teacher_subject_id" placeholder="Enter subject id" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Teacher</label>
                            <select style="width: 100% !important" class="form-control" name="edit_teacher_id"
                                id="edit_teacher_id" required>
                                <option disabled value="" selected>SELECT TEACHER</option>';
                                <?php
                                $query = "SELECT id, f_name, l_name FROM tbl_teacher WHERE is_deleted = 'no' AND status = 'enable'";
                                $get_teacher = mysqli_prepare($conn, $query);

                                if ($get_teacher) {
                                    mysqli_stmt_execute($get_teacher);

                                    mysqli_stmt_bind_result($get_teacher, $id, $f_name, $l_name);

                                    while (mysqli_stmt_fetch($get_teacher)) {
                                        $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
                                        $name = htmlspecialchars($f_name . ' ' . $l_name, ENT_QUOTES, 'UTF-8');
                                        echo '<option value="' . $id . '">' . ucwords($name) . '</option>';
                                    }

                                    mysqli_stmt_close($get_teacher);
                                } else {
                                    echo '<option value="" selected disabled>NO RESULT</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Grade Level</label>
                            <select style="width: 100% !important" name="edit_grade_level_id" id="edit_grade_level_id"
                                class="form-control" required>
                                <option value="" selected disabled>SELECT GRADE LEVEL</option>
                                <?php
                                $query = "SELECT id, grade FROM tbl_grade_level";
                                $get_grade_level = mysqli_prepare($conn, $query);

                                if ($get_grade_level) {
                                    mysqli_stmt_execute($get_grade_level);

                                    mysqli_stmt_bind_result($get_grade_level, $id, $grade);

                                    while (mysqli_stmt_fetch($get_grade_level)) {
                                        $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
                                        $grade_level = htmlspecialchars($grade, ENT_QUOTES, 'UTF-8');
                                        echo '<option value="' . $id . '">' . ucwords($grade_level) . '</option>';
                                    }

                                    mysqli_stmt_close($get_grade_level);
                                } else {
                                    echo '<option value="" selected disabled>NO RESULT</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Subject</label>
                            <select style="width: 100% !important" name="edit_subject_id" id="edit_subject_id"
                                class="form-control" disabled required>

                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit_teacher_subject_form" id="edit_room_btn">Save
                    changes</button>
                <a href="#" class="btn disabled btn-primary btn-progress d-none spinner">Progress</a>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="section-header">
        <h1>Teacher Subject</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" id="add_building"><i class="fa-solid fa-plus pr-1"></i> ADD
                    TEACHER SUBJECT</button>
            </div>
            <div class="card-body">
                <div class="row align-items-center justify-content-center mb-3">
                    <div class="col-sm-3">
                        <select class="form-control" name="filter_grade_level" id="filter_grade_level">
                            <option selected value="">SELECT GRADE LEVEL</option>
                            <?php
                            $get_grade_level = mysqli_query($conn, "SELECT * FROM tbl_grade_level");
                            
                            foreach($get_grade_level as $grade_level_result) {
                            echo '<option value="'.$grade_level_result['id'].'">'.ucwords($grade_level_result['grade']).'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" name="filter_subject" id="filter_subject" disabled>
                            <option value="" selected disabled>SELECT GRADE LEVEL FIRST</option>
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
                                <th scope="col">Teacher Name</th>
                                <th scope="col">Grade Level Subject</th>
                                <th scope="col">Subject Handle</th>
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
        "searching": false,
        "pagingType": "simple",
        "scrollX": true,
        "sScrollXInner": "100%",
        "ajax": {
            url: "./controller/datatables.php",
            type: "POST",
            data: function(d) {
                return $.extend({}, d, {
                    "teacher_subject": true,
                    "filter_grade_level": $('#filter_grade_level').val(),
                    "filter_subject": $('#filter_subject').val()
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

    $('#filter_grade_level').select2();
    $('#filter_subject').select2({
        placeholder: "SELECT GRADE LEVEL FIRST",
    });
    $('#add_teacher_id').select2();
    $('#add_grade_level_id').select2();
    $('#add_subject_id').select2({
        placeholder: "SELECT GRADE LEVEL FIRST",
    });
    $('#edit_teacher_id').select2();
    $('#edit_grade_level_id').select2();
    $('#edit_subject_id').select2({
        placeholder: "SELECT GRADE LEVEL FIRST",
    });

    $('#filter_grade_level, #filter_subject').bind("keyup change", function() {
        dataTable.draw();
    })

    // filter onchange
    $('#filter_grade_level').change(function() {
        let grade_level_id = $(this).val();

        if (grade_level_id == '') {
            $('#filter_subject').select2({
                placeholder: "SELECT GRADE LEVEL FIRST",
            });
            $('#filter_subject').attr('disabled', true);
            $('#filter_subject').val('').trigger('change');
        } else {
            $('#filter_subject').attr('disabled', false);

            $.ajax({
                url: "./controller/backend.php",
                type: "POST",
                data: {
                    grade_level_id: grade_level_id,
                    get_subject: true,
                },
                success: function(data) {
                    $('#filter_subject').select2({
                        placeholder: "SELECT SUBJECT",
                    });
                    $('#filter_subject').html(data);
                }
            })
        }
    })

    // modal select onchange 
    $('#add_grade_level_id').change(function() {
        let grade_level_id = $(this).val();

        if (grade_level_id == '') {
            $('#add_subject_id').select2({
                placeholder: "SELECT GRADE LEVEL FIRST",
            });
            $('#add_subject_id').attr('disabled', true);
            $('#add_subject_id').val('').trigger('change');
        } else {
            $('#add_subject_id').attr('disabled', false);

            $.ajax({
                url: "./controller/backend.php",
                type: "POST",
                data: {
                    grade_level_id: grade_level_id,
                    get_subject: true,
                },
                success: function(data) {
                    $('#add_subject_id').select2({
                        placeholder: "SELECT SUBJECT",
                    });
                    $('#add_subject_id').html(data);
                }
            })
        }
    })

    $('#edit_grade_level_id').change(function() {
        let grade_level_id = $(this).val();

        if (grade_level_id == '') {
            $('#edit_subject_id').select2({
                placeholder: "SELECT GRADE LEVEL FIRST",
            });
            $('#edit_subject_id').attr('disabled', true);
            $('#edit_subject_id').val('').trigger('change');
        } else {
            $('#edit_subject_id').attr('disabled', false);

            $.ajax({
                url: "./controller/backend.php",
                type: "POST",
                data: {
                    grade_level_id: grade_level_id,
                    get_subject: true,
                },
                success: function(data) {
                    $('#edit_subject_id').select2({
                        placeholder: "SELECT SUBJECT",
                    });
                    $('#edit_subject_id').html(data);
                }
            })
        }
    })

    // reset filter
    $('#reset_filter').on('click', function(e) {
        e.preventDefault();

        $('#filter_subject').select2({
            placeholder: "SELECT GRADE LEVEL FIRST",
        });
        $('#filter_grade_level').val('').trigger("change");
        $('#filter_subject').val('').trigger("change");
    })

    // modal function
    $(document).on('click', '#add_building', function(e) {
        e.preventDefault();

        $('#add_modal').modal('show');
    })

    // - submit add modal
    $(document).on('submit', '#add_teacher_subject_form', function(e) {
        e.preventDefault();

        let form = new FormData(this);
        form.append('add_teacher_subject', true);

        $.ajax({
            type: "POST",
            url: "./controller/backend.php",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('#add_teacher_subject_btn').addClass('d-none');
                $('.spinner').removeClass('d-none');
            },
            complete: function() {
                $('#add_teacher_subject_btn').removeClass('d-none');
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
                        text: 'Teacher Subject added successfully!',
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
                        text: 'Teacher Subject already exist!',
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
    })

    // - get data edit modal
    $(document).on('click', '#get_edit', function(e) {
        e.preventDefault();

        let teacher_subject_id = $(this).data('id');
        let form = new FormData();
        form.append('get_teacher_subject_info', true);
        form.append('teacher_subject_id', teacher_subject_id);

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
                $('#edit_teacher_subject_id').val(data.id);
                $('#edit_teacher_id').val(data.teacher_id).trigger('change');
                $('#edit_grade_level_id').val(data.grade_level_id).trigger('change');
                $('#edit_subject_id').attr('disabled', false);

                $.ajax({
                    url: "./controller/backend.php",
                    type: "POST",
                    data: {
                        grade_level_id: data.grade_level_id,
                        get_subject: true,
                    },
                    success: function(res) {
                        $('#edit_subject_id').html(res);
                        $('#edit_subject_id').val(data.subject_id).trigger('change');
                    }
                })
            }
        })
    })

    // submit edit building
    $(document).on('submit', '#edit_teacher_subject_form', function(e) {
        e.preventDefault();

        let form = new FormData(this);
        form.append('edit_teacher_subject', true);

        $.ajax({
            type: "POST",
            url: "./controller/backend.php",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('#edit_teacher_subject_btn').addClass('d-none');
                $('.spinner').removeClass('d-none');
            },
            complete: function() {
                $('#edit_teacher_subject_btn').removeClass('d-none');
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
                        text: 'Teacher Subject updated successfully!',
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
                        text: 'Teacher Subject already exist!',
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
                form.append('delete_teacher_subject', true);

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
        $('#add_teacher_id').val('').trigger('change');
        $('#add_grade_level_id').val('').trigger('change');
        $('#add_subject_id').val('').trigger('change');
    });

    $('#edit_modal').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
    });
})
</script>
<?php
$script = ob_get_clean();
include('./layout/master.php');
?>