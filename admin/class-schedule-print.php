<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/bnhs-enrollment/database/connection.php');
if(!isset($_SESSION['bnhses_admin_id'])) {
    echo "<script>
    location.href = 'admin-login';
    </script>";
} else {
    $admin_id = $_SESSION['bnhses_admin_id'];
    $get_admin_info = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE id = $admin_id");
    $fetch_admin_info = mysqli_fetch_array($get_admin_info);
    $admin_name = $fetch_admin_info['name'];

    $section_id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.1">
    <title>Class Schedule Print</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/class-schedule-print.css">
</head>

<body>
    <div class="container-fluid my-5">
        <!-- <button class="btn btn-primary mb-3" id="print_page" onclick="printPage()">PRINT SCHEDULE</button> -->

        <div class="row mb-4 d-flex flex-column align-items-center justify-content-center" id="header_logo">
            <img style="width: 150px;" class="mb-2" src="./assets/img/logo.png" alt="">
            <p class="h3 text-center fw-bold">BACOOR NATIONAL HIGH SCHOOL - MAIN</p>
        </div>
        <?php
        $get_section_info = mysqli_query($conn, "SELECT tbl_grade_level.grade, tbl_section.section, tbl_building.building, tbl_room.room, tbl_teacher.f_name, tbl_teacher.l_name
        FROM tbl_classroom_schedule
        LEFT JOIN tbl_section
        ON tbl_classroom_schedule.section_id = tbl_section.id
        LEFT JOIN tbl_grade_level
        ON tbl_section.grade_level_id = tbl_grade_level.id
        LEFT JOIN tbl_building
        ON tbl_section.building_id = tbl_building.id
        LEFT JOIN tbl_room
        ON tbl_section.room_id = tbl_room.id
        LEFT JOIN tbl_classroom_advisory
        ON tbl_classroom_schedule.section_id = tbl_classroom_advisory.section_id
        LEFT JOIN tbl_teacher
        ON tbl_classroom_advisory.teacher_id = tbl_teacher.id
        WHERE tbl_classroom_schedule.section_id = $section_id AND tbl_classroom_schedule.is_deleted = 'no'
        GROUP BY tbl_classroom_schedule.section_id");

        foreach($get_section_info as $info) {
        ?>
        <div class=" custom_header">
            <p class="fw-bold">
                GRADE & SECTION:
                <span
                    style="font-weight: 500; padding-left: 10px;"><?= ucwords($info['grade'] . ' ' . $info['section']) ?></span>
                <br><br>
                ROOM:
                <span
                    style="font-weight: 500; padding-left: 10px;"><?= ucwords($info['building'] . ' ' . $info['room']) ?></span>
            </p>
            <p class="fw-bold">
                ADVISER:
                <span
                    style="font-weight: 500; padding-left: 10px;"><?= ucwords($info['f_name'] . ' ' . $info['l_name']) ?></span>
                <br><br>

            </p>
        </div>
        <?php
        }
        ?>
        <table class="table">
            <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>

            <?php
            $schedule = array();
            
            $query = "SELECT tbl_classroom_schedule.id, tbl_classroom_schedule.start_time, tbl_classroom_schedule.end_time, tbl_classroom_schedule.day_id, tbl_subject.`subject`, tbl_teacher.f_name, tbl_teacher.l_name
            FROM tbl_classroom_schedule
            LEFT JOIN tbl_subject
            ON tbl_classroom_schedule.subject_id = tbl_subject.id
            LEFT JOIN tbl_teacher
            ON tbl_classroom_schedule.teacher_id = tbl_teacher.id
            WHERE tbl_classroom_schedule.section_id = $section_id AND tbl_classroom_schedule.is_deleted = 'no'
            ORDER BY tbl_classroom_schedule.start_time, tbl_classroom_schedule.day_id";
            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $schedule[date('h:i A', strtotime($row['start_time'])) . ' - ' . date('h:i A', strtotime($row['end_time']))][$row['day_id']] = ucwords($row['subject']) . '<br>' . ucwords($row['f_name'] . ' ' . $row['l_name']);
                }
                
                foreach ($schedule as $time => $days) {
                    echo '<tr>';
                    echo '<td class="fw-bold" style="white-space: nowrap;">' . $time . '</td>';
                    
                    $daysOfWeek = array('1', '2', '3', '4', '5');
                    
                    foreach ($daysOfWeek as $day) {
                        echo '<td>';
                        if (isset($days[$day])) {
                            echo $days[$day];
                        }
                        echo '</td>';
                    }
                    
                    echo '</tr>';
                }
            } else {
                echo '<tr>
                <td colspan="6">NO RESULT</td>
                </tr>';
            }
            ?>
        </table>
        <div class="row" id="printed_info">
            <p class="fw-bold">Printed By: <span style="font-weight: 500; padding-left: 10px"><?= $admin_name ?></span>
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script>
    function printPage() {
        window.print();
        return false;
    }

    window.onload = function() {
        window.print();
    }

    window.onafterprint = function() {
        // Redirect back to the index page
        window.close();
    }
    </script>
</body>

</html>