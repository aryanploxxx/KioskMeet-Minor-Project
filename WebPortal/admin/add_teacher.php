<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/sql_connect.php";
include "../partials/admin_login_required.php";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $phno = $_POST["phno"];
    $password = $_POST["password"];
    $dept = $_POST["dept"];
    $sql = "
        select * from faculty where id = $id; 
    ";
    if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
        set_message("Teacher already exists");
    } else {
        $sql = "
            insert into faculty values($id,'$name',$phno,'$password','$dept')
        ";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            set_message("Teacher has been added");
        } else {
            set_message("Error in adding new teacher");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher | KioskMeet</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
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
    <div id="form-wrapper"> <h3>ADD TEACHER</h3> <br> <br>
    <form action="add_teacher.php" method="POST">
        ID: <input type="number" name="id" id="id">
        <br>
        Name: <input type="text" name="name" id="name">
        <br>
        Phone No.: <input type="number" name="phno" id="phno">
        <br>
        Set Password: <input type="text" name="password" id="password">
        <br>
        Department: <input type="text" name="dept" id="dept">
        <br>
        <input type="submit" value="Save" onclick="checkBlankFields2();">
    </form>
    <div id="credStat" style="color: red;"><?php
                        if (has_messages()) {
                            echo "<div id='errors'>";
                            show_messages();
                            delete_messages();
                            echo "</div>";
                        }
                        ?></div> </div>
    <script src="admin.js"></script>
</body>

</html>