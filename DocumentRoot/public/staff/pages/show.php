<?php

// pages/show.php
require_once('../../../private/initialize.php');
$pageTitle = 'Show Page';
require_once(SHARED_PATH . '/staff-header.php');

if (!isset($_GET['id'])) {
    redirect(WWW_ROOT . '/staff/pages/index.php');
} else {
    $idFrom_Get = $_GET['id'];
}

$page = selectPageById($idFrom_Get);
$subject = selectSubjectById($page['subject_id']);
$subjectName = $subject['menu_name'];
?>

<div id="content">
    <a class="back-link" href="<?php echo urlFor('/staff/pages/index.php'); ?>">&laquo; Return</a><br>
    <div class="page show">
        <h1>Page: <?php echo htmlspecialchars($page['menu_name']); ?></h1>
    </div>
    <div class="attributes">
        <dl>
            <dt>Menu Name</dt>
            <dd><?php echo htmlspecialchars($page['menu_name']);?></dd>
        </dl>
        <dl>
            <dt>Subject</dt>
            <dd><?php echo htmlspecialchars($subjectName);?></dd>
        </dl>
        <dl>
            <dt>Position</dt>
            <dd><?php echo htmlspecialchars($page['position']);?></dd>
        </dl>
        <dl>
            <dt>Visible</dt>
            <dd><?php echo $page['visible'] == 1 ? 'Yes' : 'No';?></dd>
        </dl>
        <dl>
            <dt>Content</dt>
            <dd><?php echo htmlspecialchars($page['content'] ?? '');?></dd>
        </dl>
    </div>
</div>

<?php require_once(SHARED_PATH . '/staff-footer.php'); ?>
