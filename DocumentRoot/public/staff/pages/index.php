<?php

// pages/index.php
require_once('../../../private/initialize.php');
require_once(PRIVATE_PATH . '/db-queries.php');

$pageSet = selectAllPages();
$pageTitle = 'Pages Menu';

require_once(SHARED_PATH . '/staff-header.php');
?>

<div id="content">
    <div class="pages listing">
        <h1>Pages</h1>

        <div class="actions">
            <a href="<?php echo WWW_ROOT . '/staff/pages/new.php';?>" class="action">Create New Page</a>
        </div>

        <table class="list">
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

        <?php while ($page = mysqli_fetch_assoc($pageSet)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($page['id']); ?></td>
                <td><?php
                        $subject = selectSubjectById($page['subject_id']);
                        echo htmlspecialchars($subject['menu_name']);
                    ?></td>
                <td><?php echo htmlspecialchars($page['position']); ?></td>
                <td><?php echo $page['visible'] == '1' ? 'Y' : 'N'; ?></td>
                <td><?php echo htmlspecialchars($page['menu_name']); ?></td>
                <td><a class="action" href="<?php echo urlFor(
                    '/staff/pages/show.php?id=' . htmlspecialchars(urlencode($page['id']))
                ); ?>">View</a>
                </td>
                <td><a class="action" href="<?php echo urlFor('/staff/pages/edit.php?id=' . htmlspecialchars(urlencode($page['id']))); ?>">Edit</a></td>
                <td><a class="action" href="<?php echo urlFor('/staff/pages/index.php') ?>">Delete</a></td>
            </tr> 
        <?php } ?>

        </table>
    </div>
</div>

<?php
mysqli_free_result($pageSet);
require_once(SHARED_PATH . '/staff-footer.php');
?>
