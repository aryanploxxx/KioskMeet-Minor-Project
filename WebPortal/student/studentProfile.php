<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/student_login_required.php";
include "../partials/sql_connect.php";
?>
<?php
$id = $_SESSION['id'];
$student_res = mysqli_query($conn, "select name,dob,semester,batch,course from student where id = $id");
$student = mysqli_fetch_assoc($student_res);
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./student.css">
    <title>Student Dashboard | KioskMeet</title>
    <link rel="shortcut icon" href="../KioskMeet_Favicon.png" type="image/x-icon">
    <style>
        body {
            background-image: url(../media/bg_png.png);
            background-repeat: no-repeat;
            background-color: #f8f8f8;
            background-position-y: bottom;
            background-position-x: center;
            background-size: 70%;
        }
    </style>
</head>

<body>
    <?php include "../partials/navbarStudent.php"  ?>
    <!-- <div>
        <img src="../media/bg_png.png" style="width:70%">
    </div> -->
    <div id="container">
        <div id="profile-wrapper">
            <h2 style="color: black;">Status: Logged in</h2>
            <table>
                <?php
                foreach ($student as $key => $val) {
                    echo "<tr>
                    <div id='key'><th>$key</th></div>
                    <td>$val</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <?php
        $string = 'random string';
    ?>
</body>
</html>