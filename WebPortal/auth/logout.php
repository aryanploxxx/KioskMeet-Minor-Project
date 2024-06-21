<?php
include "../partials/session.php";
include "../partials/messages.php";
$level = $_SESSION["level"];
$_SESSION["auth_status"] = false;
$_SESSION["level"] = NULL;
$_SESSION["enroll"] = false;
if(isset($_SESSION["batch"]))
{
    unset($_SESSION["batch"]);
}
set_message("Session: You have logged out.");
header("location: ../index.html");
?>
