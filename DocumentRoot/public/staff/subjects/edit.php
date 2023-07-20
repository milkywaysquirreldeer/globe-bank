<?php

require_once('../../../private/initialize.php');

// edit.php
$testFromGet = $_GET['test'] ?? '';

switch($testFromGet) {
    case '404':
        error404();
        break;
    case '500':
        error500();
        break;
    case 'redirect':
      redirect('/staff/subjects/index.php');
    default:
        break;
}

$pageTitle = 'Edit Subject';
include_once(SHARED_PATH . '/staff-header.php');
?>
<div id="content">
    <a href="<?php echo WWW_ROOT . '/staff/subjects/index.php'; ?>" class="back-link">&laquo; Back to List</a>
    <div class="subject edit">
        <h1>Edit Subject</h1>
        <form action="" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menu_name" value=""></dd>
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
