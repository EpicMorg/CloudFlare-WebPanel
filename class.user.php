<?php

class User
{
    private $name;
    private $api;
    private $email;


    public function show_info($param)
    {

        switch ($param) {

            case "NAME" :
                return $this->name;
                break;
            case "API" :
                return $this->api;
                break;
            case "EMAIL" :
                return $this->email;
                break;
            default :
                return '{"error" : "Incorrect constant"}';


        }


    }


    public function __construct($name, $api, $email)
    {
        $this->name = $name;
        $this->api = $api;
        $this->email = $email;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function set_api($api)
    {
        $this->api = $api;
    }

    public function add_record($name, $content, $ttl, $zone_id)
    {


        $connection = curl_init();

        curl_setopt($connection, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records");

        curl_setopt($connection, CURLOPT_POST, 1);
        $post = array("TYPE" => "TXT", "NAME" => $name, "content" => $content, "ttl" => $ttl);

        curl_setopt($connection, CURLOPT_POSTFIELDS, $post);

        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);


        $headers = [
            'X-Auth-Email: ' . $this->email,
            'X-Auth-Key: ' . $this->api
        ];

        curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($connection);

        curl_close($connection);

        $recive = json_decode($result);
        if ($recive["success"] == true) {

            return true;

        } else {
            return false;
        }

    }


    public function update_record($name, $content, $ttl, $zone_id, $record_id)
    {


        $connection = curl_init();

        curl_setopt($connection, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records/$record_id");

        curl_setopt($connection, CURLOPT_PUT, false);
        $post = array("TYPE" => "TXT", "NAME" => $name, "content" => $content, "ttl" => $ttl);

        curl_setopt($connection, CURLOPT_POSTFIELDS, $post);

        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);


        $headers = [
            'X-Auth-Email: ' . $this->email,
            'X-Auth-Key: ' . $this->api

        ];

        curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($connection);

        curl_close($connection);

        $recive = json_decode($result);
        if ($recive["success"] == true) {

            return true;

        } else {
            return false;
        }


    }

    public function delete_record($zone_id, $record_id)
    {


        $connection = curl_init();

        curl_setopt($connection, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records/$record_id");

        curl_setopt($connection, CURLOPT_CUSTOMREQUEST, "DELETE");

        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);


        $headers = [
            'X-Auth-Email: ' . $this->email,
            'X-Auth-Key: ' . $this->api,
            'Content-Type: application/json'

        ];

        curl_setopt($connection, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($connection);

        curl_close($connection);

        $recive = json_decode($result);
        if ($recive["success"] == true) {

            return true;

        } else {
            return false;
        }


    }

}