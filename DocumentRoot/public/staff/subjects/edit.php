<?php

require_once('../../../private/initialize.php');

// edit.php - Staff form to edit an existing Subject

switch ($_SERVER['REQUEST_METHOD']) {
    // Ensure that a subject ID has been supplied for editing
    case 'GET':
        if (!isset($_GET['id'])) {
            // Redirect to the form that provides the expected POST data
            redirect(WWW_ROOT . '/staff/subjects/index.php');
        } else {
            $id         = $_GET['id'];
            $menuName   = $_GET['menuName'] ?? '';
            $position   = $_GET['position'] ?? 1;
            $visible    = $_GET['visible']  ?? 0;
        }

        break; // continue to form display

    case 'POST':
        // Process the values POSTed by the user via the form on this page
        $menuName   = $_POST['menuName']    ?? '';
        $position   = $_POST['position']    ?? '';
        $visible    = $_POST['visible']     ?? '';

        echo 'Form parameters<br>';
        echo 'Menu name: '  . htmlspecialchars($menuName) . '<br>';
        echo 'Position: '   . htmlspecialchars($position) . '<br>';
        echo 'Visible: '    . htmlspecialchars($visible)  . '<br>';
        break;
}

$pageTitle = 'Edit Subject';

include_once(SHARED_PATH . '/staff-header.php');
?>

<div id="content">
    <a href="<?php echo WWW_ROOT . '/staff/subjects/index.php'; ?>" class="back-link">&laquo; Back to List</a>
    <div class="subject edit">
        <h1>Edit Subject</h1>
        <form action="<?php echo WWW_ROOT . '/staff/subjects/edit.php?id=' . $id; ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menuName" value="<?php echo htmlspecialchars($menuName); ?>"></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
                        <option value="<?php echo htmlspecialchars($position); ?>"><?php echo htmlspecialchars($position); ?></option>
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
                <input type="submit" value="Edit Subject">
            </div>
        </form>
    </div>
</div>

<?php include_once(SHARED_PATH . '/staff-footer.php');
