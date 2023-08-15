<?php
require_once('../database/connection.php');
$page_title = 'Dashboard';
ob_start();
?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <div class="d-flex flex-row align-items-center">
                        <img style="height: 80px;" src="./assets/img/illustration/building.svg" alt="">
                        <div class="d-flex flex-column align-items-end w-100 h-100">
                            <?php
                        $stmt = $conn->prepare("SELECT * FROM tbl_building WHERE is_deleted = ?");
                        $isDeleted = "no";
                        $stmt->bind_param("s", $isDeleted);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $building = $result->num_rows;
                        $stmt->close();
                        ?>
                            <p style="font-weight: 900; color: #274C43;" class="h1"><?= $building ?></p>
                            <p class="h6">Building</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <div class="d-flex flex-row align-items-center">
                        <img style="height: 80px;" src="./assets/img/illustration/room.svg" alt="">
                        <div class="d-flex flex-column align-items-end w-100 h-100">
                            <?php
                        $stmt = $conn->prepare("SELECT tbl_room.id FROM tbl_room LEFT JOIN tbl_building ON tbl_room.building_id = tbl_building.id WHERE tbl_room.is_deleted = ? AND tbl_building.is_deleted = ?");
                        $isDeleted = "no";
                        $isDeletedBuilding = "no";
                        $stmt->bind_param("ss", $isDeleted, $isDeletedBuilding);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $room = $result->num_rows;
                        $stmt->close();
                        ?>
                            <p style="font-weight: 900; color: #274C43;" class="h1"><?= $room ?></p>
                            <p class="h6">Room</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <div class="d-flex flex-row align-items-center">
                        <img style="height: 80px;" src="./assets/img/illustration/section.svg" alt="">
                        <div class="d-flex flex-column align-items-end w-100 h-100">
                            <?php
                        $stmt = $conn->prepare("SELECT tbl_section.id FROM tbl_section LEFT JOIN tbl_room ON tbl_section.room_id = tbl_room.id LEFT JOIN tbl_building ON tbl_section.building_id = tbl_building.id WHERE tbl_building.is_deleted = ? AND tbl_room.is_deleted = ? AND tbl_section.is_deleted = ?");
                        $isDeleted = "no";
                        $isDeletedRoom = "no";
                        $isDeletedBuilding = "no";
                        $stmt->bind_param("sss", $isDeletedBuilding, $isDeletedRoom, $isDeleted);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $section = $result->num_rows;
                        $stmt->close();
                        ?>
                            <p style="font-weight: 900; color: #274C43;" class="h1"><?= $section ?></p>
                            <p class="h6">Section</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <div class="d-flex flex-row align-items-center">
                        <img style="height: 80px;" src="./assets/img/illustration/teacher.svg" alt="">
                        <div class="d-flex flex-column align-items-end w-100 h-100">
                            <?php
                        $stmt = $conn->prepare("SELECT * FROM tbl_teacher WHERE status = ? AND is_deleted = ?");
                        $status = 'enable';
                        $isDeleted = "no";
                        $stmt->bind_param("ss", $status, $isDeleted);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $teacher = $result->num_rows;
                        $stmt->close();
                        ?>
                            <p style="font-weight: 900; color: #274C43;" class="h1"><?= $teacher ?></p>
                            <p class="h6">Teacher</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <div class="d-flex flex-row align-items-center">
                        <img style="height: 80px;" src="./assets/img/illustration/grade_7_sub.svg" alt="">
                        <div class="d-flex flex-column align-items-end w-100 h-100">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM tbl_subject WHERE grade_level_id = ? AND is_deleted = ?");
                            $isDeleted = "no";
                            $gradeLevel = 1;
                            $stmt->bind_param("is", $gradeLevel, $isDeleted);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $grade_7_sub = $result->num_rows;
                            $stmt->close();
                            ?>
                            <p style="font-weight: 900; color: #274C43;" class="h1"><?= $grade_7_sub ?></p>
                            <p class="h6">Grade 7 Subject</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <div class="d-flex flex-row align-items-center">
                        <img style="height: 80px;" src="./assets/img/illustration/grade_8_sub.svg" alt="">
                        <div class="d-flex flex-column align-items-end w-100 h-100">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM tbl_subject WHERE grade_level_id = ? AND is_deleted = ?");
                            $isDeleted = "no";
                            $gradeLevel = 2;
                            $stmt->bind_param("is", $gradeLevel, $isDeleted);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $grade_8_sub = $result->num_rows;
                            $stmt->close();
                            ?>
                            <p style="font-weight: 900; color: #274C43;" class="h1"><?= $grade_8_sub ?></p>
                            <p class="h6">Grade 8 Subject</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <div class="d-flex flex-row align-items-center">
                        <img style="height: 80px;" src="./assets/img/illustration/grade_9_sub.svg" alt="">
                        <div class="d-flex flex-column align-items-end w-100 h-100">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM tbl_subject WHERE grade_level_id = ? AND is_deleted = ?");
                            $isDeleted = "no";
                            $gradeLevel = 3;
                            $stmt->bind_param("is", $gradeLevel, $isDeleted);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $grade_9_sub = $result->num_rows;
                            $stmt->close();
                            ?>
                            <p style="font-weight: 900; color: #274C43;" class="h1"><?= $grade_9_sub ?></p>
                            <p class="h6">Grade 9 Subject</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow p-3">
                    <div class="d-flex flex-row align-items-center">
                        <img style="height: 80px;" src="./assets/img/illustration/grade_10_sub.svg" alt="">
                        <div class="d-flex flex-column align-items-end w-100 h-100">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM tbl_subject WHERE grade_level_id = ? AND is_deleted = ?");
                            $isDeleted = "no";
                            $gradeLevel = 4;
                            $stmt->bind_param("is", $gradeLevel, $isDeleted);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $grade_10_sub = $result->num_rows;
                            $stmt->close();
                            ?>
                            <p style="font-weight: 900; color: #274C43;" class="h1"><?= $grade_10_sub ?></p>
                            <p class="h6">Grade 10 Subject</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
$script = '';
include('./layout/master.php');
?>