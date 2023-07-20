<?php

// Handle form values POSTed by new.php

$menuName   = $_POST['menuName'] ?? '';
$position   = $_POST['position'] ?? '';
$visible    = $_POST['visible'] ?? '';

echo 'Form parameters<br>';
echo 'Menu name: ' . $menuName . '<br>';
echo 'Position: ' . $position . '<br>';
echo 'Visible: ' . $visible . '<br>';
