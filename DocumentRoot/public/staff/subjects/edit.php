<?php

require_once('../../../private/initialize.php');

// edit.php

switch($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        // Handle form values POSTed by this page
        $menuName   = $_POST['menuName']    ?? '';
        $position   = $_POST['position']    ?? '';
        $visible    = $_POST['visible']     ?? '';

        echo 'Form parameters<br>';
        echo 'Menu name: '  . $menuName . '<br>';
        echo 'Position: '   . $position . '<br>';
        echo 'Visible: '    . $visible  . '<br>';
        break;
    case 'GET':
        if (!isset($_GET['id'])) {
        // Redirect to the form that provides the expected POST data
            redirect(WWW_ROOT . '/staff/subjects/index.php');
        } else {
            $idFromGET  = $_GET['id'];
            $menuName   = '';
            $position   = '';
            $visible    = '';
        }
        break;
}

$pageTitle = 'Edit Subject';
include_once(SHARED_PATH . '/staff-header.php');
?>
<div id="content">
    <a href="<?php echo WWW_ROOT . '/staff/subjects/index.php'; ?>" class="back-link">&laquo; Back to List</a>
    <div class="subject edit">
        <h1>Edit Subject</h1>
        <form action="<?php echo WWW_ROOT . '/staff/subjects/edit.php'; ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menuName" value="<?php echo $menuName; ?>"></dd>
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
                    <input type="checkbox" name="visible" value="1">
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Subject">
            </div>
        </form>
    </div>
</div>
<?php include_once(SHARED_PATH . '/staff-footer.php');
