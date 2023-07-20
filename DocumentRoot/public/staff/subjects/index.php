<?php   require_once('../../../private/initialize.php'); 
        $subjects = [
            ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
            ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
            ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
            ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
        ];
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

        <?php foreach($subjects as $subject) { ?>
            <tr>
                <td><?php echo htmlspecialchars($subject['id']); ?></td>
                <td><?php echo htmlspecialchars($subject['position']); ?></td>
                <td><?php echo $subject['visible'] == '1' ? 'Y' : 'N'; ?></td>
                <td><?php echo htmlspecialchars($subject['menu_name']); ?></td>
                <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . htmlspecialchars(urlencode($subject['id']))); ?>">View</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/subjects/edit.php?id=' . htmlspecialchars(urlencode($subject['id']))); ?>">Edit</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/subjects/index.php'); ?>">Delete</a></td>
            </tr>
        <?php } ?>

        </table>
    </div>
</div>

<?php require_once(SHARED_PATH . '/staff-footer.php'); ?>
