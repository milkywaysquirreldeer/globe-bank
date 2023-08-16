<?php

// subjects/index.php
require_once('../../../private/initialize.php');
require_once(PRIVATE_PATH . '/db-queries.php');

$subject_set = select_all_subjects();
$pageTitle = 'Subjects Menu';

require_once(SHARED_PATH . '/staff-header.php');
?>

<div id="content">
    <div class="subjects listing">
        <h1>Subjects</h1>

        <div class="actions">
            <a href="<?php echo WWW_ROOT . '/staff/subjects/new.php'; ?>" class="action">Create New Subject</a>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

        <?php while ($subject = mysqli_fetch_assoc($subject_set)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($subject['id']); ?></td>
                <td><?php echo htmlspecialchars($subject['position']); ?></td>
                <td><?php echo $subject['visible'] == '1' ? 'Y' : 'N'; ?></td>
                <td><?php echo htmlspecialchars($subject['menu_name']); ?></td>
                <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . htmlspecialchars(urlencode($subject['id']))); ?>">View</a></td>
                <!-- <td><a class="action" href="<?php echo url_for('/staff/subjects/edit.php?id=' . htmlspecialchars(urlencode($subject['id']))); ?>">Edit</a></td> -->
                <td><a class="action" href="<?php echo url_for('/staff/subjects/edit.php?id=' . htmlspecialchars(urlencode($subject['id'])) .
                                    '&menuName='    . htmlspecialchars(urlencode($subject['menu_name'])) .
                                    '&position='    . htmlspecialchars(urlencode($subject['position']))) .
                                    '&visible='     . htmlspecialchars(urlencode($subject['visible'])); ?>">Edit</a>
                </td>
                <td><a class="action" href="<?php echo url_for('/staff/subjects/index.php'); ?>">Delete</a></td>
            </tr>
        <?php } ?>

        </table>
    </div>
</div>

<?php
mysqli_free_result($subject_set);
require_once(SHARED_PATH . '/staff-footer.php');
?>
