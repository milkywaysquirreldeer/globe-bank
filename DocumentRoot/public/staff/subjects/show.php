<?php

$idFrom_Get = urlencode($_GET['id']) ?? '1';

echo 'The id value from $_GET was ' . htmlspecialchars($idFrom_Get) . '.';
