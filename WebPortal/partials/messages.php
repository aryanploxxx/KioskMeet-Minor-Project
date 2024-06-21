<?php
function show_messages()
{
    if (isset ($_SESSION["messages"])) {
        foreach ($_SESSION["messages"] as $message) {
            echo $message;
        }
    }
}
function get_messages()
{
    $arr = [];
    if (isset ($_SESSION["messages"])) {
        foreach ($_SESSION["messages"] as $message) {
            array_push($arr,$message);
        }
    }
    return $arr;
}
function delete_messages(){
    $_SESSION["messages"] = array();
}
function has_messages(){
    return isset($_SESSION["messages"]) and count($_SESSION["messages"])>0;
}
function set_message($message)
{
    if(isset($_SESSION["messages"]))
    {
        array_push($_SESSION["messages"],$message);
    }
    else{
        $_SESSION["messages"] = array();
        array_push($_SESSION["messages"],$message);
    }
}
