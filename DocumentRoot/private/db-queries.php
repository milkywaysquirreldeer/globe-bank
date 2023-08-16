<?php

// db-queries.php - Store commonly used queries

function select_all_subjects()
{
    global $db;
    $query  = 'SELECT * FROM subjects ';
    $query .= 'ORDER BY position ASC';

    try {
        $query_result = mysqli_query($db, $query);
        return $query_result;
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while retreiving list of Subjects');
    }
}

function select_all_pages()
{
    global $db;
    $query  = 'SELECT * FROM pages ';
    $query .= 'ORDER BY subject_id ASC, position ASC';

    try {
        $query_result = mysqli_query($db, $query);
        return $query_result;
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while retreiving list of Pages');
    }
}
