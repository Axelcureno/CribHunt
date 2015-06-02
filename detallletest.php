<?php 


$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

    // Split the URL into its constituent parts.
    $parse = parse_url($url);

    // Remove the leading forward slash, if there is one.
    $path = ltrim($parse['path'], '/');

    // Put each element into an array.
    $elements = explode('/', $path);

    // Create a new empty array.
    $args = array();

    // Loop through each pair of elements.
    for( $i = 0; $i < count($elements); $i = $i + 2) {
        $args[$elements[$i]] = $elements[$i + 1];
    }

 ?>