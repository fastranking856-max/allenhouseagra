<?php
include "includes/apis.php";

// Function to fetch bus route data from the correct API
function fetchBusRoutesFromApi($branchId = 1) {
    $url = "https://apscmsnew.fastranking.cloud/api/get-bus-routes/{$branchId}";
    
    // Try cURL first
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // only if needed
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode === 200 && $response !== false) {
        $data = json_decode($response, true);
        if (isset($data['success']) && $data['success'] === true && !empty($data['data'])) {
            return $data['data'];
        }
    }
    
    // Fallback: try file_get_contents if allow_url_fopen is on
    if (ini_get('allow_url_fopen')) {
        $response = @file_get_contents($url);
        if ($response !== false) {
            $data = json_decode($response, true);
            if (isset($data['success']) && $data['success'] === true && !empty($data['data'])) {
                return $data['data'];
            }
        }
    }
    
    return [];
}

// Get bus data: first from cached CMS (if any), then from direct API
$bus_data = [];

// 1. Try cached CMS data (old structure – might be empty)
$raw_cms = $GLOBALS['api_cache']['bus_route_data'] ?? [];
if (!empty($raw_cms['data']['sections'])) {
    // It's a CMS page with sections – look for a table or custom field
    foreach ($raw_cms['data']['sections'] as $section) {
        if ($section['title'] === 'Bus Routes' && !empty($section['table_json_data'])) {
            // If the CMS stores bus routes in a table JSON, handle it
            $bus_data = json_decode($section['table_json_data'], true) ?? [];
            break;
        }
    }
}

// 2. If no data from CMS, fetch from the real bus route API
if (empty($bus_data)) {
    $bus_data = fetchBusRoutesFromApi(1); // Branch ID 1 (APS Agra)
}

// Static banner (the API has no hero section)
$banner_html = '
<div>
    <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
        Bus Route
    </h1>
</div>
<div class="md:w-[100%]">
    <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
        Bus Route
    </h1>
</div>';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AllenHouse Agra | Bus Route</title>
    <link rel="canonical" href="https://allenhouseagra.com/bus-route" />
    <?php include "includes/head.php"; ?>
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="main relative mb-[40px] sm:mb-[120px]">
    <!-- Banner -->
    <div class="bg-center flex items-center text-center h-[300px] comman-banner">
        <?php echo $banner_html; ?>
    </div>

    <!-- Breadcrumb -->
    <div class="flex m-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">Home</a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <p class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Admission</p>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="bus-route" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Bus Route</a>
                </div>
            </li>
        </ol>
    </div>

    <!-- Bus Route Table -->
    <div class="main relative sm:top-[20px] mb-[40px] sm:mb-[120px] mx-0 sm:mx-2">
        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="sm:mt-10 relative">
                <div class="md:w-[100%]">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-10">
                        <div class="overflow-x-auto">
                            <?php if (!empty($bus_data)): ?>
                                <table class="table-auto w-full border border-collapse border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="border border-gray-300 px-4 py-2">S.No.</th>
                                            <th class="border border-gray-300 px-4 py-2">Vehicle No.</th>
                                            <th class="border border-gray-300 px-4 py-2">Route Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $s = 1;
                                        foreach ($bus_data as $row) {
                                            if (empty($row['bus_routes']) || !is_array($row['bus_routes'])) {
                                                continue;
                                            }
                                            
                                            $source = [];
                                            $destination = [];
                                            $normal = [];
                                            
                                            foreach ($row['bus_routes'] as $route) {
                                                if (isset($route['is_source']) && $route['is_source'] == 1) {
                                                    $source[] = $route['routes'];
                                                } elseif (isset($route['is_destination']) && $route['is_destination'] == 1) {
                                                    $destination[] = $route['routes'];
                                                } else {
                                                    $normal[] = $route['routes'];
                                                }
                                            }
                                            
                                            $orderedRoutes = array_merge($source, $normal, $destination);
                                            ?>
                                            <tr class="hover:bg-gray-100">
                                                <td class="border border-gray-300 px-4 py-2"><?php echo $s++; ?></td>
                                                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['busnumber'] ?? ''); ?></td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    <?php echo implode(' → ', $orderedRoutes); ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p class="text-center text-gray-500 py-8">Bus route information will be available soon.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/foot.php"; ?>

</body>
</html>