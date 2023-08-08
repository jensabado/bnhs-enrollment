<?php
session_start();
require_once '../../database/connection.php';

// admin-login.php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE email = ? AND status = 'enable'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (md5($password) == $row['password']) {
            $bnhses_admin_id = $row['id'];
            $_SESSION['bnhses_admin_id'] = $bnhses_admin_id;
            echo 'success';
        } else {
            echo 'incorrect password';
        }
    } else {
        echo 'email not registered';
    }

    $stmt->close();
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
            'building' => $row['building']
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

if(isset($_POST['delete_building'])) {
    $id = $_POST['id'];

    // Prepare the UPDATE query using a prepared statement
    $deleteStmt = mysqli_prepare($conn, "UPDATE tbl_building SET is_deleted = 'yes' WHERE id = ?");
    
    // Bind parameter
    mysqli_stmt_bind_param($deleteStmt, "i", $id);
    
    // Execute the prepared statement
    $delete = mysqli_stmt_execute($deleteStmt);

    if($delete) {
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

if(isset($_POST['get_room_info'])) {
    $id = $_POST['room_id'];

    $getRoomInfoStmt = mysqli_prepare($conn, "SELECT id, building_id, room FROM tbl_room WHERE id = ?");
    
    mysqli_stmt_bind_param($getRoomInfoStmt, "i", $id);
    
    mysqli_stmt_execute($getRoomInfoStmt);

    $getRoomInfoResult = mysqli_stmt_get_result($getRoomInfoStmt);

    $row = mysqli_fetch_assoc($getRoomInfoResult);

    if($row) {
        $result = array(
            'id' => $row['id'],
            'building_id' => $row['building_id'],
            'room_name' => $row['room']
        );
        
        echo json_encode($result);
    } else {
        echo 'Room not found';
    }
    
    mysqli_stmt_close($getRoomInfoStmt);
}

if(isset($_POST['edit_room'])) {
    $id = $_POST['edit_room_id'];
    $building_id = $_POST['edit_building_id'];
    $filter_room_name = $_POST['edit_room_name'];
    $room_name = preg_replace('/\s+/', ' ', $filter_room_name);

    $validationStmt = mysqli_prepare($conn, "SELECT id FROM tbl_room WHERE room = ? AND building_id = ? AND id != ?");
    
    mysqli_stmt_bind_param($validationStmt, "sii", $room_name, $building_id, $id);
    
    mysqli_stmt_execute($validationStmt);

    $validationResult = mysqli_stmt_get_result($validationStmt);

    if(mysqli_num_rows($validationResult) > 0) {
        echo 'already exist';
    } else {
        $updateStmt = mysqli_prepare($conn, "UPDATE tbl_room SET building_id = ?, room = ? WHERE id = ?");
        
        mysqli_stmt_bind_param($updateStmt, "isi", $building_id, $room_name, $id);
        
        $update = mysqli_stmt_execute($updateStmt);

        if($update) {
            echo 'success';
        }
    }
    
    mysqli_stmt_close($validationStmt);
    mysqli_stmt_close($updateStmt);
}

if(isset($_POST['delete_room'])) {
    $id = $_POST['id'];

    // Prepare the UPDATE query using a prepared statement
    $deleteStmt = mysqli_prepare($conn, "UPDATE tbl_room SET is_deleted = 'yes' WHERE id = ?");
    
    // Bind parameter
    mysqli_stmt_bind_param($deleteStmt, "i", $id);
    
    // Execute the prepared statement
    $delete = mysqli_stmt_execute($deleteStmt);

    if($delete) {
        echo 'success';
    }
    
    // Close the prepared statement
    mysqli_stmt_close($deleteStmt);
}
