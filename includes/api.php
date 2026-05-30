<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/proxy/config.php';

if (!defined('ALLENHOUSE_CMS_API_BASE')) {
    define('ALLENHOUSE_CMS_API_BASE', CMS_API_URL);
}

if (!function_exists('normalizeApiCacheKey')) {
    function normalizeApiCacheKey(string $endpoint): string
    {
        $endpoint = str_replace(
            ['SCHOOL_ID_PLACEHOLDER', 'BRANCH_ID_PLACEHOLDER'],
            [SCHOOL_ID, defined('BRANCH_ID') ? (string) BRANCH_ID : '1'],
            $endpoint
        );

        if (defined('BRANCH_ID')) {
            $endpoint = str_replace(
                ['branch/2', 'branches/2', 'get-bus-routes/2'],
                ['branch/' . BRANCH_ID, 'branches/' . BRANCH_ID, 'get-bus-routes/' . BRANCH_ID],
                $endpoint
            );
        }

        return ltrim($endpoint, '/');
    }
}

if (!function_exists('fetchApiData')) {
    /**
     * Read preloaded CMS data from the bulk cache populated by includes/apis.php.
     */
    function fetchApiData(string $endpoint): array
    {
        if (!isset($GLOBALS['api_cache'])) {
            require_once __DIR__ . '/apis.php';
        }

        $cacheKey = normalizeApiCacheKey($endpoint);
        if (isset($GLOBALS['api_cache'][$cacheKey]) && is_array($GLOBALS['api_cache'][$cacheKey])) {
            return $GLOBALS['api_cache'][$cacheKey];
        }

        return ['status' => 'error', 'data' => []];
    }
}
