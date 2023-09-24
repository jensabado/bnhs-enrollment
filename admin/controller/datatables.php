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
        // $sub_array[] = '<div class="d-flex flex-row align-items-center gap-2" style="gap: 5px;"> <button type="button" class="btn btn-primary d-flex align-items-center gap-1" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-regular fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger d-flex align-items-center gap-1" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button></div>';
        $sub_array[] = '<button class="btn btn-primary dropdown-toggle my-dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button> <div class="dropdown-menu"> <a class="dropdown-item text-primary" href="javascript:void(0)" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-solid fa-pen-to-square mr-3"></i>Edit</a> <a class="dropdown-item text-danger" href="javascript:void(0)" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash mr-3"></i>Delete</a> </div>';
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

    $query = "SELECT tbl_section.id, tbl_building.building, tbl_grade_level.grade, tbl_room.room, tbl_section.section
    FROM tbl_section
    LEFT JOIN tbl_room
    ON tbl_section.room_id = tbl_room.id
    LEFT JOIN tbl_building
    ON tbl_room.building_id = tbl_building.id 
    LEFT JOIN tbl_grade_level
    ON tbl_section.grade_level_id = tbl_grade_level.id
    WHERE tbl_section.is_deleted = 'no' AND tbl_building.is_deleted = 'no' AND tbl_room.is_deleted = 'no'";

    if($_POST['filter_grade_level_id'] != '') {
        $query .= 'AND tbl_section.grade_level_id = "'.$_POST['filter_grade_level_id'].'"';
    }

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
        $sub_array[] = ucwords($row['grade']);
        $sub_array[] = ucwords($row['room']);
        $sub_array[] = ucwords($row['section']);
        $sub_array[] = '<div class="d-flex flex-row align-items-center gap-2" style="gap: 5px;"> <button type="button" class="btn btn-primary d-flex align-items-center gap-1" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-regular fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger d-flex align-items-center gap-1" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button></div>';
        $data[] = $sub_array;
    }

    function count_all_data($connect)
    {
        $query = "SELECT tbl_section.id, tbl_building.building, tbl_grade_level.grade, tbl_room.room, tbl_section.section
        FROM tbl_section
        LEFT JOIN tbl_room
        ON tbl_section.room_id = tbl_room.id
        LEFT JOIN tbl_building
        ON tbl_room.building_id = tbl_building.id 
        LEFT JOIN tbl_grade_level
        ON tbl_section.grade_level_id = tbl_grade_level.id
        WHERE tbl_section.is_deleted = 'no' AND tbl_building.is_deleted = 'no' AND tbl_room.is_deleted = 'no'";
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

    if($_POST['filter_gender'] != '') {
        $query .= 'AND gender = "'.$_POST['filter_gender'].'"';
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

if (isset($_POST['teacher_subject'])) {
    $column = array('id', 'name', 'grade_level', 'subject');

    $query = "SELECT tbl_teacher_subject.id, tbl_teacher.f_name, tbl_teacher.l_name, tbl_grade_level.grade, tbl_subject.`subject`
    FROM tbl_teacher_subject
    LEFT JOIN tbl_teacher
    ON tbl_teacher_subject.teacher_id = tbl_teacher.id
    LEFT JOIN tbl_subject
    ON tbl_teacher_subject.subject_id = tbl_subject.id
    LEFT JOIN tbl_grade_level
    ON tbl_subject.grade_level_id = tbl_grade_level.id
    WHERE tbl_teacher_subject.is_deleted = 'no'";

    if($_POST['filter_grade_level'] != '') {
        $query .= 'AND tbl_subject.grade_level_id = "'.$_POST['filter_grade_level'].'"';
    }

    if($_POST['filter_subject'] != '') {
        $query .= 'AND tbl_subject.id = "'.$_POST['filter_subject'].'"';
    }

    if (isset($_POST['search']['value'])) {
        $query .= '
        AND (tbl_teacher_subject.id LIKE "%' . $_POST['search']['value'] . '%"
        OR tbl_teacher.f_name LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_teacher.l_name LIKE "%' . $_POST['search']['value'] . '%" 
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
        $sub_array[] = ucwords($row['f_name'] . ' ' . $row['l_name']);
        $sub_array[] = ucwords($row['grade']);
        $sub_array[] = ucwords($row['subject']);
        $sub_array[] = '<div class="d-flex flex-row align-items-center gap-2" style="gap: 5px;"> <button type="button" class="btn btn-primary d-flex align-items-center gap-1" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-regular fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger d-flex align-items-center gap-1" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button></div>';
        $data[] = $sub_array;
    }

    function count_all_data($connect)
    {
        $query = "SELECT tbl_teacher_subject.id, tbl_teacher.f_name, tbl_teacher.l_name, tbl_grade_level.grade, tbl_subject.`subject`
        FROM tbl_teacher_subject
        LEFT JOIN tbl_teacher
        ON tbl_teacher_subject.teacher_id = tbl_teacher.id
        LEFT JOIN tbl_subject
        ON tbl_teacher_subject.subject_id = tbl_subject.id
        LEFT JOIN tbl_grade_level
        ON tbl_subject.grade_level_id = tbl_grade_level.id
        WHERE tbl_teacher_subject.is_deleted = 'no'";
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

if (isset($_POST['classroom_advisory'])) {
    $column = array('id', 'grade_level', 'section', 'teacher');

    $query = "SELECT tbl_classroom_advisory.id, tbl_grade_level.grade, tbl_section.section, tbl_teacher.f_name, tbl_teacher.l_name
    FROM tbl_classroom_advisory
    LEFT JOIN tbl_section
    ON tbl_classroom_advisory.section_id = tbl_section.id
    LEFT JOIN tbl_teacher
    ON tbl_classroom_advisory.teacher_id = tbl_teacher.id
    LEFT JOIN tbl_grade_level
    ON tbl_section.grade_level_id = tbl_grade_level.id
    WHERE tbl_section.is_deleted = 'no' AND tbl_classroom_advisory.is_deleted = 'no'";

    if($_POST['filter_grade_level'] != '') {
        $query .= 'AND tbl_section.grade_level_id = "'.$_POST['filter_grade_level'].'"';
    }

    if (isset($_POST['search']['value'])) {
        $query .= '
        AND (tbl_classroom_advisory.id LIKE "%' . $_POST['search']['value'] . '%"
        OR tbl_grade_level.grade LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_section.section LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_teacher.f_name LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_teacher.l_name LIKE "%' . $_POST['search']['value'] . '%" )
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
        $sub_array[] = ucwords($row['section']);
        $sub_array[] = ucwords($row['f_name'] . ' ' . $row['l_name']);;
        $sub_array[] = '<div class="d-flex flex-row align-items-center gap-2" style="gap: 5px;"> <button type="button" class="btn btn-primary d-flex align-items-center gap-1" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-regular fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger d-flex align-items-center gap-1" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button></div>';
        $data[] = $sub_array;
    }

    function count_all_data($connect)
    {
        $query = "SELECT tbl_classroom_advisory.id, tbl_grade_level.grade, tbl_section.section, tbl_teacher.f_name, tbl_teacher.l_name
        FROM tbl_classroom_advisory
        LEFT JOIN tbl_section
        ON tbl_classroom_advisory.section_id = tbl_section.id
        LEFT JOIN tbl_teacher
        ON tbl_classroom_advisory.teacher_id = tbl_teacher.id
        LEFT JOIN tbl_grade_level
        ON tbl_section.grade_level_id = tbl_grade_level.id
        WHERE tbl_section.is_deleted = 'no' AND tbl_classroom_advisory.is_deleted = 'no'";
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

if (isset($_POST['class_sched'])) {
    $column = array('id', 'grade_section', 'time', 'day', 'subject', 'teacher');

    $query = "SELECT tbl_classroom_schedule.id, tbl_grade_level.grade, tbl_section.section, tbl_classroom_schedule.start_time, tbl_classroom_schedule.end_time, tbl_days.`name`, tbl_subject.`subject`, tbl_teacher.f_name, tbl_teacher.l_name
    FROM tbl_classroom_schedule
    LEFT JOIN tbl_section
    ON tbl_classroom_schedule.section_id = tbl_section.id
    LEFT JOIN tbl_grade_level
    ON tbl_section.grade_level_id = tbl_grade_level.id
    LEFT JOIN tbl_days
    ON tbl_classroom_schedule.day_id = tbl_days.id
    LEFT JOIN tbl_subject
    ON tbl_classroom_schedule.subject_id = tbl_subject.id
    LEFT JOIN tbl_teacher
    ON tbl_classroom_schedule.teacher_id = tbl_teacher.id
    WHERE tbl_classroom_schedule.is_deleted = 'no'";

    if($_POST['filter_grade_section'] != '') {
        $query .= 'AND tbl_section.id = "'.$_POST['filter_grade_section'].'"';
    }

    if (isset($_POST['search']['value'])) {
        $query .= '
        AND (tbl_classroom_schedule.id LIKE "%' . $_POST['search']['value'] . '%"
        OR tbl_grade_level.grade LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_section.section LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_classroom_schedule.start_time LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_classroom_schedule.end_time LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_days.`name` LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_subject.`subject` LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_teacher.f_name LIKE "%' . $_POST['search']['value'] . '%" 
        OR tbl_teacher.l_name LIKE "%' . $_POST['search']['value'] . '%" )
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
        $sub_array[] = ucwords($row['grade'] . ' - ' . $row['section']);
        $sub_array[] = date('h:i A', strtotime($row['start_time'])) . ' - ' . date('h:i A', strtotime($row['end_time']));
        $sub_array[] = $row['name'];
        $sub_array[] = $row['subject'];
        $sub_array[] = ucwords($row['f_name'] . ' ' . $row['l_name']);;
        $sub_array[] = '<div class="d-flex flex-row align-items-center gap-2" style="gap: 5px;"> <button type="button" class="btn btn-primary d-flex align-items-center gap-1" id="get_edit" data-id="' . $row['id'] . '"><i class="fa-regular fa-pen-to-square"></i></button> <button type="button" class="btn btn-danger d-flex align-items-center gap-1" id="get_delete" data-id="' . $row['id'] . '"><i class="fa-solid fa-trash"></i></button></div>';
        $data[] = $sub_array;
    }

    function count_all_data($connect)
    {
        $query = "SELECT tbl_classroom_schedule.id, tbl_grade_level.grade, tbl_section.section, tbl_classroom_schedule.start_time, tbl_classroom_schedule.end_time, tbl_days.`name`, tbl_subject.`subject`, tbl_teacher.f_name, tbl_teacher.l_name
        FROM tbl_classroom_schedule
        LEFT JOIN tbl_section
        ON tbl_classroom_schedule.section_id = tbl_section.id
        LEFT JOIN tbl_grade_level
        ON tbl_section.grade_level_id = tbl_grade_level.id
        LEFT JOIN tbl_days
        ON tbl_classroom_schedule.day_id = tbl_days.id
        LEFT JOIN tbl_subject
        ON tbl_classroom_schedule.subject_id = tbl_subject.id
        LEFT JOIN tbl_teacher
        ON tbl_classroom_schedule.teacher_id = tbl_teacher.id
        WHERE tbl_classroom_schedule.is_deleted = 'no'";
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