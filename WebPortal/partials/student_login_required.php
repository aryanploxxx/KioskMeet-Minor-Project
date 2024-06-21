<?php

if(! ($_SESSION["auth_status"] == true && $_SESSION["level"] == "student"))
{
    set_message("please login to continue");
    header("location: /webportal/auth/loginStudent.php");
    die;
}
?>