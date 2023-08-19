<?php

require_once('../../../private/initialize.php');
require_once(PRIVATE_PATH . '/db-queries.php');

// new.php - Staff form to create a new Subject

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $menuName = '';
        $visible = 1;

        if (isset($_GET['id'])) {
            redirect(WWW_ROOT . '/staff/subjects/index.php'); // This form is not meant to handle GET query strings
        } else {
            $subject_set = select_all_subjects();
            $subject_count = mysqli_num_rows($subject_set) + 1; // since this record will add one to total

            mysqli_free_result($subject_set);

            break; // continue to form display
        }

    case 'POST':
        // Process the values POSTed by the user via the form on this page
        $subject = [];
        $subject['menu_name']   = $_POST['menuName']    ?? '';
        $subject['position']    = $_POST['position']    ?? '';
        $subject['visible']     = $_POST['visible']     ?? '';
        $result = insert_subject($subject);
        switch ($result) {
            case 1:
                echo $result . '<br>';
                $new_id = mysqli_insert_id($db);
                redirect(WWW_ROOT . '/staff/subjects/show.php?id=' . $new_id);
                break;
            case 0: // INSERT failed
                echo $result . '<br>';
                echo 'Error Creating record<br>';
                db_disconnect($db);
                exit;
        }

        break;
}

$pageTitle = 'Create Subject';

include_once(SHARED_PATH . '/staff-header.php');
?>

<div id="content">

    <a href="<?php echo WWW_ROOT . '/staff/subjects/index.php'; ?>" class="back-link">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Create Subject</h1>

        <form action="<?php echo WWW_ROOT . '/staff/subjects/new.php'; ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menuName" value="<?php echo htmlspecialchars($menuName); ?>"></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
<?php

for ($i = 1; $i <= $subject_count; ++$i) {
    echo '<option value="' . $i . '"';
    if ($i == $subject_count) {
        echo ' selected';
    }
    echo '>' . $i . '</option>';
}
?>
                        <option value="1">1</option>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0">
                    <input type="checkbox" name="visible" value="1"<?php echo ($visible == 1) ? ' checked="true"' : ''; ?>>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Subject">
            </div>
        </form>
    </div>
</div>

<?php include_once(SHARED_PATH . '/staff-footer.php'); ?>
