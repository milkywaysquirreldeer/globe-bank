<?php

// pages/delete.php - Staff Form for Deleting Pages
require_once('../../../private/initialize.php');
require_once(PRIVATE_PATH . '/db-queries.php');
$pageTitle = 'Delete Page';
include_once(SHARED_PATH . '/staff-header.php');

if (!isset($_GET['id'])) {
    //redirect as this page has nothing to do without an ID being specified
    redirect(WWW_ROOT . '/staff/pages/index.php');
}

$idFrom_Get = $_GET['id'];
$page = selectPageById($idFrom_Get);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo deletePageById($idFrom_Get);
    redirect(WWW_ROOT . '/staff/pages/index.php');
}
?>

<div id="content">
    <a href="<?php echo WWW_ROOT . '/staff/pages/index.php'; ?>" class="back-link">&laquo; Back to List</a>
    <div class="page delete">
        <h1>Delete Page</h1>
        <p>Are you sure you want to delete this page?</p>
        <p class="item">Name: <?php echo htmlspecialchars($page['menu_name']); ?></p>
        <p class="item">ID: <?php echo htmlspecialchars($idFrom_Get); ?></p>
    </div>
    <form action="/staff/pages/delete.php?id=<?php echo htmlspecialchars(urlencode($idFrom_Get)); ?>" method="post">
        <input type="submit" value="Confirm"></input>   
    </form>
</div>

<?php include_once(SHARED_PATH . '/staff-footer.php');
