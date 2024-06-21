<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/sql_connect.php";
include "../partials/admin_login_required.php";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: index.php");
        die;
    } else {
        $id = $_GET["id"];
        $res = mysqli_query($conn,"
            select name,dob,semester,batch,course from student where id = '$id'
        ");
        $student = mysqli_fetch_assoc($res);
    }
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $semester = $_POST["semester"];
    $batch = $_POST["batch"];
    $course = $_POST["course"];
    $sql = "
    update student 
    set name = '$name', dob = '$dob', semester = $semester, batch = '$batch', course = '$course'
    where id = $id
    ";
    $res = mysqli_query($conn,$sql);
    if($res)
    {
        set_message("student data updated successfully");
    }
    else
    {
        set_message("error encountered while updating");
    }
    header("location: list_students.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Edit Student | KioskMeet</title>
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
<div id="table2-wrapper">
    <form action="update_student.php" method="POST">
        <input type="number" name="id" id="" value="<?php echo $id ?>" hidden>
        Name <br> <input type="text" name="name" id="name" value="<?php echo $student['name']?>">
        <br>
        Date of Birth <br> <input type="date" name="dob" id="" value="<?php echo $student['dob']?>">
        <br>
        Semester <br> <input type="number" name="semester" id="" value="<?php echo $student['semester']?>">
        <br>
        Batch <br> <input type="text" name="batch" id="" value="<?php echo $student['batch']?>">
        <br>
        Course <br> <input type="text" name="course" id="" value="<?php echo $student['course']?>">
        <br>
        <input type="submit" value="save">
    </form>
</div>
</body>

</html>