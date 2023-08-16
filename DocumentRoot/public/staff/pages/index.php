<?php

// pages/index.php
require_once('../../../private/initialize.php');
require_once(PRIVATE_PATH . '/db-queries.php');

$page_set = select_all_pages();
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
                <th>Subject ID</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>

        <?php while ($page = mysqli_fetch_assoc($page_set)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($page['id']); ?></td>
                <td><?php echo htmlspecialchars($page['subject_id']); ?></td>
                <td><?php echo htmlspecialchars($page['position']); ?></td>
                <td><?php echo $page['visible'] == '1' ? 'Y' : 'N'; ?></td>
                <td><?php echo htmlspecialchars($page['menu_name']); ?></td>
                <td><a class="action" href="<?php echo url_for(
                    '/staff/pages/show.php?id=' . htmlspecialchars(urlencode($page['id']))
                ); ?>">View</a>
                </td>
                <td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . htmlspecialchars(urlencode($page['id'])) .
                                    '&menuName='    . htmlspecialchars(urlencode($page['menu_name'])) .
                                    '&position='    . htmlspecialchars(urlencode($page['position']))) .
                                    '&visible='     . htmlspecialchars(urlencode($page['visible'])); ?>">Edit</a>
                </td>
                <td><a class="action" href="<?php echo url_for('/staff/pages/index.php') ?>">Delete</a></td>
            </tr> 
        <?php } ?>

        </table>
    </div>
</div>

<?php
mysqli_free_result($page_set);
require_once(SHARED_PATH . '/staff-footer.php');
?>
