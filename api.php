<?php 

$request = $_SERVER['REQUEST_URI'];  //this would be /users/show/abc.json

$request_parts = explode('/', $_GET['url']); // array('users', 'show', 'abc')
$file_type     = $_GET['type'];

$output = get_data_from_db(); //Do your processing here
                              //You can outsource to other files via an include/require

//Output based on request
switch($file_type) {
    case 'json':
        echo json_encode($output);
        break;
    default:
        echo $output;
}


 ?>