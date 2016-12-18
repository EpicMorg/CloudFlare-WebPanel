<?php
require_once("functions.php");
$name = clear_data($_POST["name"]);
$email = clear_data($_POST["email"]);
$api = clear_data($_POST["api"]);
$id = clear_data($_POST["id"]);

require_once("sql.php");


$data = $mysqli->query("SELECT * FROM users WHERE id = '$id'");

if($data->num_rows) {


    $mysqli->query("UPDATE users SET name ='".$name."', email = '".$email."', api = '".$api."' WHERE id = '".$id."'");

    if($mysqli->affected_rows) {
        echo('{"success" : "1"}');
    }
    else
    {
        echo('{"success" : "0"}');
    }


}
else
{
    $mysqli->close();
    exit('{"success" : "0"}');

}
$mysqli->close();