<?php

// Allows for fixed URL paths that work when called from different locations in
// in the directory structure
function urlFor($scriptPath)
{
    // add the leading '/' if not present
    if($scriptPath[0] != '/') {
        $scriptPath = "/" . $scriptPath;
    }
    return WWW_ROOT . $scriptPath;
}

function error404()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    exit();
}

function error500()
{
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Error");
    exit();
}

function redirect($url)
{
    header('Location: ' . WWW_ROOT . $url); // implies 302 Found
    exit;
}
