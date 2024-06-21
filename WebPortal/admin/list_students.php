<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/sql_connect.php";
include "../partials/admin_login_required.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Student Data</title>
</head>

<body style='background-image: url("../bg_gradient.jpg"); background-size: 100%; background-attachment: fixed;'>
<div id="navbar">
        <!-- <div id="title">
            <h3>KioskMeet</h3><small> <a href="index.php" style="color: white;"> Admin Panel </a></small>
        </div> -->
        <div id="title">
            <img src="../KioskMeet_Logo_White.png" style="width: 200px;">
            <small style="color: white;float: right;">Admin Panel</small>
        </div>
        <div id="nav-items">
            <div class="nav-item"><a href="/webportal/auth/logout.php">Logout</a></div>
        </div>
    </div>
<div id="table-wrapper">
    <table>
        <tr>
            <th>
                ID
            </th>
            <th>
                NAME
            </th>
            <th>
                DOB
            </th>
            <th>
                SEMESTER
            </th>
            <th>
                BATCH
            </th>
            <th>
                COURSE
            </th>
            <th>
                EDIT DETAILS
            </th>
        </tr>
        <?php
        $sql = "select id,name,dob,semester,batch,course from student";
        $students = mysqli_query($conn, $sql);
        foreach ($students as $student) {
            echo '<tr>';
            foreach ($student as $key => $val) {
                echo "<td>$val</td>";
            }
            $id = $student["id"];
            echo "<td><form action='update_student.php'>
                <input type='number' name='id' id='id' hidden value='$id'>
                <input type='submit' value='Edit'>
                </form></td>";
            echo '</tr>';
        }
        ?>

    </table>
    <div id="credStat"><?php
                        if (has_messages()) {
                            echo "<div id='errors'>";
                            show_messages();
                            delete_messages();
                            echo "</div>";
                        }
                        ?></div>
</div>
</body>

</html>