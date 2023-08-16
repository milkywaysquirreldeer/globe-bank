<?php

//database.php - functions related to globe_bank db
require_once('db-credentials.php');

function db_connect()
{
    try {
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        return $connection;
    } catch(mysqli_sql_exception $e) {
        $msg = 'Database connection failed: ';
        exit($msg . $e->getMessage() . ' (' . $e->getCode(). ')');
    }
}

function db_disconnect($connection)
{
    if (isset($connection)) {
        mysqli_close($connection);
    }
}
