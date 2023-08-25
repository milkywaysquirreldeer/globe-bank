<?php

require_once('../../../private/initialize.php');
require_once(PRIVATE_PATH . '/db-queries.php');

// pages/edit.php - Staff form to edit an existing Page
$idFrom_Get = $_GET['id'];
$subjectSet = selectAllSubjects();
$pageSet = selectAllPages();
$pageCount = mysqli_num_rows($pageSet);

mysqli_free_result($pageSet);

switch ($_SERVER['REQUEST_METHOD']) {
    // Ensure that a page ID has been supplied for editing
    case 'GET':
        if (!isset($_GET['id'])) {
            // Redirect to the form that provides the expected POST data
            redirect(WWW_ROOT . '/staff/pages/index.php');
        } else {
            // Retreive the page referenced by $_GET['id'] and display its values on form
            $page = selectPageById($idFrom_Get);
        }

        break; // continue to form display

    case 'POST':
        // Process the values POSTed by the user via the form on this page
        $page = [];
        $page['id'] = $idFrom_Get;
        $page['menu_name']  = $_POST['menuName']    ?? '';
        $page['subject_id'] = $_POST['subjectId'];
        $page['position']   = $_POST['position'];
        $page['visible']    = $_POST['visible']     ?? 1;
        $page['content']    = $_POST['content']     ?? '';
        $result = updatePage($page);
        dbDisconnect($db);

        switch ($result) {
            case 1:
                redirect(WWW_ROOT . '/staff/pages/show.php?id=' . urlencode($page['id']));
                break;
            case 0: // INSERT failed
                echo 'Error Updating record<br>';
                exit;
        }

        break;
}

$pageTitle = 'Edit Page';

include_once(SHARED_PATH . '/staff-header.php');
?>

<div id="content">
    <a href="<?php echo WWW_ROOT . '/staff/pages/index.php'; ?>" class="back-link">&laquo; Back to List</a>
    <div class="page edit">
        <h1>Edit Page: <?php echo $page['menu_name']; ?></h1>
        <form action="<?php echo WWW_ROOT . '/staff/pages/edit.php?id=' . urlencode($idFrom_Get); ?>" method="post">
            <dl>
                <dt>Menu Name</dt>
                <dd><input type="text" name="menuName" value="<?php echo htmlspecialchars($page['menu_name']); ?>"></dd>
            </dl>
            <dl>
                <dt>Subject</dt>
                <dd>
                    <select name="subjectId">
<?php
while ($row = mysqli_fetch_assoc($subjectSet)) {
    echo '<option value="' . htmlspecialchars($row['id']) . '"';

    if ($row['id'] == $page['subject_id']) {
        echo ' selected';
    }

    echo '>' . htmlspecialchars($row['menu_name']) . '</option>';
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
for ($i = 1; $i <= $pageCount; ++$i) {
echo '<option value="' . $i . '"';

if ($i == $page['position']) {
    echo ' selected';
}

echo '>' . $i . '</option>';
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
                <dd><input type="text" name="content" value="<?php echo htmlspecialchars($page['content'] ?? ''); ?>"></dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Page">
            </div>
        </form>
    </div>
</div>

<?php include_once(SHARED_PATH . '/staff-footer.php');
?>
