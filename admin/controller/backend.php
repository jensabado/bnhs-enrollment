<?php
session_start();
require_once '../../database/connection.php';

// admin-login.php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encrypted_password = md5($_POST['password']);

    // Use prepared statement
    $stmt = mysqli_prepare($conn, "SELECT id, password FROM tbl_admin WHERE email = ? AND status = 'enable' AND is_deleted = 'no'");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $id, $dbPassword);

        while (mysqli_stmt_fetch($stmt)) {
            if ($dbPassword == $encrypted_password) {
                if (isset($_POST['rem'])) {
                    setcookie('bnhses_email', $email, time() + (86400 * 30), '/');
                    setcookie('bnhses_password', $password, time() + (86400 * 30), '/');
                } else {
                    setcookie('bnhses_email', '');
                    setcookie('bnhses_password', '');
                }

                $bnhses_admin_id = $id;
                $_SESSION['bnhses_admin_id'] = $bnhses_admin_id;
                echo 'success';
            } else {
                echo 'incorrect password';
            }
        }
    } else {
        echo 'email not registered';
    }

    mysqli_stmt_close($stmt);
}

// bilding.php
if (isset($_POST['add_building'])) {
    $building = $_POST['add_building_name'];

    $stmt = $conn->prepare("SELECT * FROM tbl_building WHERE building = ? AND is_deleted = 'no'");
    $stmt->bind_param("s", $building);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'already exist';
    } else {
        $stmt = $conn->prepare("INSERT INTO tbl_building (building) VALUES (?)");
        $stmt->bind_param("s", $building);
        if ($stmt->execute()) {
            echo 'success';
        }
        $stmt->close();
    }
}

if (isset($_POST['get_building_info'])) {
    $building_id = $_POST['building_id'];

    $getBuildingStmt = mysqli_prepare($conn, "SELECT id, building FROM tbl_building WHERE id = ?");

    mysqli_stmt_bind_param($getBuildingStmt, "i", $building_id);

    mysqli_stmt_execute($getBuildingStmt);

    $getBuildingResult = mysqli_stmt_get_result($getBuildingStmt);

    $row = mysqli_fetch_assoc($getBuildingResult);

    if ($row) {
        $result_array = array(
            'id' => $row['id'],
            'building' => $row['building'],
        );

        echo json_encode($result_array);
    } else {
        echo 'Building not found';
    }

    mysqli_stmt_close($getBuildingStmt);
}

if (isset($_POST['edit_building'])) {
    $id = $_POST['edit_building_id'];
    $building = $_POST['edit_building_name'];

    $stmt = $conn->prepare("SELECT * FROM tbl_building WHERE building = ? AND id != ? AND is_deleted = 'no'");
    $stmt->bind_param("si", $building, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'already exist';
    } else {
        $stmt = $conn->prepare("UPDATE tbl_building SET building = ? WHERE id = ?");
        $stmt->bind_param("si", $building, $id);

        if ($stmt->execute()) {
            echo 'success';
        }

        $stmt->close();
    }
}

if (isset($_POST['delete_building'])) {
    $id = $_POST['id'];

    // Prepare the UPDATE query using a prepared statement
    $deleteStmt = mysqli_prepare($conn, "UPDATE tbl_building SET is_deleted = 'yes' WHERE id = ?");

    // Bind parameter
    mysqli_stmt_bind_param($deleteStmt, "i", $id);

    // Execute the prepared statement
    $delete = mysqli_stmt_execute($deleteStmt);

    if ($delete) {
        echo 'success';
    }

    // Close the prepared statement
    mysqli_stmt_close($deleteStmt);
}

// room.php
if (isset($_POST['add_room'])) {
    $id = $_POST['add_building_id'];
    $filter_room = $_POST['add_room_name'];
    $room = preg_replace('/\s+/', ' ', $filter_room);

    $validationStmt = mysqli_prepare($conn, "SELECT * FROM tbl_room WHERE building_id = ? AND room = ? AND is_deleted = 'no'");

    mysqli_stmt_bind_param($validationStmt, "ss", $id, $room);

    mysqli_stmt_execute($validationStmt);

    $validationResult = mysqli_stmt_get_result($validationStmt);

    if (mysqli_num_rows($validationResult) > 0) {
        echo 'already exist';
    } else {
        $insertStmt = mysqli_prepare($conn, "INSERT INTO tbl_room (building_id, room) VALUES (?, ?)");

        mysqli_stmt_bind_param($insertStmt, "ss", $id, $room);

        $insert = mysqli_stmt_execute($insertStmt);

        if ($insert) {
            echo 'success';
        }
    }

    mysqli_stmt_close($validationStmt);
    mysqli_stmt_close($insertStmt);
}

if (isset($_POST['get_room_info'])) {
    $id = $_POST['room_id'];

    $getRoomInfoStmt = mysqli_prepare($conn, "SELECT id, building_id, room FROM tbl_room WHERE id = ?");

    mysqli_stmt_bind_param($getRoomInfoStmt, "i", $id);

    mysqli_stmt_execute($getRoomInfoStmt);

    $getRoomInfoResult = mysqli_stmt_get_result($getRoomInfoStmt);

    $row = mysqli_fetch_assoc($getRoomInfoResult);

    if ($row) {
        $result = array(
            'id' => $row['id'],
            'building_id' => $row['building_id'],
            'room_name' => $row['room'],
        );

        echo json_encode($result);
    } else {
        echo 'Room not found';
    }

    mysqli_stmt_close($getRoomInfoStmt);
}

if (isset($_POST['edit_room'])) {
    $id = $_POST['edit_room_id'];
    $building_id = $_POST['edit_building_id'];
    $filter_room_name = $_POST['edit_room_name'];
    $room_name = preg_replace('/\s+/', ' ', $filter_room_name);

    $validationStmt = mysqli_prepare($conn, "SELECT id FROM tbl_room WHERE room = ? AND building_id = ? AND id != ?");

    mysqli_stmt_bind_param($validationStmt, "sii", $room_name, $building_id, $id);

    mysqli_stmt_execute($validationStmt);

    $validationResult = mysqli_stmt_get_result($validationStmt);

    if (mysqli_num_rows($validationResult) > 0) {
        echo 'already exist';
    } else {
        $updateStmt = mysqli_prepare($conn, "UPDATE tbl_room SET building_id = ?, room = ? WHERE id = ?");

        mysqli_stmt_bind_param($updateStmt, "isi", $building_id, $room_name, $id);

        $update = mysqli_stmt_execute($updateStmt);

        if ($update) {
            echo 'success';
        }
    }

    mysqli_stmt_close($validationStmt);
    mysqli_stmt_close($updateStmt);
}

if (isset($_POST['delete_room'])) {
    $id = $_POST['id'];

    // Prepare the UPDATE query using a prepared statement
    $deleteStmt = mysqli_prepare($conn, "UPDATE tbl_room SET is_deleted = 'yes' WHERE id = ?");

    // Bind parameter
    mysqli_stmt_bind_param($deleteStmt, "i", $id);

    // Execute the prepared statement
    $delete = mysqli_stmt_execute($deleteStmt);

    if ($delete) {
        echo 'success';
    }

    // Close the prepared statement
    mysqli_stmt_close($deleteStmt);
}

// section.php
if (isset($_POST['get_room'])) {
    $building_id = $_POST['building_id'];

    $stmt = $conn->prepare("SELECT id, room FROM tbl_room WHERE building_id = ? AND is_deleted = 'no'");
    $stmt->bind_param("i", $building_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows != 0) {
        echo '<option value="">SELECT ROOM</option>';

        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars(ucwords($row['room'])) . '</option>';
        }
    }

    $stmt->close();
}

if (isset($_POST['add_section'])) {
    $building_id = $_POST['add_section_building_id'];
    $room_id = $_POST['add_section_room_id'];
    $name = $_POST['add_section_name'];

    $stmt = $conn->prepare("SELECT * FROM tbl_section WHERE building_id = ? AND room_id = ? AND section = ?");
    $stmt->bind_param("iis", $building_id, $room_id, $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'already exist';
    } else {
        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO tbl_section (building_id, room_id, section) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $building_id, $room_id, $name);
        $insert = $stmt->execute();

        if ($insert) {
            echo 'success';
        }
    }

    $stmt->close();
}

if (isset($_POST['get_section_info'])) {
    $id = $_POST['section_id'];

    $getSectionInfoStmt = mysqli_prepare($conn, "SELECT id, building_id, room_id, section FROM tbl_section WHERE id = ?");

    mysqli_stmt_bind_param($getSectionInfoStmt, "i", $id);

    mysqli_stmt_execute($getSectionInfoStmt);

    $getRoomInfoResult = mysqli_stmt_get_result($getSectionInfoStmt);

    $row = mysqli_fetch_assoc($getRoomInfoResult);

    if ($row) {
        $result = array(
            'id' => $row['id'],
            'building_id' => $row['building_id'],
            'room_id' => $row['room_id'],
            'section' => $row['section'],
        );

        echo json_encode($result);
    } else {
        echo 'Room not found';
    }

    mysqli_stmt_close($getSectionInfoStmt);
}

if (isset($_POST['edit_section'])) {
    $id = $_POST['edit_section_id'];
    $building_id = $_POST['edit_section_building_id'];
    $room_id = $_POST['edit_section_room_id'];
    $name = $_POST['edit_section_name'];

    $stmt = $conn->prepare("SELECT * FROM tbl_section WHERE building_id = ? AND room_id = ? AND section = ? AND id != ? AND is_deleted = 'no'");
    $stmt->bind_param("iisi", $building_id, $room_id, $name, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo 'already exist';
    } else {
        $stmt->close();

        $stmt = $conn->prepare("UPDATE tbl_section SET building_id = ?, room_id = ?, section = ? WHERE id = ?");
        $stmt->bind_param("iisi", $building_id, $room_id, $name, $id);
        $update = $stmt->execute();

        if ($update) {
            echo 'success';
        }
    }

    $stmt->close();
}

if (isset($_POST['delete_section'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("UPDATE tbl_section SET is_deleted = 'yes' WHERE id = ?");
    $stmt->bind_param("i", $id);
    $delete = $stmt->execute();

    if ($delete) {
        echo 'success';
    }

    $stmt->close();
}

// subject.php
if (isset($_POST['add_subject'])) {
    $grade_level = $_POST['add_grade_level'];
    $subject = $_POST['add_subject_name'];

    $validation_query = "SELECT * FROM tbl_subject WHERE grade_level_id = ? AND subject = ? AND is_deleted = 'no'";
    $stmt = mysqli_prepare($conn, $validation_query);

    mysqli_stmt_bind_param($stmt, "is", $grade_level, $subject);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo 'already exist';
    } else {
        $insert_query = "INSERT INTO tbl_subject (grade_level_id, subject) VALUES (?, ?)";
        $insert_stmt = mysqli_prepare($conn, $insert_query);

        mysqli_stmt_bind_param($insert_stmt, "is", $grade_level, $subject);
        $insert_result = mysqli_stmt_execute($insert_stmt);

        if ($insert_result) {
            echo 'success';
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($insert_stmt);
}

if (isset($_POST['get_subject_info'])) {
    $id = $_POST['subject_id'];

    $getSubjectInfoStmt = mysqli_prepare($conn, "SELECT id, grade_level_id, subject FROM tbl_subject WHERE id = ?");

    mysqli_stmt_bind_param($getSubjectInfoStmt, "i", $id);

    mysqli_stmt_execute($getSubjectInfoStmt);

    $getSubjectInfoResult = mysqli_stmt_get_result($getSubjectInfoStmt);

    $row = mysqli_fetch_assoc($getSubjectInfoResult);

    if ($row) {
        $result = array(
            'id' => $row['id'],
            'grade_level_id' => $row['grade_level_id'],
            'subject' => $row['subject'],
        );

        echo json_encode($result);
    } else {
        echo 'Subject not found';
    }

    mysqli_stmt_close($getSubjectInfoStmt);
}

if (isset($_POST['edit_subject'])) {
    $id = $_POST['edit_subject_id'];
    $grade_level = $_POST['edit_grade_level'];
    $subject = $_POST['edit_subject_name'];

    $validation_query = "SELECT * FROM tbl_subject WHERE grade_level_id = ? AND subject = ? AND id != ?";
    $stmt = mysqli_prepare($conn, $validation_query);

    mysqli_stmt_bind_param($stmt, "isi", $grade_level, $subject, $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo 'already exist';
    } else {
        $update_query = "UPDATE tbl_subject SET grade_level_id = ?, subject = ? WHERE id = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);

        mysqli_stmt_bind_param($update_stmt, "isi", $grade_level, $subject, $id);
        $update_result = mysqli_stmt_execute($update_stmt);

        if ($update_result) {
            echo 'success';
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($update_stmt);
}

if (isset($_POST['delete_subject'])) {
    $id = $_POST['id'];

    $delete_query = "UPDATE tbl_subject SET is_deleted = 'yes' WHERE id = ?";
    $delete_stmt = mysqli_prepare($conn, $delete_query);

    mysqli_stmt_bind_param($delete_stmt, "i", $id);
    $delete_result = mysqli_stmt_execute($delete_stmt);

    if ($delete_result) {
        echo 'success';
    }

    mysqli_stmt_close($delete_stmt);
}

// teacher.php
if (isset($_POST['add_teacher'])) {
    $fname = $_POST['add_f_name'];
    $lname = $_POST['add_l_name'];
    $gender = $_POST['add_gender'];
    $mobile_no = $_POST['add_mobile_no'];
    $email = $_POST['add_email'];
    $password = $_POST['add_password'];
    $encrypted_password = md5($password);

    if (isset($_FILES['add_avatar']) && !empty($_FILES['add_avatar']['name'])) {
        $avatar = $_FILES['add_avatar']['name'];
        $avatar_tmp = $_FILES['add_avatar']['tmp_name'];

        $validation = mysqli_query($conn, "SELECT * FROM tbl_teacher WHERE email = '$email' AND is_deleted = 'no'");

        if (mysqli_num_rows($validation) > 0) {
            echo 'already exist';
        } else {
            $img_ext = explode('.', $avatar);
            $img_ext = strtolower(end($img_ext));

            $new_img_name = uniqid() . '.' . $img_ext;

            $insert = mysqli_query($conn, "INSERT INTO tbl_teacher (f_name, l_name, gender, mobile_no, avatar, email, password) VALUES ('$fname', '$lname', '$gender', '$mobile_no', '$new_img_name', '$email', '$encrypted_password')");

            if ($insert) {
                move_uploaded_file($avatar_tmp, '../assets/img/avatar/' . $new_img_name);

                echo 'success';
            }
        }
    } else {
        $validation = mysqli_query($conn, "SELECT * FROM tbl_teacher WHERE email = '$email' AND is_deleted = 'no'");

        if (mysqli_num_rows($validation) > 0) {
            echo 'already exist';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO tbl_teacher (f_name, l_name, gender, mobile_no, email, password) VALUES ('$fname', '$lname', '$gender', '$mobile_no', '$email', '$encrypted_password')");

            if ($insert) {
                echo 'success';
            }
        }
    }
}

if (isset($_POST['get_teacher_info'])) {
    $id = $_POST['teacher_id'];

    $getTeacherInfoStmt = mysqli_prepare($conn, "SELECT id, f_name, l_name, gender, mobile_no, avatar, status FROM tbl_teacher WHERE id = ?");

    mysqli_stmt_bind_param($getTeacherInfoStmt, "i", $id);

    mysqli_stmt_execute($getTeacherInfoStmt);

    $getTeacherInfoResult = mysqli_stmt_get_result($getTeacherInfoStmt);

    $row = mysqli_fetch_assoc($getTeacherInfoResult);

    if ($row) {
        $result = array(
            'id' => $row['id'],
            'f_name' => $row['f_name'],
            'l_name' => $row['l_name'],
            'gender' => $row['gender'],
            'mobile_no' => $row['mobile_no'],
            'avatar' => $row['avatar'],
            'status' => $row['status'],
        );

        echo json_encode($result);
    } else {
        echo 'Teacher not found';
    }

    mysqli_stmt_close($getTeacherInfoStmt);
}

if (isset($_POST['edit_teacher'])) {
    $id = $_POST['edit_teacher_id'];
    $fname = $_POST['edit_f_name'];
    $lname = $_POST['edit_l_name'];
    $gender = $_POST['edit_gender'];
    $mobile_no = $_POST['edit_mobile_no'];
    $status = $_POST['edit_status'];

    if (isset($_FILES['edit_avatar']) && !empty($_FILES['edit_avatar']['name'])) {
        $avatar = $_FILES['edit_avatar']['name'];
        $avatar_tmp = $_FILES['edit_avatar']['tmp_name'];

        $img_ext = explode('.', $avatar);
        $img_ext = strtolower(end($img_ext));

        $new_img_name = uniqid() . '.' . $img_ext;

        $get_old_avatar = mysqli_prepare($conn, "SELECT avatar FROM tbl_teacher WHERE id = ?");
        mysqli_stmt_bind_param($get_old_avatar, "i", $id);
        mysqli_stmt_execute($get_old_avatar);
        $get_old_avatar_result = mysqli_stmt_get_result($get_old_avatar);
        $old_avatar_row = mysqli_fetch_assoc($get_old_avatar_result);
        $old_avatar = $old_avatar_row['avatar'];

        $update = mysqli_prepare($conn, "UPDATE tbl_teacher SET f_name = ?, l_name = ?, gender = ?, mobile_no = ?, status = ?, avatar = ? WHERE id = ?");
        mysqli_stmt_bind_param($update, "ssssssi", $fname, $lname, $gender, $mobile_no, $status, $new_img_name, $id);

        if (mysqli_stmt_execute($update)) {
            if (file_exists('../assets/img/avatar/' . $old_avatar)) {
                unlink('../assets/img/avatar/' . $old_avatar);
            }
            move_uploaded_file($avatar_tmp, '../assets/img/avatar/' . $new_img_name);
            echo 'success';
        } else {
            echo 'error';
        }

        mysqli_stmt_close($update);
    } else {
        $update = mysqli_prepare($conn, "UPDATE tbl_teacher SET f_name = ?, l_name = ?, gender = ?, mobile_no = ?, status = ? WHERE id = ?");
        mysqli_stmt_bind_param($update, "sssssi", $fname, $lname, $gender, $mobile_no, $status, $id);

        if (mysqli_stmt_execute($update)) {
            echo 'success';
        } else {
            echo 'error';
        }

        mysqli_stmt_close($update);
    }

    mysqli_close($conn);
}

if (isset($_POST['delete_teacher'])) {
    $id = $_POST['id'];

    $delete = mysqli_prepare($conn, "UPDATE tbl_teacher SET is_deleted = 'yes' WHERE id = ?");
    mysqli_stmt_bind_param($delete, "i", $id);

    if (mysqli_stmt_execute($delete)) {
        echo 'success';
    } else {
        echo 'error';
    }

    mysqli_stmt_close($delete);
    mysqli_close($conn);
}
