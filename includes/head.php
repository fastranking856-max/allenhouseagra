<?php
require_once __DIR__ . '/environment.php';
if (!isset($api_url)) {
    require_once __DIR__ . '/../proxy/config.php';
    $api_url = rtrim(API_BASE_URL, '/');
}
if (!defined('BRANCH_ID')) {
    require_once __DIR__ . '/../proxy/config.php';
}
$apsCssBase = is_vercel_deployment() ? '/' : site_base_url();
?>
<link rel="stylesheet" href="<?= htmlspecialchars($apsCssBase, ENT_QUOTES, 'UTF-8') ?>assets/css/styles.css?v=0.10">
<link rel="stylesheet" href="<?= htmlspecialchars($apsCssBase, ENT_QUOTES, 'UTF-8') ?>assets/css/responsive.css?v=0.10">
<script src="<?= htmlspecialchars($apsCssBase, ENT_QUOTES, 'UTF-8') ?>assets/js/tailwind.js"></script>
<link rel="icon" type="image/x-icon"
    href="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/ZORSdJXNGlZAVQJ4ZNWZsMEVZ1thgvBkL8JeOSXH.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
<meta name="robots" content="index, follow" />
<meta name="google-site-verification" content="eCX3aoF_zNNvLKhGfZeD9COd7-Xe2C7vlWTpAWYh188" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<style>
    .ql-editor {
        height: auto !important;
        padding: 0 !important;
        white-space: normal !important;
    }
</style>

<script>
var baseUrl = "<?= isset($api_url) ? $api_url : rtrim(API_BASE_URL, '/') ?>";
var cmsBranchId = <?= (int) BRANCH_ID ?>;
function normalizeCmsGalleryItem(item) {
    var medias = (item.media || []).map(function(m, i) {
        return {
            urls: m.media_url || m.media_file || '',
            pivot: { is_cover: i === 0 ? '1' : '0' }
        };
    });
    var subType = (item.gallery_sub_type && item.gallery_sub_type.sub_type_name) || item.gallery_type || '';
    return {
        id: item.id,
        title: item.heading || item.gallery_title || '',
        achievementtitle: item.heading || item.gallery_title || '',
        achivementdescription: item.content || '',
        description: item.content || '',
        achevementdate: item.date,
        date: item.date,
        created_at: item.created_at || item.date,
        achivementtype: subType,
        type: subType,
        subTypeId: (item.gallery_sub_type && item.gallery_sub_type.id) || null,
        subTypeName: subType,
        galleryType: item.gallery_type || '',
        medias: medias
    };
}
var CMS_GALLERY_SUBTYPE = { achievements: 1, photo: 5, video: 6, print: 7 };
</script>
<script src="<?= htmlspecialchars($apsCssBase, ENT_QUOTES, 'UTF-8') ?>assets/js/gallery-year-api.js?v=2"></script>
<!-- Google Tag Manager -->
<script>
(function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-KCBZ644Q');
</script>
<!-- End Google Tag Manager -->

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "@id": "https://allenhouseagra.com/#website",
  "url": "https://allenhouseagra.com/",
  "name": "Allenhouse Agra",
  "alternateName": "Allenhouse School Agrai",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://allenhouseagra.com/?s={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "School",
  "@id": "https://allenhouseagra.com/#school",
  "name": "Allenhouse Agra",
  "alternateName": "Allenhouse School Agra",
  "url": "https://allenhouseagra.com/",
  "logo": "https://allenhouseagra.com/assets/images/logo.png",
  "image": "https://lh3.googleusercontent.com/p/AF1QipPxGrgIsvDXxowK2uux_HT1WITnatYym-BETkQH=w408-h272-k-no",
  "telephone": "+91-9044554801",
  "email": "Principal@allenhouseagra.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Plot No. C2, Sector-C2, Shastripuram
",
    "addressLocality": "Agra",
    "addressRegion": "Uttar Pradesh",
    "postalCode": "282007",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "27.1932705",
    "longitude": "80.2527465"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday"
    ],
    "opens": "08:00",
    "closes": "16:00"
  },
  "sameAs": [
    "https://www.facebook.com/Allenhouseagra/",
    "https://www.instagram.com/allenhouseagra/",
    "https://www.linkedin.com/school/allenhouse-public-school-agra/",
    "https://www.youtube.com/@AllenhouseAgra"
  ]
}
</script>
<meta property="og:url" content="https://allenhouseagra.com/">
<meta property="og:type" content="website">
<meta property="og:title" content="Best ICSE Board School in Agra | Allenhouse Public School">
<meta property="og:description" content="Looking for the best ICSE board school in Agra? APS Agra is a top-rated English medium ICSE school known for academics, safety & admissions excellence.">
<meta property="og:image" content="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/DVnWgXx5Vld6xXMygOLzKaI7hnXrxyfMiKWQBjFx.png">
<meta property="og:site_name" content="Allenhouse Agra">



<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="allenhouseagra.com">
<meta property="twitter:url" content="https://allenhouseagra.com/">
<meta name="twitter:title" content="Best ICSE Board School in Agra | Allenhouse Public School">
<meta name="twitter:description" content="Looking for the best ICSE board school in Agra? APS Agra is a top-rated English medium ICSE school known for academics, safety & admissions excellence.">
<meta name="twitter:image" content="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/DVnWgXx5Vld6xXMygOLzKaI7hnXrxyfMiKWQBjFx.png">
