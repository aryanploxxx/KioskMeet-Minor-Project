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
    $result = mysqli_query($conn, "select * from student where id = '$enroll' and password = '$password'");
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["auth_status"] = true;
        $_SESSION["id"] = $enroll;
        $_SESSION["level"] = "student";
        header("location: /webportal/student/studentProfile.php");
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
            <!-- <form action="loginStudent.php" method="POST">
                <input type="number" placeholder="Enrolment Number" name="enroll" id="enrol">
                <input type="password" placeholder="Password" name="password" id="pass">
                <div><input type="submit" value="Login" id="submit" onclick="checkBlankFields();"></div>
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
                or <a href="loginTeacher.php">click here</a> to go to the faculty login page
            </div> -->


            <div class="form">
                <form action="loginStudent.php" method="POST">
                    <div class="title">Student Login</div>
                    <div class="input-container ic1">
                        <input type="text" class="input"  placeholder=" " name="enroll" id="enrol">
                        <div class="cut"></div>
                        <label for="firstname" class="placeholder">Enrollment</label>
                    </div>
                    <div class="input-container ic2">
                        <input type="password" class="input" placeholder=" " name="password" id="pass">
                        <div class="cut"></div>
                        <label for="lastname" class="placeholder">Password</label>
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
                or <a href="loginTeacher.php" style="text-decoration: none;">Click Here</a> to go to the Faculty Login Page
                </div>


            </div>


        </div>
    </div>

    <!-- Checks if fields are blank or not -->
    <script src="static/student.js">
    </script>
</body>

</html>