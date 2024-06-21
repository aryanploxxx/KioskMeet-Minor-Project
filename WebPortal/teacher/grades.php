<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/faculty_login_required.php";
include "../partials/navbarTeacher.php";
include "../partials/sql_connect.php";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["id"];
    $subject = "";
    $res = mysqli_query($conn, "select subject from faculty, faculty_subjects where id = $id and id = f_id");
    $subject = mysqli_fetch_assoc($res)["subject"];
    foreach ($_POST as $key => $val) {
        $res = mysqli_query($conn,"select semester from student where id = $key");
        $semester = mysqli_fetch_assoc($res)["semester"];
        $ct = mysqli_query($conn, "select * from result where s_id = $key and subject = '$subject'");      
        if (mysqli_num_rows($ct) == 0) {
            mysqli_query($conn, "insert into result values($key,'$subject',$semester,'$val');");
        } else {
            mysqli_query($conn, "update result set grade = '$val' where s_id = $key");
        }
    }
    set_message("the result is successfully saved");
} else {
    if (!isset($_SESSION["batch"])) {
        header("location: select_batch.php");
        die;
    }
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
    <?php
    $grades_array = ["A", "B", "C", "D", "F"];
    $batch = $_SESSION["batch"];
    $res = mysqli_query($conn, "select id,name from student where batch = '$batch'");
    $students = array();
    while ($temp = mysqli_fetch_assoc($res)) {
        array_push($students, $temp);
    }
    $batch = $_SESSION["batch"];
    $id = $_SESSION["id"];
    $subject = "";
    $res = mysqli_query($conn, "select subject from faculty, faculty_subjects where id = $id and id = f_id");
    $subject = mysqli_fetch_assoc($res)["subject"];


    ?> <div id="grades-wrapper">
        <form action="grades.php" method="POST">
            <h4> Batch: <?php echo $batch ?></h4>
            <h4>Subject: <?php echo $subject ?></h4>
            <br>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>F</th>
                </tr>
                <?php
                foreach ($students as $student) {
                    $id = $student["id"];
                    $name = $student["name"];
                    $res = mysqli_query(
                        $conn,
                        "select UPPER(grade) as grade from result 
                        where s_id = $id and UPPER(subject) = UPPER('$subject');"
                    );
                    // echo var_dump($res);
                    $exists = false;
                    $res = mysqli_fetch_assoc($res);
                    if ($res) {
                        $exists = $res["grade"];
                    }
                    echo "<tr>";
                    echo "<td> $id </td>";
                    echo "<td> $name </td>";
                    foreach ($grades_array as $grade) {
                        if ($exists && $exists == $grade) {
                            echo "<td><input type='radio' name='$id' value='$grade' style='border: 0px;width: 100%;height: 1.5em;' checked></td>";
                        } else
                            echo "<td><input type='radio' name='$id' value='$grade' style='border: 0px;width: 100%;height: 1.5em;'></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
            <div class="btn"><input type="submit" value="Save">
            </div>
        </form>
        <?php
        ?>
        <small style="color: red; margin-top: 10px;"><?php
                                                        if (has_messages()) {
                                                            echo "<div id='errors'>";
                                                            show_messages();
                                                            delete_messages();
                                                            echo "</div>";
                                                        }
                                                        ?></small>
        <a href="select_batch.php">Select a different batch</a>
    </div>
</body>

</html>