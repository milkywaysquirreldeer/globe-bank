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
    case 'redirect':
      // header('Location: ' . WWW_ROOT . '/staff/subjects/index.php'); // implies "302 Found"
      redirect('/staff/subjects/index.php');
    default:
        echo 'No error';
        break;
}
