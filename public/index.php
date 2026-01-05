<?php

$tool = $_GET['tool'] ?? null;

if ($tool === 'hello') {
    require __DIR__ . '/../modules/hello-tool/public/index.php';
    exit;
}

echo 'Tools CTAL – Base setup working';
