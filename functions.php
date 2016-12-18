<?php
function clear_data($param)
{

    $param = trim($param);
    if (isset($param) && (strlen($param) > 0)) {

        return strip_tags(htmlspecialchars($param));

    } else {

        exit('{"error" : "Incorrect http method!"}');

    }

}

