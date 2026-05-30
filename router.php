<?php
$docRoot = __DIR__;
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = rawurldecode($uri);
$fsPath = $docRoot . $path;

if ($path === '' || $path === '/') {
    require $docRoot . '/index.php';
    return;
}

if (is_file($fsPath)) {
    return false;
}

if (is_dir($fsPath)) {
    $indexFile = rtrim($fsPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'index.php';
    if (is_file($indexFile)) {
        require $indexFile;
        return;
    }
}

$routes = [
    '#^/home$#i' => '/index.php',
    '#^/blog/([A-Za-z0-9-]+)$#i' => '/detail.php?slug=$1',
    '#^/view/([A-Za-z0-9-]+)$#i' => '/detail-view.php?slug=$1',
];

foreach ($routes as $pattern => $destination) {
    if (preg_match($pattern, $path, $matches)) {
        $parts = explode('?', $destination, 2);
        $script = $docRoot . $parts[0];
        if (!is_file($script)) {
            break;
        }
        if (isset($parts[1])) {
            parse_str($parts[1], $query);
            $_GET = array_merge($_GET, $query);
        }
        foreach ($matches as $index => $match) {
            if ($index === 0) {
                continue;
            }
            $_GET[$index] = $match;
        }
        require $script;
        return;
    }
}

$phpFile = $docRoot . $path . '.php';
if (is_file($phpFile)) {
    require $phpFile;
    return;
}

http_response_code(404);
require $docRoot . '/index.php';
