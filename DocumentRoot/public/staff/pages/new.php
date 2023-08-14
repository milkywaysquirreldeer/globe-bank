<?php

require_once('../../../private/initialize.php');

// new.php - Staff form to create a new Page

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $menuName = '';
        $visible = 1;

        if (isset($_GET['id'])) {
            redirect(WWW_ROOT . '/staff/pages/index.php'); // This form is not meant to handle GET query strings
        } else {
            break; // continue to form display
        }

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

$pageTitle = 'Create Page';

include_once(SHARED_PATH . '/staff-header.php');
?>

<div id="content">

    <a href="<?php echo WWW_ROOT . '/staff/pages/index.php';?>" class="back-link">&laquo; Back to List</a>
    
    <div class="page new">
        <h1>Create Page</h1>

        <form action="<?php echo WWW_ROOT . '/staff/pages/new.php'; ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menuName" value="<?php echo htmlspecialchars($menuName); ?>"></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
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
                <input type="submit" value="Create Page">
            </div>
        </form>
    </div>
</div>

<?php include_once(SHARED_PATH . '/staff-footer.php'); ?>
