<?php
include "../partials/session.php";
include "../partials/messages.php";
include "../partials/sql_connect.php";
?>

<?php
$error;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST["user"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "select * from admin where id = '$userid' and password = '$password'");
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["auth_status"] = true;
        $_SESSION["id"] = $userid;
        $_SESSION["level"] = "admin";
        header("location: /webportal/admin/index.php");
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
    <title>Admin Login | KioskMeet</title>
    <link rel="shortcut icon" href="../KioskMeet_Favicon.png" type="image/x-icon">
</head>

<body style='background-image: url("../bg_gradient.jpg");background-size: 100%;overflow: hidden;'>
    <div id="container">
        <div id="form-wrapper">
            <!-- Temporarily change method to GET to avoid reload prompts in browser -->
            <!-- <form action="loginAdmin.php" method="POST">
                <input type="number" placeholder="Admin ID" name="user" id="user">
                <input type="password" placeholder="Password" name="password" id="pass">
                <div><input type="submit" value="Login" id="submit" onclick="checkBlankFields();"></div>
                <div id="credStat">
                    <?php
                    if (has_messages()) {
                        echo "<div id='errors'>";
                        show_messages();
                        delete_messages();
                        echo "</div>";
                    }
                    ?>
                </div>
            </form> -->



            <div class="form">
                <form action="loginAdmin.php" method="POST">
                    <div class="title">Admin Login</div>
                    <div class="input-container ic1">
                        <input type="text" class="input"  placeholder=" " name="user" id="admin">
                        <div class="cut"></div>
                        <label for="firstname" class="placeholder">Admin ID</label>
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
            </div>
        </div>
    </div>
    <script src="static/admin.js">
    </script>
</body>

</html>