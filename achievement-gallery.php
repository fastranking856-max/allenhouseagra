<?php
include "includes/apis.php";

$page = "gallery-detail";
$galleryId = $_GET['id'] ?? null;
$data = $achievement_data;

// Safety check + redirect if invalid
if (!$data || $data['status'] !== 'success' || !$galleryId) {
    header("Location: achievements.php");
    exit;
}

$gallery = null;
foreach ($data['data'] as $item) {
    if ((string)$item['id'] === (string)$galleryId) {
        $gallery = $item;
        break;
    }
}

if (!$gallery) {
    header("Location: achievements.php");
    exit;
}

// Prepare media array (handles both 'medias' array and single 'media')
$medias = $gallery['medias'] ?? [];
if (empty($medias) && !empty($gallery['media'])) {
    $medias = [$gallery['media']];
}

// Fallback values
$page_title = htmlspecialchars($gallery['achievementtitle'] ?? 'Achievement Gallery');
$desc = trim((string) (
    $gallery['achivementdescription']
    ?? $gallery['description']
    ?? $gallery['content']
    ?? ''
));
$date_raw   = $gallery['achevementdate'] ?? $gallery['date'] ?? '';
$date       = $date_raw ? date("d M, Y", strtotime($date_raw)) : 'Date not available';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://allenhouseagra.com/achievement-gallery?id=<?= urlencode($galleryId) ?>" />
    <title><?= $page_title ?> | AllenHouse Agra</title>
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <style>
        .pdf-preview {
            height: 300px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: all 0.25s ease;
            text-align: center;
            padding: 1.25rem;
        }
        .pdf-preview:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 20px -4px rgba(220,38,38,0.15);
            border-color: #f87171;
        }
        .pdf-icon {
            font-size: 4rem;
            color: #dc2626;
            margin-bottom: 0.75rem;
        }
        .pdf-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: #991b1b;
        }
        .pdf-hint {
            margin-top: 0.75rem;
            font-size: 0.875rem;
            color: #6b7280;
        }
        .gallery-item-wrapper {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .gallery-item-wrapper:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body class="bg-gray-50">

    <?php include "includes/header.php"; ?>

    <div class="main relative">

        <!-- Banner -->
        <div class="bg-center flex items-center text-left h-[300px] common-banner">
            <div class="w-full px-4 sm:px-8">
                <h1 class="text-[28px] sm:text-[36px] font-[800] text-white pl-4 sm:ml-[7rem] hr-line relative uppercase leading-tight">
                    <?= $page_title ?>
                </h1>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">

            <!-- Back & Date -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
                <a href="javascript:history.back()" class="back-link inline-flex items-center gap-2 text-blue-main font-bold text-xs uppercase tracking-widest transition-all hover:text-blue-700">
                    <svg class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Achievements
                </a>
                <div class="bg-white px-5 py-3 rounded-lg shadow-sm border border-gray-100">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Published:</span>
                    <span class="text-sm font-bold text-blue-main ml-2"><?= htmlspecialchars($date) ?></span>
                </div>
            </div>

            <!-- Description -->
            <?php if ($desc !== ''): ?>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 mb-12">
                <h2 class="text-blue-main text-lg font-black uppercase tracking-tight mb-5 flex items-center gap-3">
                    <span class="w-10 h-[3px] bg-orange-500"></span>
                    Details
                </h2>
                <div class="text-gray-700 leading-relaxed text-base prose max-w-none italic">
                    <?php
                        $clean = $desc;

                        // 1. If string starts/ends with literal double quotes from API, remove them
                        $clean = trim($clean, '"');

                        // 2. Remove the extra <span style=...> wrapper if it exists
                        $clean = preg_replace('/<span style="[^"]*">(.*?)<\/span>/s', '$1', $clean);

                        // 3. Output as HTML
                        echo $clean;
                    ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Media Grid -->
            <?php if (!empty($medias)): ?>
            <div id="photoGallerys" class="grid gap-5 sm:gap-6 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 mb-20">
                <?php foreach ($medias as $media): 
                    $url = htmlspecialchars($media['urls'] ?? '');
                    if (empty($url)) continue;

                    $ext = strtolower(pathinfo($url, PATHINFO_EXTENSION));
                    $isPdf = $ext === 'pdf';
                ?>
                    <div class="gallery-item-wrapper rounded-xl overflow-hidden shadow-sm bg-white border border-gray-200">
                        <?php if ($isPdf): ?>
                            <a href="<?= $url ?>" target="_blank" class="block h-full">
                                <div class="pdf-preview">
                                    <div class="pdf-icon">ðŸ“„</div>
                                    <div class="pdf-label">PDF Document</div>
                                    <div class="pdf-hint">Click to view / download</div>
                                </div>
                            </a>
                        <?php else: ?>
                            <a href="<?= $url ?>" data-fancybox="gallery" class="block h-full">
                                <img src="<?= $url ?>" 
                                     alt="<?= htmlspecialchars($gallery['achievementtitle'] ?? 'Achievement Image') ?>" 
                                     class="w-full h-full object-cover" 
                                     loading="lazy">
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="text-center py-20 text-gray-600 text-xl bg-white rounded-2xl shadow-sm border border-gray-200">
                No media available for this achievement.
            </div>
            <?php endif; ?>

        </div>
    </div>

    <?php include "includes/footer.php"; ?>
    <?php include "includes/foot.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            Toolbar: {
                display: {
                    left: ["infobar"],
                    middle: ["zoomIn", "zoomOut", "toggle1to1", "rotateCCW", "rotateCW"],
                    right: ["slideshow", "thumbs", "close"],
                },
            },
            Images: { zoom: true },
            Thumbs: { autoStart: true },
            protect: true
        });
    </script>
</body>
</html>
