<?php if (!isset($pageTitle)) {
    $pageTitle = 'Staff Area';
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo urlFor('stylesheets/staff.css'); ?>" >
    <title>GBI - <?php echo htmlspecialchars($pageTitle); ?></title>
</head>
<body>
    <header>
        <h1>GBI Staff Area</h1>
    </header>
    <navigation>
        <ul>
            <li><a href="<?php echo urlFor('/staff/index.php'); ?>">Menu</a></li>
        </ul>
    </navigation>
