<?php

require_once('../../../private/initialize.php');
require_once(PRIVATE_PATH . '/db-queries.php');

// edit.php - Staff form to edit an existing Subject
$id         = $_GET['id'];

switch ($_SERVER['REQUEST_METHOD']) {
    // Ensure that a subject ID has been supplied for editing
    case 'GET':
        if (!isset($_GET['id'])) {
            // Redirect to the form that provides the expected POST data
            redirect(WWW_ROOT . '/staff/subjects/index.php');
        } else {
            // Retreive the subject referenced by $_GET['id'] and display its values on form
            $subject = selectSubjectById($id);
            $subjectSet = selectAllSubjects();
            $subjectCount = mysqli_num_rows($subjectSet);

            mysqli_free_result($subjectSet);
        }

        break; // continue to form display

    case 'POST':
        // Process the values POSTed by the user via the form on this page
        $subject = [];
        $subject['id']          = $id;
        $subject['menu_name']   = $_POST['menuName']    ?? '';
        $subject['position']    = $_POST['position']    ?? '';
        $subject['visible']     = $_POST['visible']     ?? '';
        $result = updateSubject($subject);
        dbDisconnect($db);

        switch ($result) {
            case 1:
                redirect(WWW_ROOT . '/staff/subjects/show.php?id=' . $subject['id']);
                break;
            case 0: // INSERT failed
                echo 'Error Updating record<br>';
                exit;
        }

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
                <dd><input type="text" name="menuName" value="<?php echo htmlspecialchars($subject['menu_name']); ?>"></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd>
                    <select name="position">
<?php

for ($i = 1; $i <= $subjectCount; ++$i) {
    echo '<option value="' . $i . '"';
    if ($subject['position'] == $i) {
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
                    <input type="checkbox" name="visible" value="1"<?php echo ($subject['visible'] == 1) ? ' checked="true"' : ''; ?>>
                </dd>
            </dl>
            <div id="operations">
                <input type="submit" value="Edit Subject">
            </div>
        </form>
    </div>
</div>

<?php include_once(SHARED_PATH . '/staff-footer.php');
