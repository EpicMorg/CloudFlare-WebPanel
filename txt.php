<?php
$connection = curl_init();

curl_setopt($connection, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/31aeaca4dd4ccd91ab7f07928bcc84cb/dns_records/1d8842723231098905ea280adf5d22f1");

$post = array("type" => "TXT", "name" => 'examplde.com', "content" => '127.0.0.1', "ttl" => '120');

$headers = [
    'X-Auth-Email: admin@epicm.org',
    'X-Auth-Key: 750249c5ced892ab9694a1f4eea51d2a8284d',
    'Content-Type: application/json'
];

curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

curl_setopt($connection,CURLOPT_CUSTOMREQUEST, "DELETE");


$result = curl_exec($connection);

echo $result;

curl_close($connection);
