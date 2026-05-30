<?php

if (!function_exists('cmsSharedBasePath')) {
    function cmsSharedBasePath(): string
    {
        $siteShared = dirname(__DIR__) . '/shared/cms';
        if (is_file($siteShared . '/cms-core.php')) {
            return $siteShared;
        }

        $monorepoShared = dirname(__DIR__, 2) . '/shared/cms';
        if (is_file($monorepoShared . '/cms-core.php')) {
            return $monorepoShared;
        }

        throw new RuntimeException('shared/cms not found (expected site/shared/cms or monorepo shared/cms)');
    }
}

$cmsShared = cmsSharedBasePath();
require_once $cmsShared . '/cms-core.php';
require_once $cmsShared . '/cms-section-renderer.php';
require_once $cmsShared . '/cms-gallery-dynamic.php';

cmsCoreConfigure([
    'branch_suffix' => 'agra',
    'branch_hosts' => ['allenhouseagra.com', 'www.allenhouseagra.com'],
    'header_layout_slug' => 'header-aps-agra',
    'footer_layout_slug' => 'footer-aps-agra',
]);

if (!function_exists('cmsFetchAgraPage')) {
    function cmsFetchAgraPage(string $slug): array
    {
        return cmsFetchPageBySlug($slug);
    }
}
