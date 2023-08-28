<?php

// subjects/delete.php
require_once('../../../private/initialize.php');
$pageTitle = 'Delete Subject';
include_once(SHARED_PATH . '/staff-header.php');

if (!isset($_GET['id'])) {
    // redirect as this page has nothing to do without an ID being specified
    redirect(WWW_ROOT . '/staff/subjects/index.php');
}

$idFrom_Get = $_GET['id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    deleteSubjectById($idFrom_Get);
    redirect(WWW_ROOT . '/staff/subjects/index.php');
} else { // page is loading in response to a GET request
    $subject = selectSubjectById($idFrom_Get); // use to look up info for confirmation screen
}
?>

<div id="content">
    <a href="<?php echo WWW_ROOT . '/staff/subjects/index.php'; ?>" class="back-link">&laquo; Back to List</a>
    <div class="subject delete">
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete this subject?</p>
        <p class="item">Name:<?php echo ' ' . htmlspecialchars($subject['menu_name']); ?></p>
        <p class="item">ID:<?php echo ' ' . htmlspecialchars($idFrom_Get); ?></p>
    </div>
    <form action="<?php echo WWW_ROOT . '/staff/subjects/delete.php?id=' . $idFrom_Get; ?>" method="post">
        <input type="submit" value="Confirm"></input>
    </form>
</div>
<?php include_once(SHARED_PATH . '/staff-footer.php'); ?>
