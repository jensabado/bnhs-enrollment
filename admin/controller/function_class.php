<?php
session_start();

date_default_timezone_set('Asia/Manila');

require_once '../../database/db.php';

class Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function login($email, $password)
    {
        $encryptedPassword = md5($password);

        $stmt = $this->conn->prepare("CALL `checkIfEmailIsRegistered`(?)");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $dbPassword);
            $stmt->fetch();

            if ($dbPassword == $encryptedPassword) {
                if (isset($_POST['rem'])) {
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

    public function addBuilding($building)
    {
        $id = 0;
        $stmt = $this->conn->prepare("CALL `buildingValidation`(?, ?)");
        $stmt->bind_param("si", $building, $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt->close();
            $stmt = $this->conn->prepare("CALL `insertBuilding`(?)");
            $stmt->bind_param("s", $building);

            if ($stmt->execute()) {
                echo 'success';
            }
        }

        $stmt->close();
    }

    public function getBuildingInfo($buildingId)
    {
        $stmt = $this->conn->prepare("CALL `getBuildingInfo`(?)");
        $stmt->bind_param("i", $buildingId);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $building);
            $stmt->fetch();

            if ($stmt) {
                $result_array = array(
                    'id' => $id,
                    'building' => $building,
                );

                echo json_encode($result_array);
            }
        } else {
            echo 'Building not found';
        }
        $stmt->close();
    }

    public function editBuilding($id, $building)
    {
        $stmt = $this->conn->prepare("CALL `buildingValidation`(?, ?)");
        $stmt->bind_param("si", $building, $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt->close();
            $stmt = $this->conn->prepare("CALL `editBuilding`(?, ?)");
            $stmt->bind_param("si", $building, $id);

            if ($stmt->execute()) {
                echo 'success';
            }

            $stmt->close();
        }
    }

    public function deleteBuilding($id)
    {
        $stmt = $this->conn->prepare("CALL `deleteBuilding`(?)");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo 'success';
        }

        $stmt->close();
    }

    public function addRoom($buildingId, $room)
    {
        $id = 0;
        $stmt = $this->conn->prepare("CALL `roomValidation`(?, ?, ?)");
        $stmt->bind_param("sii", $room, $buildingId, $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt->close();
            $stmt = $this->conn->prepare("CALL `insertRoom`(?, ?)");
            $stmt->bind_param('is', $buildingId, $room);

            if ($stmt->execute()) {
                echo 'success';
            }
        }

        $stmt->close();
    }

    public function getRoomInfo($id)
    {
        $stmt = $this->conn->prepare("CALL `getRoomInfo`(?)");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $buildingId, $room);
            $stmt->fetch();

            if ($stmt) {
                $result_array = array(
                    'id' => $id,
                    'building_id' => $buildingId,
                    'room_name' => $room,
                );

                echo json_encode($result_array);
            }
        } else {
            echo 'Room not found';
        }

        $stmt->close();
    }

    public function editRoom($id, $buildingId, $room)
    {
        $stmt = $this->conn->prepare("CALL `roomValidation`(?, ?, ?)");
        $stmt->bind_param('sii', $room, $buildingId, $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt->close();
            $stmt = $this->conn->prepare("CALL `editRoom`(?, ?, ?)");
            $stmt->bind_param("isi", $buildingId, $room, $id);

            if ($stmt->execute()) {
                echo 'success';
            }
        }

        $stmt->close();
    }

    public function deleteRoom($id)
    {
        $stmt = $this->conn->prepare("CALL `deleteRoom`(?)");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo 'success';
        }

        $stmt->close();
    }

    public function getRoom($buildingId)
    {
        $stmt = $this->conn->prepare("CALL `getRoom`(?)");
        $stmt->bind_param("i", $buildingId);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $room);
            echo '<option value="">SELECT ROOM</option>';
            while ($stmt->fetch()) {
                echo '<option value="' . htmlspecialchars($id) . '">' . htmlspecialchars(ucwords($room)) . '</option>';
            }
        } else {
            echo '<option value="" selected disabled>NO RESULT</option>';
        }

        $stmt->close();
    }

    public function addSection($gradeLevelId, $buildingId, $roomId, $name)
    {
        $in_id = 0;
        $stmt = $this->conn->prepare("CALL `sectionValidation`(?, ?, ?, ?, ?);");
        $stmt->bind_param("iiisi", $buildingId, $gradeLevelId, $roomId, $name, $in_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt->close();
            $stmt = $this->conn->prepare("CALL `insertSection`(?, ?, ?, ?);");
            $stmt->bind_param("iiis", $buildingId, $gradeLevelId, $roomId, $name);

            if ($stmt->execute()) {
                echo 'success';
            }
        }

        $stmt->close();
    }

    public function getSectionInfo($id)
    {
        $stmt = $this->conn->prepare("CALL `getSectionInfo`(?)");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $buildingId, $gradeLevelId, $roomId, $section);
            while ($stmt->fetch()) {
                $result_array = array(
                    'id' => $id,
                    'building_id' => $buildingId,
                    'grade_level_id' => $gradeLevelId,
                    'room_id' => $roomId,
                    'section' => $section,
                );
            }

            echo json_encode($result_array);
        } else {
            echo 'Room not found';
        }

        $stmt->close();
    }

    public function editSection($id, $gradeLevelId, $buildingId, $roomId, $name)
    {
        $stmt = $this->conn->prepare("CALL `sectionValidation`(?, ?, ?, ?, ?);");
        $stmt->bind_param("iiisi", $buildingId, $gradeLevelId, $roomId, $name, $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt->close();
            $stmt = $this->conn->prepare("CALL `editSection`(?, ?, ?, ?, ?)");
            $stmt->bind_param("iiisi", $buildingId, $gradeLevelId, $roomId, $name, $id);

            if ($stmt->execute()) {
                echo 'success';
            }
        }

        $stmt->close();
    }

    public function deleteSection($id)
    {
        $stmt = $this->conn->prepare("CALL `deleteSection`(?);");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo 'success';
        }

        $stmt->close();
    }

    public function addSubject($gradeLevel, $subject)
    {
        $id = 0;
        $stmt = $this->conn->prepare("CALL `subjectValidation`(?, ?, ?);");
        $stmt->bind_param("isi", $gradeLevel, $subject, $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt->close();
            $stmt = $this->conn->prepare("CALL `insertSubject`(?, ?);");
            $stmt->bind_param("is", $gradeLevel, $subject);

            if ($stmt->execute()) {
                echo 'success';
            }
        }
    }

    public function getSubjectInfo($id)
    {
        $stmt = $this->conn->prepare("CALL `getSubjectInfo`(?)");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $gradeLevelId, $subject);
            while ($stmt->fetch()) {
                $result_array = array(
                    'id' => $id,
                    'grade_level_id' => $gradeLevelId,
                    'subject' => $subject,
                );
            }
            echo json_encode($result_array);
        } else {
            echo 'Subject not found';
        }

        $stmt->close();
    }

    public function editSubject($id, $gradeLevel, $subject)
    {
        $stmt = $this->conn->prepare("CALL `subjectValidation`(?, ?, ?)");
        $stmt->bind_param('isi', $gradeLevel, $subject, $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo 'already exist';
        } else {
            $stmt->close();
            $stmt = $this->conn->prepare("CALL `editSubject`(?, ?, ?)");
            $stmt->bind_param('isi', $gradeLevel, $subject, $id);

            if ($stmt->execute()) {
                echo 'success';
            }
        }

        $stmt->close();
    }

    public function deleteSubject($id)
    {
        $stmt = $this->conn->prepare("CALL `deleteSubject`(?)");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo 'success';
        }

        $stmt->close();
    }

    public function addTeacher($fname, $lname, $gender, $mobileNo, $email, $password, $avatar)
    {
        $encryptedPassword = md5($password);
        $id = 0;
        $stmt = $this->conn->prepare("CALL `teacherValidation`(?, ?)");
        $stmt->bind_param("si", $email, $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "already exist";
        } else {
            $stmt->close();
            $newImageName = '';

            if (!empty($avatar)) {
                $avatar = $_FILES["add_avatar"]["name"];
                $img_ext = pathinfo($avatar, PATHINFO_EXTENSION);
                $newImageName = uniqid() . "." . $img_ext;
                $avatarTmp = $_FILES["add_avatar"]["tmp_name"];
                move_uploaded_file($avatarTmp, "../assets/img/avatar/" . $newImageName);
            }

            $stmt = $this->conn->prepare("CALL `insertTeacher`(?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $fname, $lname, $gender, $mobileNo, $newImageName, $email, $encryptedPassword);

            if ($stmt->execute()) {
                echo "success";
            }
            $stmt->close();
        }
    }
}

// ########################################

$database = new Database();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $database->login($email, $password);
}

if (isset($_POST['add_building'])) {
    $building = $_POST['add_building_name'];
    $database->addBuilding($building);
}

if (isset($_POST['get_building_info'])) {
    $building = $_POST['building_id'];
    $database->getBuildingInfo($building);
}

if (isset($_POST['edit_building'])) {
    $id = $_POST['edit_building_id'];
    $building = $_POST['edit_building_name'];
    $database->editBuilding($id, $building);
}

if (isset($_POST['delete_building'])) {
    $id = $_POST['id'];
    $database->deleteBuilding($id);
}

if (isset($_POST['add_room'])) {
    $buildingId = $_POST['add_building_id'];
    $filterRoom = $_POST['add_room_name'];
    $room = preg_replace('/\s+/', ' ', $filterRoom);
    $database->addRoom($buildingId, $room);
}

if (isset($_POST['get_room_info'])) {
    $id = $_POST['room_id'];
    $database->getRoomInfo($id);
}

if (isset($_POST['edit_room'])) {
    $id = $_POST['edit_room_id'];
    $buildingId = $_POST['edit_building_id'];
    $filterRoomName = $_POST['edit_room_name'];
    $room = preg_replace('/\s+/', ' ', $filterRoomName);
    $database->editRoom($id, $buildingId, $room);
}

if (isset($_POST['delete_room'])) {
    $id = $_POST['id'];
    $database->deleteRoom($id);
}

if (isset($_POST['get_room'])) {
    $buildingId = $_POST['building_id'];
    $database->getRoom($buildingId);
}

if (isset($_POST['add_section'])) {
    $gradeLevelId = $_POST['add_grade_level_id'];
    $buildingId = $_POST['add_section_building_id'];
    $roomId = $_POST['add_section_room_id'];
    $name = $_POST['add_section_name'];
    $database->addSection($gradeLevelId, $buildingId, $roomId, $name);
}

if (isset($_POST['get_section_info'])) {
    $id = $_POST['section_id'];
    $database->getSectionInfo($id);
}

if (isset($_POST['edit_section'])) {
    $id = $_POST['edit_section_id'];
    $gradeLevelId = $_POST['edit_grade_level_id'];
    $buildingId = $_POST['edit_section_building_id'];
    $roomId = $_POST['edit_section_room_id'];
    $name = $_POST['edit_section_name'];
    $database->editSection($id, $gradeLevelId, $buildingId, $roomId, $name);
}

if (isset($_POST['delete_section'])) {
    $id = $_POST['id'];
    $database->deleteSection($id);
}

if (isset($_POST['add_subject'])) {
    $gradeLevel = $_POST['add_grade_level'];
    $subject = $_POST['add_subject_name'];
    $database->addSubject($gradeLevel, $subject);
}

if (isset($_POST['get_subject_info'])) {
    $id = $_POST['subject_id'];
    $database->getSubjectInfo($id);
}

if (isset($_POST['edit_subject'])) {
    $id = $_POST['edit_subject_id'];
    $gradeLevel = $_POST['edit_grade_level'];
    $subject = $_POST['edit_subject_name'];
    $database->editSubject($id, $gradeLevel, $subject);
}

if (isset($_POST['delete_subject'])) {
    $id = $_POST['id'];
    $database->deleteSubject($id);
}

if (isset($_POST['add_teacher'])) {
    $fname = $_POST["add_f_name"];
    $lname = $_POST["add_l_name"];
    $gender = $_POST["add_gender"];
    $mobileNo = $_POST["add_mobile_no"];
    $email = $_POST["add_email"];
    $password = $_POST["add_password"];
    $avatar = $_FILES["add_avatar"]["tmp_name"] ?? '';
    $database->addTeacher($fname, $lname, $gender, $mobileNo, $email, $password, $avatar);
}
