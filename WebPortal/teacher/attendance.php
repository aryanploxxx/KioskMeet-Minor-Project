<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/faculty_login_required.php";
include "../partials/navbarTeacher.php";
include "../partials/sql_connect.php";
?>
<?php
if (isset($_SESSION["batch"])) {
    $batch = $_SESSION["batch"];
    $res = mysqli_query(
        $conn,
        "select id, name from student where batch = '$batch' "
    );
    $students = array();
    while ($temp = mysqli_fetch_assoc($res)) {
        array_push($students, $temp);
    }
} else {
    header("location: select_batch1.php");
    die;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["id"];
    $subject = "";
    $res = mysqli_query($conn, "select subject from faculty, faculty_subjects where id = $id and id = f_id");
    $subject = mysqli_fetch_assoc($res)["subject"];
    $data = $_POST;
    $date = $data["date"];
    unset($data["date"]);
    foreach ($data as $id => $status) {
        $res = mysqli_query(
            $conn,
            "select * from attendance 
            where s_id = $id and day = '$date' and subject = '$subject' and s_id = $id"
        );
        if (mysqli_num_rows($res) == 0) {
            mysqli_query($conn, "insert into attendance values($id,'$date','$subject','$status')");
        } else {
            mysqli_query(
                $conn,
                "update attendance set status = '$status'
                where s_id=$id and day = '$date'"
            );
        }
    }
    set_message("Attendance has been saved");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teacher.css">
    <title>Faculty Dashboard | KioskMeet</title>
    <link rel="shortcut icon" href="../KioskMeet_Favicon.png" type="image/x-icon">
</head>

<body>
    <div id="form-wrapper">
        <h3 style="color: white;">ATTENDANCE</h3>
        <form action="attendance.php" method="POST">
            <span style="color: white;">Date:</span><input type="date" name="date" id="today">
            <br>
            <table>
                <tr>
                    <th>ENROLL</th>
                    <th>Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                </tr>
                <?php
                foreach ($students as $student) {
                    $name = $student["name"];
                    $id = $student["id"];
                    echo "<tr>";
                    echo "<td> $id</td>";
                    echo "<td> $name </td>";
                    echo "<td><input type='radio' name='$id' value='1' style='border: 0px;width: 100%;height: 1.5em;'></td>";
                    echo "<td><input type='radio' name='$id' value='0' style='border: 0px;width: 100%;height: 1.5em;'></td>";
                    echo "</tr>";
                }

                ?>
            </table>
            <div class="btn"><input type="submit" value="Save Attendance" style="background-color: white;"> </div>
            <div id="updated"><small><?php
                                        if (has_messages()) {
                                            echo "<div id='errors'>";
                                            show_messages();
                                            delete_messages();
                                            echo "</div>";
                                        }
                                        ?></small></div>
            <a href="select_batch1.php" id="diffbatch" style="text-decoration: none;border: 1px solid white;color: white;">Select a different batch</a>
        </form>
    </div>
    <script src="attendance.js"></script>
</body>

</html>