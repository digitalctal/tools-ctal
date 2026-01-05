<?php

require_once __DIR__ . '/../app/tool-helper.php';

// Load tool registry
$tools = require __DIR__ . '/../config/tools.php';

$tool = $_GET['tool'] ?? null;

// Base path to modules
$modulesPath = __DIR__ . '/../modules';

if ($tool) {
    $tool = basename($tool); // security

    // Check if tool exists in registry
    if (!isset($tools[$tool])) {
        http_response_code(404);
        echo 'Tool not registered';
        exit;
    }

    // Check if tool is enabled
    if (empty($tools[$tool]['enabled'])) {
        http_response_code(403);
        echo 'Tool is disabled';
        exit;
    }

    // Resolve tool entry file
    $toolEntry = $modulesPath . '/' . $tool . '/public/index.php';

    if (is_file($toolEntry)) {
        require $toolEntry;
        exit;
    }

    http_response_code(404);
    echo 'Tool entry not found';
    exit;
}

// No tool requested → base app
echo 'Tools CTAL – Base setup working';


