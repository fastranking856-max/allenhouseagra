<?php

/**
 * Environment helpers: local vs public production behavior (TLS verification, robots, etc.).
 */

if (!function_exists('is_app_local')) {
    /**
     * True on typical dev machines. Outbound HTTPS to APIs uses relaxed TLS only when this is true.
     * Force production behavior: set Apache/PHP env APP_ENV=production
     * Force local behavior: APP_ENV=local
     */
    function is_app_local(): bool
    {
        $env = getenv('APP_ENV');
        if (is_string($env) && $env !== '') {
            $e = strtolower(trim($env));
            if ($e === 'production' || $e === 'prod') {
                return false;
            }
            if ($e === 'local' || $e === 'development' || $e === 'dev') {
                return true;
            }
        }

        $host = strtolower($_SERVER['HTTP_HOST'] ?? '');
        if ($host === '') {
            return false;
        }
        if ($host === 'localhost') {
            return true;
        }
        if (strpos($host, '127.0.0.1') === 0) {
            return true;
        }
        if ($host === '[::1]' || strpos($host, '[::1]:') === 0) {
            return true;
        }
        if (strpos($host, 'localhost:') === 0) {
            return true;
        }
        if (strpos($host, '.local') !== false || strpos($host, '.test') !== false) {
            return true;
        }

        return false;
    }
}

if (!function_exists('is_production_public_host')) {
    /**
     * Primary public site host(s). Used for indexing defaults (robots meta).
     */
    function is_production_public_host(): bool
    {
        $host = strtolower($_SERVER['HTTP_HOST'] ?? '');

        return $host === 'allenhouseagra.com' || $host === 'www.allenhouseagra.com';
    }
}

if (!function_exists('meta_robots_content')) {
    function meta_robots_content(string $whenProduction = 'index, follow'): string
    {
        return is_production_public_host() ? $whenProduction : 'noindex, nofollow';
    }
}

if (!function_exists('curl_ssl_verify_enabled')) {
    function curl_ssl_verify_enabled(): bool
    {
        return !is_app_local();
    }
}

if (!function_exists('apply_curl_ssl_options')) {
    /**
     * @param resource|\CurlHandle $ch
     */
    function apply_curl_ssl_options($ch): void
    {
        $verify = curl_ssl_verify_enabled();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $verify);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $verify ? 2 : 0);
    }
}

if (!function_exists('is_vercel_deployment')) {
    function is_vercel_deployment(): bool
    {
        if (!empty($_SERVER['VERCEL'])) {
            return true;
        }
        $vercelEnv = getenv('VERCEL');
        if (is_string($vercelEnv) && $vercelEnv !== '' && $vercelEnv !== '0') {
            return true;
        }
        $host = strtolower($_SERVER['HTTP_HOST'] ?? '');

        return str_contains($host, 'vercel.app');
    }
}

if (!function_exists('site_base_url')) {
    /**
     * Web path prefix for this site (e.g. /api_integration/allenhouseagra/ or /).
     */
    function site_base_url(): string
    {
        static $cached = null;
        if ($cached !== null) {
            return $cached;
        }

        if (defined('SITE_BASE_URL')) {
            $cached = SITE_BASE_URL;
            return $cached;
        }

        if (is_vercel_deployment()) {
            $cached = '/';
            return $cached;
        }

        if (!empty($_SERVER['APS_BASE_PATH'])) {
            $base = (string) $_SERVER['APS_BASE_PATH'];
            $cached = $base === '/' ? '/' : rtrim($base, '/') . '/';
            return $cached;
        }

        $siteRoot = rtrim(str_replace('\\', '/', realpath(dirname(__DIR__)) ?: dirname(__DIR__)), '/');
        $docRoot = rtrim(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: ($_SERVER['DOCUMENT_ROOT'] ?? '')), '/');

        if ($docRoot !== '' && stripos($siteRoot, $docRoot) === 0) {
            $relative = ltrim(substr($siteRoot, strlen($docRoot)), '/');
            if ($relative === 'vercel-slim' || str_starts_with($relative, 'vercel-slim/')) {
                $cached = '/';
                return $cached;
            }
            $cached = $relative === '' ? '/' : '/' . $relative . '/';
            return $cached;
        }

        if (str_ends_with($siteRoot, '/vercel-slim') || str_ends_with($siteRoot, '\\vercel-slim')) {
            $cached = '/';
            return $cached;
        }

        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        if ($scriptName !== '' && $scriptName[0] === '/') {
            $dir = dirname($scriptName);
            if ($dir === '/' || $dir === '.' || str_contains($dir, 'vercel-slim')) {
                $cached = '/';
                return $cached;
            }
            $cached = rtrim($dir, '/') . '/';
            return $cached;
        }

        $cached = '/';
        return $cached;
    }
}

if (!function_exists('site_asset_url')) {
    function site_asset_url(string $path): string
    {
        $path = ltrim($path, '/');
        if (is_vercel_deployment()) {
            return '/' . $path;
        }

        $url = site_base_url() . $path;
        if (str_contains($url, '/vercel-slim/')) {
            return preg_replace('#/vercel-slim/#', '/', $url, 1);
        }

        return $url;
    }
}