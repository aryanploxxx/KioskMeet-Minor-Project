<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/sql_connect.php";
?>

<?php
$error;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enroll = $_POST["enroll"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "select * from faculty where id = '$enroll' and password = '$password'");
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["auth_status"] = true;
        $_SESSION["id"] = $enroll;
        $_SESSION["level"] = "faculty";
        header("location: /webportal/teacher/teacherProfile.php");
        die;
    } else {
        $error = "User credentials are incorrect.";
        set_message($error);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/index.css">
    <title>Login | KioskMeet</title>
    <link rel="shortcut icon" href="../KioskMeet_Favicon.png" type="image/x-icon">
</head>

<body>
<!-- <marquee behavior="" scrollamount=10 direction="right">
        <p style="color:white">Jaypee Institute of Information Technology, Noida-62</p>
    </marquee> -->
    <div id="container">
        <div id="form-wrapper">
            <!-- Temporarily change method to GET to avoid reload prompts in browser -->
            <!-- <form action="loginTeacher.php" method="POST">
                <input type="number" placeholder="Faculty ID" name="enroll" id="enrol">
                <input type="password" placeholder="Password" name="password" id="pass">
                <div><input type="submit" value="Login" onclick="checkBlankFields();"></div>
                <div id="credStat"><?php
                                    if (has_messages()) {
                                        echo "<div id='errors'>";
                                        show_messages();
                                        delete_messages();
                                        echo "</div>";
                                    }
                                    ?></div>
            </form>
            <div id="loginElsewhere">
                or <a href="loginStudent.php">click here</a> to go to the student login page
            </div> -->

            <div class="form">                       
                <form action="loginTeacher.php" method="POST">
                        <div class="title">Faculty Login</div>
                        <div class="input-container ic1">
                            <input type="text" class="input"  placeholder=" " name="enroll" id="fac_id">
                            <div class="cut"></div>
                            <label for="fac_id" class="placeholder">Faculty ID</label>
                        </div>
                        <div class="input-container ic2">
                            <input type="password" class="input" placeholder=" " name="password" id="pass">
                            <div class="cut"></div>
                            <label for="pass" class="placeholder">Password</label>
                        </div>
                        <!-- <button type="text" class="submit">Login</button> -->
                        <div><input type="submit" value="Login" id="submit" class="submit" onclick="checkBlankFields();"></div>
                        <div id="credStat"><?php
                                        if (has_messages()) {
                                            echo "<div id='errors'>";
                                            show_messages();
                                            delete_messages();
                                            echo "</div>";
                                        }
                                        ?></div>
                </form>
                
                <style>
                    a:visited {
                        color: #dc2f55;
                    }
                </style>

                <div id="loginElsewhere">
                or <a href="loginStudent.php" style="text-decoration: none;">click here</a> to go to the Student Login Page
                </div>                        
            </div>


        </div>
    </div>
    <script src="static/teacher.js"></script>
</body>

</html>