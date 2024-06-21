<?php
session_start();
if(!isset($_SESSION["id"]))
{
    $_SESSION["id"] = false;
}
if(!isset($_SESSION["level"]))
{
    $_SESSION["level"] = false;
}
if(!isset($_SESSION["auth_status"]))
{
    $_SESSION["auth_status"] = false;
}
?>