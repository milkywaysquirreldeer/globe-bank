<?php

// subjects/show.php
require_once('../../../private/initialize.php');
$pageTitle ='Show Subject';
require_once(SHARED_PATH . '/staff-header.php');

if (!isset($_GET['id'])) {
    redirect(WWW_ROOT . '/staff/subjects/index.php');
} else {
    $idFrom_Get = $_GET['id'];
}

$subject = selectSubjectById($idFrom_Get);
?>

<div id="content">
    <a class="back-link" href="<?php echo urlFor('/staff/subjects/index.php'); ?>">&laquo; Return</a><br>
    <div class="subject show">
        <h1>Subject: <?php echo htmlspecialchars($subject['menu_name']); ?></h1>
    </div>
    <div class="attributes">
        <dl>
            <dt>Menu Name</dt>
            <dd><?php echo htmlspecialchars($subject['menu_name']); ?></dd>
        </dl>
        <dl>
            <dt>Position</dt>
            <dd><?php echo htmlspecialchars($subject['position']); ?></dd>
        </dl>
        <dl>
            <dt>Visible</dt>
            <dd><?php echo $subject['visible'] == 1 ? 'Yes' : 'No'; ?></dd>
        </dl>
    </div>
</div>

<?php require_once(SHARED_PATH . '/staff-footer.php'); ?>
