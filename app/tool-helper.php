<?php

/**
 * Tool Helper
 * Provides read-only helper functions for tools
 */

function getAllEnabledTools(): array
{
    $tools = require __DIR__ . '/../config/tools.php';

    return array_filter($tools, function ($tool) {
        return !empty($tool['enabled']);
    });
}

function getToolsByCategory(string $category): array
{
    $tools = getAllEnabledTools();

    return array_filter($tools, function ($tool) use ($category) {
        return $tool['category'] === $category;
    });
}