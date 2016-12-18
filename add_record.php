<?php
require_once ("functions.php");
require_once ("sql.php");

$user_id = clear_data($_POST["user_id"]);
$zone_id= clear_data($_POST["zone_id"]);
$name = clear_data($_POST["name"]);
$content = clear_data($_POST["content"]);
$ttl = clear_data($_POST["ttl"]);


$data = $mysqli->query("SELECT * FROM users WHERE id = $user_id");


if($data->num_rows) {

    $row = $data->fetch_array();


    $connection = curl_init();

    curl_setopt($connection, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records");

    $post = array("type" => "TXT", "name" => $name, "content" => $content, "ttl" => $ttl);

    $headers = [
        'X-Auth-Email: ' . $row["email"],
        'X-Auth-Key: ' . $row["api"],
        'Content-Type: application/json'
    ];

    curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($connection,CURLOPT_POST, 1);
    curl_setopt($connection, CURLOPT_POSTFIELDS, json_encode($post));
    curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);



    $result = curl_exec($connection);

    echo $result;

    curl_close($connection);
    $mysqli->close();


}
else
{
    $mysqli->close();
    exit("Access Denied!");
}