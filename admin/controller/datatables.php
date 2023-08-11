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

    if($_POST['filter_building'] != '') {
        $query .= 'AND tbl_room.building_id = "'.$_POST['filter_building'].'"';
    }

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

if (isset($_POST['section'])) {
    $column = array('id', 'building_name', 'room', 'section');

    $query = "SELECT tbl_section.id, tbl_building.building, tbl_room.room, tbl_section.section
        FROM tbl_section
        LEFT JOIN tbl_room
        ON tbl_section.room_id = tbl_room.id
        LEFT JOIN tbl_building
        ON tbl_room.building_id = tbl_building.id WHERE tbl_section.is_deleted = 'no' AND tbl_building.is_deleted = 'no' AND tbl_room.is_deleted = 'no'";

    if($_POST['filter_building'] != '') {
        $query .= 'AND tbl_room.building_id = "'.$_POST['filter_building'].'"';
    }

    if($_POST['filter_room'] != '') {
        $query .= 'AND tbl_room.id = "'.$_POST['filter_room'].'"';
    }

    if (isset($_POST['search']['value'])) {
        $query .= '
        AND (tbl_section.id LIKE "%' . $_POST['search']['value'] . '%"
        OR tbl_building.building LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_room.room LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_section.section LIKE "%' . $_POST['search']['value'] . '%" )
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
        $sub_array[] = ucwords($row['section']);
        $sub_array[] = '<div class="d-flex flex-row align-items-center gap-2" style="gap: 5px;"> <button type="button" class="btn btn-primary d-flex align-items-center gap-1" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-regular fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger d-flex align-items-center gap-1" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button></div>';
        $data[] = $sub_array;
    }

    function count_all_data($connect)
    {
        $query = "SELECT tbl_section.id, tbl_building.building, tbl_room.room, tbl_section.section
        FROM tbl_section
        LEFT JOIN tbl_room
        ON tbl_section.room_id = tbl_room.id
        LEFT JOIN tbl_building
        ON tbl_room.building_id = tbl_building.id WHERE tbl_section.is_deleted = 'no' AND tbl_building.is_deleted = 'no' AND tbl_room.is_deleted = 'no'";
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

if (isset($_POST['subject'])) {
    $column = array('id', 'grade_level', 'subject');

    $query = "SELECT tbl_subject.id, tbl_grade_level.grade, tbl_subject.subject
    FROM tbl_subject
    LEFT JOIN tbl_grade_level
    ON tbl_subject.grade_level_id = tbl_grade_level.id
    WHERE tbl_subject.is_deleted = 'no'";

    if($_POST['filter_grade_level'] != '') {
        $query .= 'AND tbl_subject.grade_level_id = "'.$_POST['filter_grade_level'].'"';
    }

    if (isset($_POST['search']['value'])) {
        $query .= '
        AND (tbl_subject.id LIKE "%' . $_POST['search']['value'] . '%"
        OR tbl_grade_level.grade LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_subject.subject LIKE "%' . $_POST['search']['value'] . '%" )
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
        $sub_array[] = ucwords($row['grade']);
        $sub_array[] = ucwords($row['subject']);
        $sub_array[] = '<div class="d-flex flex-row align-items-center gap-2" style="gap: 5px;"> <button type="button" class="btn btn-primary d-flex align-items-center gap-1" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-regular fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger d-flex align-items-center gap-1" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button></div>';
        $data[] = $sub_array;
    }

    function count_all_data($connect)
    {
        $query = "SELECT tbl_subject.id, tbl_grade_level.grade, tbl_subject.subject
        FROM tbl_subject
        LEFT JOIN tbl_grade_level
        ON tbl_subject.grade_level_id = tbl_grade_level.id
        WHERE tbl_subject.is_deleted = 'no'";
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

if (isset($_POST['teacher'])) {
    $column = array('id', 'avatar', 'name', 'gender', 'mobile_no', 'email', 'status');

    $query = "SELECT * FROM tbl_teacher WHERE is_deleted = 'no'";

    if($_POST['filter_status'] != '') {
        $query .= 'AND status = "'.$_POST['filter_status'].'"';
    }

    if (isset($_POST['search']['value'])) {
        $query .= '
        AND (id LIKE "%' . $_POST['search']['value'] . '%"
        OR f_name LIKE "%' . $_POST['search']['value'] . '%" 
        OR l_name LIKE "%' . $_POST['search']['value'] . '%" 
        OR gender LIKE "%' . $_POST['search']['value'] . '%" 
        OR mobile_no LIKE "%' . $_POST['search']['value'] . '%" 
        OR email LIKE "%' . $_POST['search']['value'] . '%" 
        OR status LIKE "%' . $_POST['search']['value'] . '%" )
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

        $image = '<img style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" src="./assets/img/avatar/avatar-5.png" alt="avatar">';

        if($row['avatar'] != NULL) {
            $image = '<img style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;" src="./assets/img/avatar/'.$row['avatar'].'" alt="avatar">';
        }

        $sub_array[] = '#' . $row['id'];
        $sub_array[] = $image;
        $sub_array[] = ucwords($row['f_name'] . ' ' . $row['l_name']);
        $sub_array[] = ucwords($row['gender']);
        $sub_array[] = ucwords($row['mobile_no']);
        $sub_array[] = $row['email'];
        $sub_array[] = ucwords($row['status']);
        $sub_array[] = '<div class="d-flex flex-row align-items-center gap-2" style="gap: 5px;"> <button type="button" class="btn btn-primary d-flex align-items-center gap-1" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-regular fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger d-flex align-items-center gap-1" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button></div>';
        $data[] = $sub_array;
    }

    function count_all_data($connect)
    {
        $query = "SELECT * FROM tbl_teacher WHERE is_deleted = 'no'";
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
?>