<?php
require_once("functions.php");
$name = clear_data($_POST["name"]);
$email = clear_data($_POST["email"]);
$api = clear_data($_POST["api"]);

require_once("sql.php");


$data = $mysqli->query("SELECT * FROM users WHERE name = '$name'");

if($data->num_rows) {
    $mysqli->close();
exit('{"success" : "false"}');
}
else
{

    $mysqli->query("INSERT INTO users (name, email, api) VALUES ('".$name."', '".$email."', '".$api."')");
    if($mysqli->insert_id) {
        echo('{"success" : "true", "id" : "'.$mysqli->insert_id.'"}');
    }
    else
    {
        echo('{"success" : "false"}');
    }


}
$mysqli->close();