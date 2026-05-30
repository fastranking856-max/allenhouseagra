<?php
$d = json_decode(file_get_contents('cache/api-bulk.json'), true);
$secs = $d['about_us']['data']['sections'] ?? [];

echo "=== ABOUT US SECTIONS ===\n";
foreach ($secs as $i => $s) {
    echo "Section $i: " . ($s['title'] ?? '?') . " [type=" . ($s['section_type'] ?? '?') . ", layout=" . ($s['layout'] ?? '?') . "]\n";
    
    // Check columns for image URLs
    if (!empty($s['columns'])) {
        foreach ($s['columns'] as $ci => $col) {
            if (!empty($col['image_url'])) {
                echo "  Column $ci image_url: " . $col['image_url'] . "\n";
            }
        }
    }
    
    // Check resolved_content items
    if (!empty($s['resolved_content']['items'])) {
        $items = $s['resolved_content']['items'];
        echo "  Carousel items: " . count($items) . "\n";
        if (!empty($items[0]['image_url'])) {
            echo "  First item image_url: " . $items[0]['image_url'] . "\n";
        }
    }
}
