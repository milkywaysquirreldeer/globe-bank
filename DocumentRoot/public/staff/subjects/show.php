<?php

$idFrom_Get = urlencode($_GET['id']) ?? '1';

echo 'The id value from $_GET was ' . "$idFrom_Get.";
