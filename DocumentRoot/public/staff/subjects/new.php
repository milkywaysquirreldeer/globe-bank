<?php

require_once('../../../private/initialize.php');

// new.php
$testFromGet = $_GET['test'] ?? '';

switch($testFromGet) {
    case '404':
        error404();
        break;
    case '500':
        error500();
        break;
    default:
        echo 'No error';
        break;
}
