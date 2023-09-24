<?php
$page_title = 'Building';

ob_start();

?>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="add_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Building</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="add_building_form">
                    <div class="row gap-2">
                        <div class="col-12">
                            <label for="">Building Name</label>
                            <input class="form-control" type="text" name="add_building_name" id="add_building_name"
                                placeholder="Enter building name" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add_building_form"
                    id="add_building_btn">Add</button>
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
                <form action="" id="edit_building_form">
                    <div class="row mb-3 d-none">
                        <div class="col-12">
                            <label for="">Building ID</label>
                            <input class="form-control" type="text" name="edit_building_id" id="edit_building_id"
                                placeholder="Enter building id" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="">Building Name</label>
                            <input class="form-control" type="text" name="edit_building_name" id="edit_building_name"
                                placeholder="Enter building name" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit_building_form" id="edit_building_btn">Save
                    changes</button>
                <a href="#" class="btn disabled btn-primary btn-progress d-none spinner">Progress</a>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="section-header">
        <h1>Building</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" id="add_building"><i class="fa-solid fa-plus pr-1"></i> ADD
                    BUILDING</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Building Name</th>
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
            data: {
                building: true,
            },
            error: function(xhr, error, code) {
                console.log(xhr, code);
            }
        },
        "order": [
            [0, 'desc']
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ]
    });

    // Initialize a flag to check if the dropdown is open
    var dropdownOpen = false;

    // Initialize a timestamp for the last dropdown click
    var lastDropdownClick = 0;

    var id = 0;

    // Handle dropdown click to set the flag and update the timestamp
    $('#table').on('click', '.my-dropdown', function(event) {
        id = $(this).data('id');
        console.log(id);
        dropdownOpen = true;
        lastDropdownClick = Date.now();
    });

    // Handle document click to close the dropdown if it's open
    $(document).on('click', function() {
        if (dropdownOpen) {
            dropdownOpen = false;
        }
    });

    $($.fn.dataTable.tables(true)).DataTable().columns.adjust();

    // Periodically check if 1 minute has passed since the last dropdown click and close it
    setInterval(function() {
        if (dropdownOpen && Date.now() - lastDropdownClick >= 60000) {
            // Close the dropdown
            $('.my-dropdown[data-id="' + id + '"]').dropdown("toggle");
            dropdownOpen = false;
        }
    }, 10000); // END DATATABLES

    // modal function
    $(document).on('click', '#add_building', function(e) {
        e.preventDefault();

        $('#add_modal').modal('show');
    })

    // - submit add modal
    $(document).on('submit', '#add_building_form', function(e) {
        e.preventDefault();

        let form = new FormData(this);
        form.append('add_building', true);

        $.ajax({
            type: "POST",
            url: "./controller/function_class",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('#add_building_btn').addClass('d-none');
                $('.spinner').removeClass('d-none');
            },
            complete: function() {
                $('#add_building_btn').removeClass('d-none');
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
                        text: 'Building added successfully!',
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
                        text: 'Building already exist!',
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

        let building_id = $(this).data('id');
        let form = new FormData();
        form.append('get_building_info', true);
        form.append('building_id', building_id);

        $.ajax({
            type: "POST",
            url: "./controller/function_class",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                console.log(response);
                $('#edit_modal').modal('show');
                let data = JSON.parse(response);
                $('#edit_building_id').val(data.id);
                $('#edit_building_name').val(data.building);
            }
        })
    })

    // submit edit building
    $(document).on('submit', '#edit_building_form', function(e) {
        e.preventDefault();

        let form = new FormData(this);
        form.append('edit_building', true);

        $.ajax({
            type: "POST",
            url: "./controller/function_class",
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('#edit_building_btn').addClass('d-none');
                $('.spinner').removeClass('d-none');
            },
            complete: function() {
                $('#edit_building_btn').removeClass('d-none');
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
                        text: 'Building updated successfully!',
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
                        text: 'Building already exist!',
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
                form.append('delete_building', true);

                $.ajax({
                    type: "POST",
                    url: "./controller/function_class",
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