<?php

// subjects/show.php
require_once('../../../private/initialize.php');
require_once(PRIVATE_PATH . '/db-queries.php');

$pageTitle ='Show Subject';

require_once(SHARED_PATH . '/staff-header.php');

$idFrom_Get = $_GET['id'] ?? '1';
$subject = select_subject_by_id($idFrom_Get);
?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Return</a><br>
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
