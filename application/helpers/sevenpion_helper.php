<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function resp($status = true, $message = null, $data = [])
{
    $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

    //add the header here
    header('Content-Type: application/json');
    echo json_encode(
        [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]
    );
}
