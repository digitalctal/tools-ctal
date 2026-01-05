<?php

require_once __DIR__ . '/../app/tool-helper.php';

$tools = getAllEnabledTools();

// Group tools by category
$groupedTools = [];

foreach ($tools as $tool) {
    $groupedTools[$tool['category']][] = $tool;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tools Directory</title>
</head>
<body>

<h1>Available Tools</h1>

<?php foreach ($groupedTools as $category => $toolsInCategory): ?>

    <h2><?php echo htmlspecialchars(ucfirst($category)); ?></h2>

    <ul>
        <?php foreach ($toolsInCategory as $tool): ?>
            <li>
                <strong><?php echo htmlspecialchars($tool['name']); ?></strong><br>
                <small><?php echo htmlspecialchars($tool['description']); ?></small><br>
                <a href="/?tool=<?php echo urlencode($tool['slug']); ?>">
                    Open Tool
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endforeach; ?>

</body>
</html>
