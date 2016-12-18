<?php
require("functions.php");

$users_array = unserialize(file_get_contents("users.data"));
$id = (int)clear_post($_POST["id"]);
if(isset($users_array[$id])) {
    unset($users_array[$id]);
    file_put_contents("users.data", serialize($users_array));

}
else {
    exit('{"error" : "Incorrect POST"}');
}