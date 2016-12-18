<?php
require("functions.php");

$users_array = unserialize(file_get_contents("users.data"));
if (!is_array($users_array)) {
    $users_array = array();
}
$users_array[] = new User(clear_post($_POST["name"]), clear_post($_POST["api"]));
file_put_contents("users.data", serialize($users_array));