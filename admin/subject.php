<?php
require_once('../database/connection.php');
$page_title = 'Subject';

ob_start();

?>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="add_subject_form">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="">Grade Level</label>
                            <select style="width: 100% important;" class="form-control" name="add_grade_level" id="add_grade_level" required>
                                <option value="" disabled selected>SELECT GRADE LEVEL</option>
                                <?php
                                $stmt = $conn->prepare("SELECT id, grade FROM tbl_grade_level WHERE is_deleted = ?");
                                $isDeleted = 'no';
                                $stmt->bind_param("s", $isDeleted);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                while ($fetch_grade_level = $result->fetch_assoc()) {
                                    $id = $fetch_grade_level['id'];
                                    $grade_level = ucwords($fetch_grade_level['grade']);
                                
                                    echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($grade_level) . '</option>';
                                }
                                
                                $stmt->close();                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="">Subject</label>
                            <input class="form-control" type="text" name="add_subject_name" id="add_subject_name"
                                placeholder="Enter Subject Name" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add_subject_form" id="add_subject_btn">Add</button>
                <a href="#" class="btn disabled btn-primary btn-progress d-none spinner">Progress</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="edit_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="edit_subject_form">
                    <div class="row mb-3 d-none">
                        <div class="col-12">
                            <label for="">Subject ID</label>
                            <input class="form-control" type="text" name="edit_subject_id" id="edit_subject_id"
                                placeholder="Enter subject id" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="">Grade Level</label>
                            <select style="width: 100% important;" class="form-control" name="edit_grade_level" id="edit_grade_level" required>
                                <option value="" disabled selected>SELECT GRADE LEVEL</option>
                                <?php
                                $stmt = $conn->prepare("SELECT id, grade FROM tbl_grade_level WHERE is_deleted = ?");
                                $isDeleted = 'no';
                                $stmt->bind_param("s", $isDeleted);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                while ($fetch_grade_level = $result->fetch_assoc()) {
                                    $id = $fetch_grade_level['id'];
                                    $grade_level = ucwords($fetch_grade_level['grade']);
                                
                                    echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($grade_level) . '</option>';
                                }
                                
                                $stmt->close();                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="">Subject</label>
                            <input class="form-control" type="text" name="edit_subject_name" id="edit_subject_name"
                                placeholder="Enter Subject" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit_subject_form" id="edit_subject_btn">Save
                    changes</button>
                <a href="#" class="btn disabled btn-primary btn-progress d-none spinner">Progress</a>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="section-header">
        <h1>Subject</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" id="add_building"><i class="fa-solid fa-plus pr-1"></i> ADD
                    SUBJECT</button>
            </div>
            <div class="card-body">
                <div class="row align-items-center justify-content-center mb-3">
                    <div class="col-sm-3 mb-3 mb-md-0">
                        <select class="form-control" name="filter_grade_level" id="filter_grade_level">
                            <option selected value="">SELECT GRADE LEVEL</option>
                            <?php
                            $stmt = $conn->prepare("SELECT id, grade FROM tbl_grade_level WHERE is_deleted = ?");
                            $isDeleted = 'no';
                            $stmt->bind_param("s", $isDeleted);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            while ($fetch_grade_level = $result->fetch_assoc()) {
                                $id = $fetch_grade_level['id'];
                                $grade_level = ucwords($fetch_grade_level['grade']);
                            
                                echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($grade_level) . '</option>';
                            }
                            
                            $stmt->close();                    
                            ?>
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
                                <th scope="col">Grade Level</th>
                                <th scope="col">Subject</th>
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
        "searching": false,
        "paging": true,
        "pagingType": "simple",
        "scrollX": true,
        "sScrollXInner": "100%",
        "ajax": {
            url: "./controller/datatables.php",
            type: "POST",
            data: function(d) {
                return $.extend({}, d, {
                    "subject": true,
                    "filter_grade_level": $('#filter_grade_level').val()
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

    // filter
    dataTable.draw();

    // select2
    $('#filter_grade_level').select2();
    $('#add_grade_level').select2({
        dropdownParent: $('#add_modal')
    });
    $('#edit_grade_level').select2({
        dropdownParent: $('#edit_modal')
    });

    $('#filter_grade_level').bind("keyup change", function() {
        dataTable.draw();
    })

    $('#reset_filter').on('click', function(e) {
        e.preventDefault();

        $('#filter_grade_level').val('').trigger("change");
    })

    // modal function
    $(document).on('click', '#add_building', function(e) {
        e.preventDefault();

        $('#add_modal').modal('show');
    })

    // - submit add modal
    $(document).on('submit', '#add_subject_form', function(e) {
        e.preventDefault();

        let form = new FormData(this);
        form.append('add_subject', true);

        $.ajax({
            type: "POST",
            url: "./controller/function_class",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('#add_subject_btn').addClass('d-none');
                $('.spinner').removeClass('d-none');
            },
            complete: function() {
                $('#add_subject_btn').removeClass('d-none');
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
                        text: 'Subject added successfully!',
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
                        text: 'Subject already exist!',
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

        let subject_id = $(this).data('id');
        let form = new FormData();
        form.append('get_subject_info', true);
        form.append('subject_id', subject_id);

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
                $('#edit_subject_id').val(data.id);
                $('#edit_grade_level').val(data.grade_level_id).trigger('change');
                $('#edit_subject_name').val(data.subject);
            }
        })
    })

    // submit edit building
    $(document).on('submit', '#edit_subject_form', function(e) {
        e.preventDefault();

        let form = new FormData(this);
        form.append('edit_subject', true);

        $.ajax({
            type: "POST",
            url: "./controller/backend.php",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('#edit_subject_btn').addClass('d-none');
                $('.spinner').removeClass('d-none');
            },
            complete: function() {
                $('#edit_subject_btn').removeClass('d-none');
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
                        text: 'Subject updated successfully!',
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
                        text: 'Subject already exist!',
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
                form.append('delete_subject', true);

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