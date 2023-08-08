<?php
session_start();
require_once '../../database/connection-pdo.php';

if (isset($_POST['building'])) {
    $column = array('id', 'building');

    $query = "SELECT * FROM tbl_building WHERE is_deleted = 'no'";

    if (isset($_POST['search']['value'])) {
        $query .= '
 AND (id LIKE "%' . $_POST['search']['value'] . '%"
 OR building LIKE "%' . $_POST['search']['value'] . '%" )
 ';
    }

    if (isset($_POST['order'])) {
        $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
    } else {
        $query .= 'ORDER BY id DESC ';
    }

    $query1 = '';

    if ($_POST['length'] != -1) {
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $statement = $connect->prepare($query);

    $statement->execute();

    $number_filter_row = $statement->rowCount();

    $statement = $connect->prepare($query . $query1);

    $statement->execute();

    $result = $statement->fetchAll();

    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = '#' . $row['id'];
        $sub_array[] = ucwords($row['building']);
        $sub_array[] = '<div class="d-flex flex-row align-items-center gap-2" style="gap: 5px;"> <button type="button" class="btn btn-primary d-flex align-items-center gap-1" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-regular fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger d-flex align-items-center gap-1" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button></div>';
        $data[] = $sub_array;
    }

    function count_all_data($connect)
    {
        $query = "SELECT * FROM tbl_building WHERE is_deleted = 'no'";
        $statement = $connect->prepare($query);
        $statement->execute();
        return $statement->rowCount();
    }

    $output = array(
        'draw' => intval($_POST['draw']),
        'recordsTotal' => count_all_data($connect),
        'recordsFiltered' => $number_filter_row,
        'data' => $data,
    );

    echo json_encode($output);
}

if (isset($_POST['room'])) {
    $column = array('id', 'building_name', 'room');

    $query = "SELECT tbl_room.id, tbl_building.building, tbl_room.room
        FROM tbl_room
        LEFT JOIN tbl_building
        ON tbl_room.building_id = tbl_building.id
        WHERE tbl_building.is_deleted = 'no' AND tbl_room.is_deleted = 'no'";

    if (isset($_POST['search']['value'])) {
        $query .= '
        AND (tbl_room.id LIKE "%' . $_POST['search']['value'] . '%"
        OR tbl_building.building LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_room.room LIKE "%' . $_POST['search']['value'] . '%" )
        ';
    }

    if (isset($_POST['order'])) {
        $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
    } else {
        $query .= 'ORDER BY id DESC ';
    }

    $query1 = '';

    if ($_POST['length'] != -1) {
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $statement = $connect->prepare($query);

    $statement->execute();

    $number_filter_row = $statement->rowCount();

    $statement = $connect->prepare($query . $query1);

    $statement->execute();

    $result = $statement->fetchAll();

    $data = array();

    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = '#' . $row['id'];
        $sub_array[] = ucwords($row['building']);
        $sub_array[] = ucwords($row['room']);
        $sub_array[] = '<div class="d-flex flex-row align-items-center gap-2" style="gap: 5px;"> <button type="button" class="btn btn-primary d-flex align-items-center gap-1" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-regular fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger d-flex align-items-center gap-1" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button></div>';
        $data[] = $sub_array;
    }

    function count_all_data($connect)
    {
        $query = "SELECT tbl_room.id, tbl_building.building, tbl_room.room
        FROM tbl_room
        LEFT JOIN tbl_building
        ON tbl_room.building_id = tbl_building.id
        WHERE tbl_building.is_deleted = 'no' AND tbl_room.is_deleted = 'no'";
        $statement = $connect->prepare($query);
        $statement->execute();
        return $statement->rowCount();
    }

    $output = array(
        'draw' => intval($_POST['draw']),
        'recordsTotal' => count_all_data($connect),
        'recordsFiltered' => $number_filter_row,
        'data' => $data,
    );

    echo json_encode($output);
}