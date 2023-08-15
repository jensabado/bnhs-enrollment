<?php
require_once('../database/connection.php');
$page_title = 'Classroom Schedule';
ob_start();

?>
<div class="modal fade" tabindex="-1" role="dialog" id="add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Subject Sched</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="add_class_sched_form">
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Grade & Section</label>
                            <select style="width: 100% !important" class="form-control" name="add_section_id"
                                id="add_section_id" required>
                                <option disabled value="" selected>SELECT GRADE & SECTION</option>';
                                <?php
                                $stmt = $conn->prepare("SELECT tbl_section.id, tbl_grade_level.grade, tbl_section.section
                                FROM tbl_section
                                LEFT JOIN tbl_grade_level
                                ON tbl_section.grade_level_id = tbl_grade_level.id
                                WHERE tbl_section.is_deleted = ? ORDER BY tbl_grade_level.id");
                                $isDeleted = 'no';
                                $stmt->bind_param("s", $isDeleted);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                while ($fetch_grade_section = $result->fetch_assoc()) {
                                    $id = $fetch_grade_section['id'];
                                    $grade_section = ucwords($fetch_grade_section['grade'] . ' - ' . $fetch_grade_section['section']);
                                
                                    echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($grade_section) . '</option>';
                                }
                                
                                $stmt->close();                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Start Time</label>
                            <input type="time" name="add_start_time" id="add_start_time" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">End Time</label>
                            <input type="time" name="add_end_time" id="add_end_time" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Day</label>
                            <select style="width: 100% !important;" class="form-control" name="add_day_id"
                                id="add_day_id">
                                <option value="" selected disabled>SELECT DAY</option>
                                <?php
                                $stmt = $conn->prepare("SELECT id, name FROM tbl_days");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                while ($fetch_day = $result->fetch_assoc()) {
                                    $id = $fetch_day['id'];
                                    $day = $fetch_day['name'];
                                
                                    echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($day) . '</option>';
                                }
                                
                                $stmt->close();                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Subject</label>
                            <select style="width: 100% !important;" class="form-control" name="add_subject_id"
                                id="add_subject_id">
                                <option value="" selected disabled>SELECT SUBJECT</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Teacher</label>
                            <select style="width: 100% !important;" class="form-control" name="add_teacher_id"
                                id="add_teacher_id" disabled>

                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add_class_sched_form"
                    id="add_class_sched_btn">Add</button>
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
                <form action="" id="edit_class_sched_form">
                    <div class="row mb-3 d-none">
                        <div class="col-12">
                            <label for="">Classroom Schedule ID</label>
                            <input class="form-control" type="text" name="edit_class_sched_id" id="edit_class_sched_id"
                                placeholder="Enter subject id" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Grade & Section</label>
                            <select style="width: 100% !important" class="form-control" name="edit_section_id"
                                id="edit_section_id" required>
                                <option disabled value="" selected>SELECT GRADE & SECTION</option>';
                                <?php
                                $stmt = $conn->prepare("SELECT tbl_section.id, tbl_grade_level.grade, tbl_section.section
                                FROM tbl_section
                                LEFT JOIN tbl_grade_level
                                ON tbl_section.grade_level_id = tbl_grade_level.id
                                WHERE tbl_section.is_deleted = ? ORDER BY tbl_grade_level.id");
                                $isDeleted = 'no';
                                $stmt->bind_param("s", $isDeleted);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                while ($fetch_grade_section = $result->fetch_assoc()) {
                                    $id = $fetch_grade_section['id'];
                                    $grade_section = ucwords($fetch_grade_section['grade'] . ' - ' . $fetch_grade_section['section']);
                                
                                    echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($grade_section) . '</option>';
                                }
                                
                                $stmt->close();                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Start Time</label>
                            <input type="time" name="edit_start_time" id="edit_start_time" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">End Time</label>
                            <input type="time" name="edit_end_time" id="edit_end_time" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Day</label>
                            <select style="width: 100% !important;" class="form-control" name="edit_day_id"
                                id="edit_day_id">
                                <option value="" selected disabled>SELECT DAY</option>
                                <?php
                                $stmt = $conn->prepare("SELECT id, name FROM tbl_days");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                while ($fetch_day = $result->fetch_assoc()) {
                                    $id = $fetch_day['id'];
                                    $day = $fetch_day['name'];
                                
                                    echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($day) . '</option>';
                                }
                                
                                $stmt->close();                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Subject</label>
                            <select style="width: 100% !important;" class="form-control" name="edit_subject_id"
                                id="edit_subject_id">
                                <option value="" selected disabled>SELECT SUBJECT</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Teacher</label>
                            <select style="width: 100% !important;" class="form-control" name="edit_teacher_id"
                                id="edit_teacher_id" disabled>

                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit_class_sched_form"
                    id="edit_class_sched_btn">Save
                    changes</button>
                <a href="#" class="btn disabled btn-primary btn-progress d-none spinner">Progress</a>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="section-header">
        <h1>Classroom Schedule</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" id="add_building"><i class="fa-solid fa-plus pr-1"></i> ADD
                    CLASSROOM SCHEDULE</button>
            </div>
            <div class="card-body">
                <div class="row align-items-center justify-content-center mb-3">
                    <div class="col-sm-3 mb-3 mb-md-0">
                        <select class="form-control" name="filter_grade_section" id="filter_grade_section">
                            <?php
                            $stmt = $conn->prepare("SELECT tbl_section.id, tbl_grade_level.grade, tbl_section.section
                            FROM tbl_section
                            LEFT JOIN tbl_grade_level
                            ON tbl_section.grade_level_id = tbl_grade_level.id
                            WHERE tbl_section.is_deleted = ? ORDER BY tbl_grade_level.id");
                            $isDeleted = 'no';
                            $stmt->bind_param("s", $isDeleted);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            while ($fetch_grade_section = $result->fetch_assoc()) {
                                $id = $fetch_grade_section['id'];
                                $grade_section = ucwords($fetch_grade_section['grade'] . ' - ' . $fetch_grade_section['section']);
                            
                                echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($grade_section) . '</option>';
                            }
                            
                            $stmt->close();                    
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-warning" id="reset_filter">RESET FILTER</button>
                    </div>
                </div>
                <div class="row m-1 mb-3">
                    <button type="button" class="btn btn-primary" id="view_page">VIEW SCHEDULE</button>
                </div>
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Grade & Section</th>
                                <th scope="col">Time</th>
                                <th scope="col">Day</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Teacher</th>
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
$(window).on('load', function() {
    if (localStorage.getItem("status") == 'no_result') {
        Swal.fire({
            icon: 'error',
            title: 'Sorry!',
            text: 'But selected section does not have schedule!',
            iconColor: '#274c43',
            confirmButtonColor: '#274c43',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            color: '#000',
            background: '#fff',
        })
        localStorage.removeItem("status");
    }
})

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
                    "class_sched": true,
                    "filter_grade_section": $('#filter_grade_section').val(),
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

    $('#filter_grade_section').select2();
    $('#add_section_id').select2({
        dropdownParent: $('#add_modal')
    });
    $('#add_day_id').select2({
        dropdownParent: $('#add_modal')
    });
    $('#add_subject_id').select2({
        dropdownParent: $('#add_modal')
    });
    $('#add_teacher_id').select2({
        placeholder: "SELECT SUBJECT FIRST",
        dropdownParent: $('#add_modal')
    });

    $('#filter_grade_section').bind("keyup change", function() {
        dataTable.draw();
    })

    // reset filter
    $('#reset_filter').on('click', function(e) {
        e.preventDefault();

        $('#filter_grade_section').val($('#filter_grade_section option:first').val()).trigger("change");
    })

    $('#add_section_id').change(function() {
        let section_id = $(this).val();

        if (section_id == '') {
            $('#add_subject_id').attr('disabled', true);
            $('#add_subject_id').val('');
        } else {
            $('#add_subject_id').attr('disabled', false);

            $.ajax({
                url: "./controller/backend.php",
                type: "POST",
                data: {
                    section_id: section_id,
                    get_subject_cs: true,
                },
                success: function(data) {
                    $('#add_subject_id').select2({
                        dropdownParent: $('#add_modal'),
                        placeholder: "SELECT SUBJECT",
                    });
                    $('#add_subject_id').html(data);
                }
            })
        }
    })

    $('#edit_section_id').change(function() {
        let section_id = $(this).val();

        if (section_id == '') {
            $('#edit_subject_id').attr('disabled', true);
            $('#edit_subject_id').val('');
        } else {
            $('#edit_subject_id').attr('disabled', false);

            $.ajax({
                url: "./controller/backend.php",
                type: "POST",
                data: {
                    section_id: section_id,
                    get_subject_cs: true,
                },
                success: function(data) {
                    $('#edit_subject_id').select2({
                        dropdownParent: $('#edit_modal'),
                        placeholder: "SELECT SUBJECT",
                    });
                    $('#edit_subject_id').html(data);
                }
            })
        }
    })

    $('#add_subject_id').change(function() {
        let subject_id = $(this).val();

        if (subject_id == '') {
            $('#add_teacher_id').attr('disabled', true);
            $('#add_teacher_id').val('');
        } else {
            $('#add_teacher_id').attr('disabled', false);

            $.ajax({
                url: "./controller/backend.php",
                type: "POST",
                data: {
                    subject_id: subject_id,
                    get_teacher: true,
                },
                success: function(data) {
                    $('#add_teacher_id').select2({
                        dropdownParent: $('#add_modal'),
                        placeholder: "SELECT TEACHER",
                    });
                    $('#add_teacher_id').html(data);
                }
            })
        }
    })

    $('#edit_subject_id').change(function() {
        let subject_id = $(this).val();

        if (subject_id == '') {
            $('#edit_teacher_id').attr('disabled', true);
            $('#edit_teacher_id').val('');
        } else {
            $('#edit_teacher_id').attr('disabled', false);

            $.ajax({
                url: "./controller/backend.php",
                type: "POST",
                data: {
                    subject_id: subject_id,
                    get_teacher: true,
                },
                success: function(data) {
                    $('#edit_teacher_id').select2({
                        dropdownParent: $('#edit_modal'),
                        placeholder: "SELECT TEACHER",
                    });
                    $('#edit_teacher_id').html(data);
                }
            })
        }
    })

    // modal function
    $(document).on('click', '#add_building', function(e) {
        e.preventDefault();

        $('#add_modal').modal('show');
    })

    // - submit add modal
    $(document).on('submit', '#add_class_sched_form', function(e) {
        e.preventDefault();

        let form = new FormData(this);
        form.append('add_class_sched', true);

        $.ajax({
            type: "POST",
            url: "./controller/backend.php",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('#add_class_sched_btn').addClass('d-none');
                $('.spinner').removeClass('d-none');
            },
            complete: function() {
                $('#add_class_sched_btn').removeClass('d-none');
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
                        text: 'Subject Schedule added successfully!',
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
                        text: 'Subject Schedule already exist!',
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

        let class_sched_id = $(this).data('id');
        let form = new FormData();
        form.append('get_class_sched_info', true);
        form.append('class_sched_id', class_sched_id);

        $.ajax({
            type: "POST",
            url: "./controller/backend.php",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                let data = JSON.parse(response);
                $('#edit_class_sched_id').val(data.id);
                $('#edit_section_id').val(data.section_id).trigger('change');
                $('#edit_start_time').val(data.start_time);
                $('#edit_end_time').val(data.end_time);
                $('#edit_day_id').val(data.day_id).trigger('change');
                $('#edit_subject_id').attr('disabled', false);
                $('#edit_teacher_id').attr('disabled', false);

                $.ajax({
                    url: "./controller/backend.php",
                    type: "POST",
                    data: {
                        section_id: data.section_id,
                        get_subject_cs: true,
                    },
                    success: function(res) {
                        $('#edit_subject_id').select2({
                            dropdownParent: $('#edit_modal'),
                            placeholder: "SELECT SUBJECT",
                        });
                        $('#edit_subject_id').html(res);
                        $('#edit_subject_id').val(data.subject_id).trigger(
                            'change');



                        $.ajax({
                            url: "./controller/backend.php",
                            type: "POST",
                            data: {
                                subject_id: data.subject_id,
                                get_teacher: true,
                            },
                            success: function(res2) {
                                console.log(res2);
                                console.log(data.teacher_id);
                                $('#edit_teacher_id').select2({
                                    dropdownParent: $(
                                        '#edit_modal'),
                                    placeholder: "SELECT TEACHER",
                                });
                                $('#edit_teacher_id').html(res2);
                                $('#edit_teacher_id').val(data
                                    .teacher_id).trigger(
                                    'change');
                            }
                        })


                        $('#edit_modal').modal('show');
                    }
                })
            }
        })
    })

    // submit edit building
    $(document).on('submit', '#edit_class_sched_form', function(e) {
        e.preventDefault();

        let form = new FormData(this);
        form.append('edit_class_sched', true);

        $.ajax({
            type: "POST",
            url: "./controller/backend.php",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('#edit_class_sched_btn').addClass('d-none');
                $('.spinner').removeClass('d-none');
            },
            complete: function() {
                $('#edit_class_sched_btn').removeClass('d-none');
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
                        text: 'Classroom Schedule updated successfully!',
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
                        text: 'Classroom Schedule already exist!',
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
                form.append('delete_classroom_schedule', true);

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

    // printbutton
    $('#view_page').on('click', function(e) {
        e.preventDefault();

        if ($('#filter_grade_section').val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Sorry!',
                text: 'Select grade and section first!',
                iconColor: '#274c43',
                confirmButtonColor: '#274c43',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                color: '#000',
                background: '#fff',
            })
        } else {
            let id = $('#filter_grade_section').val();
            window.open('./class-schedule-print?id=' + id, '_blank');
        }
    })

    // hide modal reset 
    $('#add_modal').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
        $('#add_section_id').val('').trigger('change');
        $('#add_day_id').val('').trigger('change');
        $('#add_subject_id').val('').trigger('change');
        $('#add_teacher_id').select2({
            placeholder: "SELECT SUBJECT FIRST",
        });
        $('#add_teacher_id').val('').trigger('change');
        $('#add_teacher_id').attr('disabled', true);
    });

    $('#edit_modal').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
        $('#edit_section_id').val('').trigger('change');
        $('#edit_day_id').val('').trigger('change');
        $('#edit_subject_id').val('').trigger('change');
        $('#edit_teacher_id').select2({
            placeholder: "SELECT SUBJECT FIRST",
        });
        $('#edit_teacher_id').val('').trigger('change');
        $('#edit_teacher_id').attr('disabled', true);
    });
})
</script>
<?php
$script = ob_get_clean();
include('./layout/master.php');
?>