<?php
if(! ($_SESSION["auth_status"] == true && $_SESSION["level"] = "admin"))
{
    set_message("Please login to continue");
    header("location: /webportal/auth/loginAdmin.php");
    die;
}
?>