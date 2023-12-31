<?php

// db-queries.php - Store commonly used queries

function selectAllSubjects()
{
    global $db;

    $query  = 'SELECT * FROM subjects ';
    $query .= 'ORDER BY position ASC';

    try {
        $queryResult = mysqli_query($db, $query);
        return $queryResult; // returns a mysqli query result
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while retreiving list of Subjects');
    }
}

function selectSubjectById($id)
{
    global $db;

    $query = 'SELECT * FROM subjects ';
    $query .= "WHERE id='" . $id . "'";

    try {
        $queryResult = mysqli_query($db, $query);
        $subject = mysqli_fetch_assoc($queryResult);

        mysqli_free_result($queryResult);
        return $subject; // returns an assoc. array
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while retreiving Subject #' . htmlspecialchars($id));
    }
}

function deleteSubjectById($id)
{
    global $db;

    $query  = 'DELETE FROM subjects ';
    $query .= "WHERE id='" . $id . "' ";
    $query .= 'LIMIT 1';

    try {
        $status = mysqli_query($db, $query);
        return $status;
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while deleting Subject #' . htmlspecialchars($id));
    }
}

function insertSubject($subjectArray)
{
    global $db;

    $query  = 'INSERT INTO subjects ';
    $query .= '(menu_name, position, visible) ';
    $query .= 'VALUES (';
    $query .= "'" . $subjectArray['menu_name']  . "',";
    $query .= "'" . $subjectArray['position']   . "',";
    $query .= "'" . $subjectArray['visible']    . "'";
    $query .= ')';

    try {
        $status = mysqli_query($db, $query);
        return $status;
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while inserting new subject');
    }
}

function updateSubject($subjectArray)
{
    global $db;

    $query  = 'UPDATE subjects ';
    $query .= "SET menu_name ='"    . $subjectArray['menu_name']    . "', ";
    $query .= "position ='"         . $subjectArray['position']     . "', ";
    $query .= "visible = '"         . $subjectArray['visible']      . "' ";
    $query .= "WHERE id = '"        . $subjectArray['id']           . "' ";
    $query .= 'LIMIT 1';

    try {
        $status = mysqli_query($db, $query);
        return $status;
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while updating Subject #' . $subjectArray['id']);
    }
}

function selectAllPages()
{
    global $db;

    $query  = 'SELECT * FROM pages ';
    $query .= 'ORDER BY subject_id ASC, position ASC';

    try {
        $queryResult = mysqli_query($db, $query);
        return $queryResult; // returns a mysqli query result
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while retreiving list of Pages');
    }
}

function selectPageById($id)
{
    global $db;

    $query = 'SELECT * FROM pages ';
    $query .= "WHERE id='" . $id . "'";

    try {
        $queryResult = mysqli_query($db, $query);
        $page = mysqli_fetch_assoc($queryResult);

        mysqli_free_result($queryResult);
        return $page;
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while retreiving Page #' . htmlspecialchars($id));
    }
}

function deletePageById($id)
{
    global $db;

    $query  = 'DELETE FROM pages ';
    $query .= "WHERE id='" . $id . "' ";
    $query .= 'LIMIT 1';

    try {
        $status = mysqli_query($db, $query);
        return $status;
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while deleting Page #' . htmlspecialchars($id));
    }
}

function insertPage($pageArray)
{
    global $db;

    $query  = 'INSERT INTO pages ';
    $query .= '(subject_id, menu_name, position, visible, content) ';
    $query .= 'VALUES (';
    $query .= "'" . $pageArray['subject_id'] . "',";
    $query .= "'" . $pageArray['menu_name'] . "',";
    $query .= "'" . $pageArray['position'] . "',";
    $query .= "'" . $pageArray['visible'] . "',";
    $query .= "'" . $pageArray['content'] . "'";
    $query .= ')';

    try {
        $status = mysqli_query($db, $query);
        return $status;
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while inserting new page');
    }
}

function updatePage($pageArray)
{
    global $db;

    $query  = 'UPDATE pages ';
    $query .= "SET subject_id ='"   . $pageArray['subject_id']  . "',";
    $query .= "menu_name ='"        . $pageArray['menu_name']   . "',";
    $query .= "position ='"         . $pageArray['position']    . "',";
    $query .= "visible ='"          . $pageArray['visible']     . "',";
    $query .= "content ='"          . $pageArray['content']     . "' ";
    $query .= "WHERE id ='"         . $pageArray['id']          . "' ";
    $query .= 'LIMIT 1';

    try {
        $status = mysqli_query($db, $query);
        return $status;
    } catch(mysqli_sql_exception $e) {
        exit('SQL Error while updating Page #' . $pageArray['id']);
    }
}
