<?php
require_once('../database/connection.php');
$page_title = 'Section';
ob_start();

?>
<!-- START MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="add_section_form">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="">Grade Level</label>
                            <select style="width: 100% !important;" name="add_grade_level_id" id="add_grade_level_id"
                                class="form-control">
                                <option value="" selected disabled>SELECT GRADE LEVEL</option>
                                <?php
                                $stmt = $conn->prepare("SELECT id, grade FROM tbl_grade_level");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                while ($fetch_grade_level = $result->fetch_assoc()) {
                                    $id = $fetch_grade_level['id'];
                                    $grade = ucwords($fetch_grade_level['grade']);
                                
                                    echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($grade) . '</option>';
                                }
                                
                                $stmt->close();                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Select Building</label>
                            <select style="width: 100% !important;" class="form-control" name="add_section_building_id"
                                id="add_section_building_id">
                                <option disabled value="" selected>SELECT BUILDING</option>';
                                <?php
                                $get_building = mysqli_query($conn, "SELECT * FROM tbl_building WHERE is_deleted = 'no'");
                                foreach ($get_building as $row) {
                                    $id = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
                                    $building = htmlspecialchars($row['building'], ENT_QUOTES, 'UTF-8');
                                    echo '<option value="' . $id . '">' . ucwords($building) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-column">
                            <label for="">Select Room</label>
                            <select style="width: 100% !important;" class="form-control" name="add_section_room_id"
                                id="add_section_room_id" disabled required>
                                <option value="">SELECT BUILDING FIRST</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="">Section Name</label>
                            <input type="text" class="form-control" name="add_section_name" id="add_section_name"
                                placeholder="Enter section name" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add_section_form" id="add_section_btn">Add</button>
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
                <form action="" id="edit_section_form">
                    <div class="row mb-3 d-none">
                        <div class="col-12">
                            <label for="">Section ID</label>
                            <input class="form-control" type="text" name="edit_section_id" id="edit_section_id"
                                placeholder="Enter room id" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="">Grade Level</label>
                            <select style="width: 100% !important;" name="edit_grade_level_id" id="edit_grade_level_id"
                                class="form-control">
                                <option value="" selected disabled>SELECT GRADE LEVEL</option>
                                <?php
                                $stmt = $conn->prepare("SELECT id, grade FROM tbl_grade_level");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                
                                while ($fetch_grade_level = $result->fetch_assoc()) {
                                    $id = $fetch_grade_level['id'];
                                    $grade = ucwords($fetch_grade_level['grade']);
                                
                                    echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($grade) . '</option>';
                                }
                                
                                $stmt->close();                    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="">Select Building</label>
                            <select style="width: 100% !important;" class="form-control" name="edit_section_building_id"
                                id="edit_section_building_id">
                                <option disabled value="" selected>SELECT BUILDING</option>';
                                <?php
                                $get_building = mysqli_query($conn, "SELECT * FROM tbl_building WHERE is_deleted = 'no'");
                                foreach ($get_building as $row) {
                                    $id = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
                                    $building = htmlspecialchars($row['building'], ENT_QUOTES, 'UTF-8');
                                    echo '<option value="' . $id . '">' . ucwords($building) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="">Select Room</label>
                            <select style="width: 100% !important;" class="form-control" name="edit_section_room_id"
                                id="edit_section_room_id" disabled required>
                                <option value="">SELECT BUILDING FIRST</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="">Section Name</label>
                            <input type="text" class="form-control" name="edit_section_name" id="edit_section_name"
                                placeholder="Enter section name" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit_section_form" id="edit_section_btn">Save
                    changes</button>
                <a href="#" class="btn disabled btn-primary btn-progress d-none spinner">Progress</a>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<section class="section">
    <div class="section-header">
        <h1>Section</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" id="add_building"><i class="fa-solid fa-plus pr-1"></i> ADD
                    SECTION</button>
            </div>
            <div class="card-body">
                <div class="row d-flex flex-wrap align-items-center justify-content-center mb-3">
                    <div class="col-sm-6 col-md-3 mb-3 mb-md-0">
                        <select class="form-control" name="filter_grade_level_id" id="filter_grade_level_id">
                            <option selected value="">SELECT GRADE LEVEL</option>
                            <?php
                            $stmt = $conn->prepare("SELECT id, grade FROM tbl_grade_level");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            while ($fetch_grade_level = $result->fetch_assoc()) {
                                $id = $fetch_grade_level['id'];
                                $grade = ucwords($fetch_grade_level['grade']);
                            
                                echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($grade) . '</option>';
                            }
                            
                            $stmt->close();                    
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-3 mb-md-0">
                        <select class="form-control" name="filter_building" id="filter_building">
                            <option selected value="">SELECT BUILDING</option>
                            <?php
                            $stmt = $conn->prepare("SELECT id, building FROM tbl_building WHERE is_deleted = ?");
                            $isDeleted = 'no';
                            $stmt->bind_param("s", $isDeleted);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            while ($fetch_building = $result->fetch_assoc()) {
                                $id = $fetch_building['id'];
                                $building_name = ucwords($fetch_building['building']);
                            
                                echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars($building_name) . '</option>';
                            }
                            
                            $stmt->close();                    
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-3 mb-md-0">
                        <select class="form-control" name="filter_room" id="filter_room" disabled>
                            <option selected value="">SELECT BUILDING FIRST</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button type="button" class="btn btn-warning" id="reset_filter">RESET FILTER</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Building Name</th>
                                <th scope="col">Grade Level</th>
                                <th scope="col">Room Name</th>
                                <th scope="col">Section Name</th>
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
                    "section": true,
                    "filter_grade_level_id": $('#filter_grade_level_id').val(),
                    "filter_building": $('#filter_building').val(),
                    "filter_room": $('#filter_room').val(),
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
    $('#filter_grade_level_id').select2();
    $('#filter_building').select2();
    $('#filter_room').select2();
    $('#add_grade_level_id').select2({
        dropdownParent: $('#add_modal')
    });
    $('#edit_grade_level_id').select2({
        dropdownParent: $('#edit_modal')
    });
    $('#add_section_building_id').select2({
        dropdownParent: $('#add_modal')
    });
    $('#edit_section_building_id').select2({
        dropdownParent: $('#edit_modal')
    });
    $('#add_section_room_id').select2({
        dropdownParent: $('#edit_modal'),
        placeholder: "SELECT BUILDING FIRST",
    });
    $('#edit_section_room_id').select2({
        dropdownParent: $('#edit_modal'),
        placeholder: "SELECT BUILDING FIRST",
    });

    $('#filter_grade_level_id, #filter_building, #filter_room').bind("keyup change", function() {
        dataTable.draw();
    })

    // filter onchange
    $('#filter_building').change(function() {
        let building_id = $(this).val();

        if (building_id == '') {
            $('#filter_room').attr('disabled', true);
            $('#filter_room').val('').trigger('change');
        } else {
            $('#filter_room').attr('disabled', false);

            $.ajax({
                url: "./controller/backend.php",
                type: "POST",
                data: {
                    building_id: building_id,
                    get_room: true,
                },
                success: function(data) {
                    $('#filter_room').html(data);
                }
            })
        }
    })

    // reset filter
    $('#reset_filter').on('click', function(e) {
        e.preventDefault();

        $('#filter_building').val('').trigger("change");
        $('#filter_room').val('').trigger("change");
    })

    // modal onchange
    $('#add_section_building_id').change(function() {
        let building_id = $(this).val();

        if (building_id == '') {
            $('#add_section_room_id').attr('disabled', true);
            $('#add_section_room_id').val('');
        } else {
            $('#add_section_room_id').attr('disabled', false);

            $.ajax({
                url: "./controller/backend.php",
                type: "POST",
                data: {
                    building_id: building_id,
                    get_room: true,
                },
                success: function(data) {
                    $('#add_section_room_id').select2({
                        dropdownParent: $('#add_modal'),
                        placeholder: "SELECT BUILDING FIRST",
                    });
                    $('#add_section_room_id').html(data);
                }
            })
        }
    })

    $('#edit_section_building_id').change(function() {
        let building_id = $(this).val();

        if (building_id == '') {
            $('#edit_section_room_id').attr('disabled', true);
            $('#edit_section_room_id').val('');
        } else {
            $('#edit_section_room_id').attr('disabled', false);

            $.ajax({
                url: "./controller/backend.php",
                type: "POST",
                data: {
                    building_id: building_id,
                    get_room: true,
                },
                success: function(data) {
                    $('#edit_section_room_id').html(data);
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
    $(document).on('submit', '#add_section_form', function(e) {
        e.preventDefault();

        let form = new FormData(this);
        form.append('add_section', true);

        $.ajax({
            type: "POST",
            url: "./controller/backend.php",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('#add_section_btn').addClass('d-none');
                $('.spinner').removeClass('d-none');
            },
            complete: function() {
                $('#add_section_btn').removeClass('d-none');
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
                        text: 'Section added successfully!',
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
                        text: 'Section already exist!',
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

        let section_id = $(this).data('id');
        let form = new FormData();
        form.append('get_section_info', true);
        form.append('section_id', section_id);

        $.ajax({
            type: "POST",
            url: "./controller/backend.php",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                $('#edit_modal').modal('show');
                let data = JSON.parse(response);
                $('#edit_section_id').val(data.id);
                $('#edit_section_building_id').val(data.building_id).trigger('change');
                $('#edit_grade_level_id').val(data.grade_level_id).trigger('change');
                $('#edit_section_room_id').val(data.room_id).trigger('change');
                $('#edit_section_name').val(data.section);

                $('#edit_section_room_id').attr('disabled', false);

                $.ajax({
                    url: "./controller/backend.php",
                    type: "POST",
                    data: {
                        building_id: data.building_id,
                        get_room: true,
                    },
                    success: function(response) {
                        $('#edit_section_room_id').html(response);
                        $('#edit_section_room_id').val(data.room_id).trigger(
                            'change');
                    }
                })
            }
        })
    })

    // submit edit building
    $(document).on('submit', '#edit_section_form', function(e) {
        e.preventDefault();

        let form = new FormData(this);
        form.append('edit_section', true);

        $.ajax({
            type: "POST",
            url: "./controller/backend.php",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('#edit_section_btn').addClass('d-none');
                $('.spinner').removeClass('d-none');
            },
            complete: function() {
                $('#edit_section_btn').removeClass('d-none');
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
                        text: 'Section updated successfully!',
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
                        text: 'Section already exist!',
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
                form.append('delete_section', true);

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
        $('#add_section_building_id').val('').trigger('change');
        $('#add_section_room_id').val('').trigger('change');
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