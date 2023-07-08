<?php   require_once('../../../private/initialize.php'); 
        $subjects = [
            ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
            ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
            ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
            ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
        ];
        $pageTitle = 'Staff Menu';
        require_once(SHARED_PATH . '/staff-header.php');
?>

<div id="content">
    <div class="subjects listing">
        <h1>Subjects</h1>
    </div>

    <div class="actions">
        <a href="" class="action">Create New Subject</a>
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
            <td><?php echo $subject['id']; ?></td>
            <td><?php echo $subject['position']; ?></td>
            <td><?php echo $subject['visible']; ?></td>
            <td><?php echo $subject['menu_name']; ?></td>
            <td><a href="<?php echo url_for('/staff/subjects/show.php?id=' . $subject['id']); ?>" class="action">View</a></td>
            <td><a href="<?php echo url_for('/staff/subjects/index.php'); ?>" class="action">Edit</a></td>
            <td><a href="<?php echo url_for('/staff/subjects/index.php'); ?>" class="action">Delete</a></td>
        </tr>
<?php } ?>
    </table>
</div>

<?php   require_once(SHARED_PATH . '/staff-footer.php'); ?>
