<?php
session_start();

date_default_timezone_set('Asia/Manila');

require_once '../../database/db.php';

class Database
{
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function login($email, $password) {
        $encryptedPassword = md5($password);

        $stmt = $this->conn->prepare("SELECT id, password FROM tbl_admin WHERE email = ? AND status = 'enable' AND is_deleted = 'no'");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            $stmt->bind_result($id, $dbPassword);
            $stmt->fetch();

            if($dbPassword == $encryptedPassword) {
                if(isset($_POST['rem'])) {
                    setcookie('bnhses_email', $email, time() + 86400 * 30, "/");
                    setcookie('bnhses_password', $password, time() + 86400 * 30, "/");
                } else {
                    setcookie('bnhses_email', '');
                    setcookie('bnhses_password', '');
                }

                $_SESSION['bnhses_admin_id'] = $id;
                echo 'success';
            } else {
                echo 'incorrect password';
            }
        } else {
            echo 'email not registered';
        }
        $stmt->close();
    }

    public function addBuilding($building) {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_building WHERE building = ? AND is_deleted = 'no'");
        $stmt->bind_param("s", $building);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt = $this->conn->prepare("INSERT INTO tbl_building (building) VALUES (?)");
            $stmt->bind_param("s", $building);

            if($stmt->execute()) {
                echo 'success';
            }
        }

        $stmt->close();
    }

    public function getBuildingInfo($buildingId) {
        $stmt = $this->conn->prepare("SELECT id, building FROM tbl_building WHERE id = ? AND is_deleted = 'no'");
        $stmt->bind_param("i", $buildingId);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            $stmt->bind_result($id, $building);
            $stmt->fetch();

            if($stmt) {
                $result_array = array(
                    'id' => $id,
                    'building' => $building
                );

                echo json_encode($result_array);
            }
        } else {
            echo 'Building not found';
        }
        $stmt->close();
    }

    public function editBuilding($id, $building) {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_building WHERE building = ? AND id != ? AND is_deleted = 'no'");
        $stmt->bind_param("si", $building, $id);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt = $this->conn->prepare("UPDATE tbl_building SET building = ? WHERE id = ?");
            $stmt->bind_param("si", $building, $id);

            if($stmt->execute()) {
                echo 'success';
            }

            $stmt->close();
        }
    }

    public function deleteBuilding($id) {
        $stmt = $this->conn->prepare("UPDATE tbl_building SET is_deleted = 'yes' WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if($stmt->execute()) {
            echo 'success';
        }

        $stmt->close();
    }

    public function addRoom($buildingId, $room) {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_room LEFT JOIN tbl_building ON tbl_room.building_id = tbl_building.id WHERE tbl_room.building_id = ? AND tbl_room.room = ? AND tbl_room.is_deleted = 'no' AND tbl_building.is_deleted = 'no'");
        $stmt->bind_param("is", $buildingId, $room);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt = $this->conn->prepare("INSERT INTO tbl_room (building_id, room) VALUES (?, ?)");
            $stmt->bind_param('is', $buildingId, $room);

            if($stmt->execute()) {
                echo 'success';
            }
        }

        $stmt->close();
    }

    public function getRoomInfo($id) {
        $stmt = $this->conn->prepare("SELECT id, building_id, room FROM tbl_room WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            $stmt->bind_result($id, $buildingId, $room);
            $stmt->fetch();

            if($stmt) {
                $result_array = array(
                    'id' => $id,
                    'building_id' => $buildingId,
                    'room_name' => $room
                );

                echo json_encode($result_array);
            }
        } else {
            echo 'Room not found';
        }

        $stmt->close();
    }

    public function editRoom($id, $buildingId, $room) {
        $stmt = $this->conn->prepare("SELECT id FROM tbl_room WHERE room = ? AND building_id = ? AND id != ?");
        $stmt->bind_param('sii', $room, $buildingId, $id);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt = $this->conn->prepare("UPDATE tbl_room SET building_id = ?, room = ? WHERE id = ?");
            $stmt->bind_param("isi", $buildingId, $room, $id);

            if($stmt->execute()) {
                echo 'success';
            }
        }

        $stmt->close();
    }

    public function deleteRoom($id) {
        $stmt = $this->conn->prepare("UPDATE tbl_room SET is_deleted = 'yes' WHERE id = ?");
        $stmt->bind_param('i', $id);

        if($stmt->execute()) {
            echo 'success';
        }

        $stmt->close();
    }
}

$database = new Database();

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $database->login($email, $password);
}

if(isset($_POST['add_building'])) {
    $building = $_POST['add_building_name'];
    $database->addBuilding($building);
}

if(isset($_POST['get_building_info'])) {
    $building = $_POST['building_id'];
    $database->getBuildingInfo($building);
}

if(isset($_POST['edit_building'])) {
    $id = $_POST['edit_building_id'];
    $building = $_POST['edit_building_name'];
    $database->editBuilding($id, $building);
}

if(isset($_POST['delete_building'])) {
    $id = $_POST['id'];
    $database->deleteBuilding($id);
}

if(isset($_POST['add_room'])) {
    $buildingId = $_POST['add_building_id'];
    $filterRoom = $_POST['add_room_name'];
    $room = preg_replace('/\s+/', ' ', $filterRoom);
    $database->addRoom($buildingId, $room);
}

if(isset($_POST['get_room_info'])) {
    $id = $_POST['room_id'];
    $database->getRoomInfo($id);
}

if(isset($_POST['edit_room'])) {
    $id = $_POST['edit_room_id'];
    $buildingId = $_POST['edit_building_id'];
    $filterRoomName = $_POST['edit_room_name'];
    $room = preg_replace('/\s+/', ' ', $filterRoomName);
    $database->editRoom($id, $buildingId, $room);
}

if(isset($_POST['delete_room'])) {
    $id = $_POST['id'];
    $database->deleteRoom($id);
}