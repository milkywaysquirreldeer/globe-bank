<?php

// subjects/index.php
require_once('../../../private/initialize.php');

$subjectSet = selectAllSubjects();
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

        <?php while ($subject = mysqli_fetch_assoc($subjectSet)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($subject['id']); ?></td>
                <td><?php echo htmlspecialchars($subject['position']); ?></td>
                <td><?php echo $subject['visible'] == '1' ? 'Y' : 'N'; ?></td>
                <td><?php echo htmlspecialchars($subject['menu_name']); ?></td>
                <td><a class="action" href="<?php echo urlFor('/staff/subjects/show.php?id=' . htmlspecialchars(urlencode($subject['id']))); ?>">View</a></td>
                <!-- <td><a class="action" href="<?php echo urlFor('/staff/subjects/edit.php?id=' . htmlspecialchars(urlencode($subject['id']))); ?>">Edit</a></td> -->
                <td><a class="action" href="<?php echo urlFor('/staff/subjects/edit.php?id=' . htmlspecialchars(urlencode($subject['id']))); ?>">Edit</a>
                </td>
                <td><a class="action" href="<?php echo urlFor('/staff/subjects/delete.php?id=' . htmlspecialchars(urlencode($subject['id']))); ?>">Delete</a></td>
            </tr>
        <?php } ?>

        </table>
    </div>
</div>

<?php
mysqli_free_result($subjectSet);
require_once(SHARED_PATH . '/staff-footer.php');
?>
