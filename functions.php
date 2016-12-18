<?php
require_once("class.user.php");
function clear_data($param)
{

    $param = trim($param);
    if (isset($param) && (strlen($param) > 0)) {

        return strip_tags(htmlspecialchars($param));

    } else {

        exit('{"error" : "Incorrect http method!"}');

    }

}


function print_user()
{
    static $i = -1;
    $i++;

    $users_array = unserialize(file_get_contents("../users.data"));

    if (!is_array($users_array)) {
        $users_array = array();
    }

    $c = count($users_array);
    if ($i < $c) {
        return $users_array[$i];
    } else {
        $i = -1;
        return false;
    }


}