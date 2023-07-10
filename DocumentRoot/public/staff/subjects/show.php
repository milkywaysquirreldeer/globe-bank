<?php

require_once('../../../private/initialize.php');
$pageTitle ='Show Subject';
require_once(SHARED_PATH . '/staff-header.php');

$idFrom_Get = $_GET['id'] ?? '1';
?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Return</a><br>
    <div class="page show">
        <?php echo 'The subject id value from $_GET was ' . htmlspecialchars($idFrom_Get) . '.'; ?>
    </div>
</div>

<?php require_once(SHARED_PATH . '/staff-footer.php'); ?>
