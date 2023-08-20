<?php

// db-queries.php - Store commonly used queries

function select_all_subjects()
{
    global $db;
    $query  = 'SELECT * FROM subjects ';
    $query .= 'ORDER BY position ASC';

    try {
        $query_result = mysqli_query($db, $query);
        return $query_result; //returns a mysqli query result
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while retreiving list of Subjects');
    }
}

function select_subject_by_id($id)
{
    global $db;
    $query = 'SELECT * FROM subjects ';
    $query .= "WHERE id='" . $id . "'";

    try {
        $query_result = mysqli_query($db, $query);
        $subject = mysqli_fetch_assoc($query_result);

        mysqli_free_result($query_result);
        return $subject; // returns an assoc. array

    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while retreiving Subject #' . htmlspecialchars($id));
    }
}

function delete_subject_by_id($id)
{
    global $db;
    $query = 'DELETE FROM subjects ';
    $query .= "WHERE id='" . $id . "' ";
    $query .= 'LIMIT 1';

    try {
        $query_result = mysqli_query($db, $query);
        return $query_result;
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while deleting Subject #' . htmlspecialchars($id));
    }
}

function insert_subject($subjectArray)
{
    global $db;
    $query = 'INSERT INTO subjects ';
    $query .= '(menu_name, position, visible) ';
    $query .= 'VALUES (';
    $query .= "'" . $subjectArray['menu_name']  . "',";
    $query .= "'" . $subjectArray['position']   . "',";
    $query .= "'" . $subjectArray['visible']    . "'";
    $query .= ')';
    $query_result = mysqli_query($db, $query);

    return $query_result;
}

function update_subject($subjectArray)
{
    global $db;
    $query = 'UPDATE subjects ';
    $query .= 'SET menu_name = ' . "'" . $subjectArray['menu_name'] . "', ";
    $query .= 'position = ' . "'" . $subjectArray['position']   . "', ";
    $query .= 'visible = '  . "'" . $subjectArray['visible']    . "' ";
    $query .= 'WHERE id = ' . "'" . $subjectArray['id']         . "' ";
    $query .= 'LIMIT 1';
    $query_result = mysqli_query($db, $query);

    return $query_result;
}

function select_all_pages()
{
    global $db;
    $query  = 'SELECT * FROM pages ';
    $query .= 'ORDER BY subject_id ASC, position ASC';

    try {
        $query_result = mysqli_query($db, $query);
        return $query_result; // returns a mysqli query result
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while retreiving list of Pages');
    }
}
