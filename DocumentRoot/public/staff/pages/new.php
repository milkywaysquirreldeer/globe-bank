<?php

require_once('../../../private/initialize.php');
require_once(PRIVATE_PATH . '/db-queries.php');

// pages/new.php - Staff form to create a new Page

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $page = [];
        $page['subject_id'] = '';
        $page['menu_name'] = '';
        $page['position'] = '';
        $page['visible'] = 1;
        $page['content'] = 'your text here';

        if (isset($_GET['id'])) {
            redirect(WWW_ROOT . '/staff/pages/index.php'); // This form is not meant to handle GET query strings
        } else {
            $subjectSet = selectAllSubjects();
            $pageSet = selectAllPages();
            $newPageCount = mysqli_num_rows($pageSet) + 1;

            mysqli_free_result($pageSet);
            break; // continue to form display
        }

    case 'POST':
        // Process the values POSTed by the user via the form on this page
        $page = [];
        $page['subject_id'] = $_POST['subjectId'];
        $page['menu_name']  = $_POST['menuName']    ?? '';
        $page['position']   = $_POST['position']    ?? '';
        $page['visible']    = $_POST['visible']     ?? 1;
        $page['content']    = $_POST['content']     ?? '';
        $result = insertPage($page);

        switch ($result) {
            case 1:
                $newId = mysqli_insert_id($db);
                redirect(WWW_ROOT . '/staff/pages/show.php?id=' . $newId);
                break;
            case 0: // INSERT failed
                echo 'Error Creating record<br>';
                dbDisconnect($db);
                exit;
        }

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
                <dd><input type="text" name="menuName" value="<?php echo htmlspecialchars($page['menu_name']); ?>"></dd>
            </dl>
            <dl>
                <dt>Subject</dt>
                <dd>
                    <select name="subjectId">
<?php
while ($subject = mysqli_fetch_assoc($subjectSet)) {
    echo '<option value="' . htmlspecialchars($subject['id']) . '">' . htmlspecialchars($subject['menu_name']) . '</option>';
}

mysqli_free_result($subjectSet);
?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
<?php
for ($i = 1; $i <= $newPageCount; ++$i) {
    echo '<option value="' . htmlspecialchars($i) . '">' . htmlspecialchars($i) . '</option>';
}
?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd>
                    <input type="hidden" name="visible" value="0">
                    <input type="checkbox" name="visible" value="1"<?php echo ($page['visible'] == 1) ? ' checked="true"' : ''; ?>>
                </dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dd><input type="text" name="content" value="<?php echo htmlspecialchars($page['content']); ?>"></dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Create Page">
            </div>
        </form>
    </div>
</div>

<?php include_once(SHARED_PATH . '/staff-footer.php'); ?>
