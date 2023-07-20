<?php

require_once('../../../private/initialize.php');

switch($_SERVER['REQUEST_METHOD']) {
    case 'POST':
    // Handle form values POSTed by new.php
        $menuName   = $_POST['menuName']    ?? '';
        $position   = $_POST['position']    ?? '';
        $visible    = $_POST['visible']     ?? '';

        echo 'Form parameters<br>';
        echo 'Menu name: ' . $menuName . '<br>';
        echo 'Position: ' . $position . '<br>';
        echo 'Visible: ' . $visible . '<br>';
        break;
    case 'GET':
    // Redirect to the form that provides the expected POST data
        redirect('/staff/subjects/new.php');
        break;
}

