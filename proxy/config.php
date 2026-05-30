<?php
// Central config for API base URL
define('API_BASE_URL', 'https://apscmsnew.fastranking.cloud');
define('CMS_API_URL', rtrim(API_BASE_URL, '/') . '/api');
define('SCHOOL_ID', '1');
define('BRANCH_ID', 1);

if (!function_exists('cms_sort_grade_labels')) {
    /**
     * @param array<int, mixed> $labels
     * @return list<string>
     */
    function cms_sort_grade_labels(array $labels): array
    {
        $gradeOrder = [
            'P.G-I', 'P.G-II', 'Nursery', 'Prep',
            'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'X12', 'XI', 'XII',
        ];
        $unique = [];
        foreach ($labels as $label) {
            $label = trim((string) $label);
            if ($label !== '' && !in_array($label, $unique, true)) {
                $unique[] = $label;
            }
        }
        usort($unique, static function (string $a, string $b) use ($gradeOrder): int {
            $posA = array_search($a, $gradeOrder, true);
            $posB = array_search($b, $gradeOrder, true);
            if ($posA === false && $posB === false) {
                return strnatcasecmp($a, $b);
            }
            if ($posA === false) {
                return 1;
            }
            if ($posB === false) {
                return -1;
            }

            return $posA <=> $posB;
        });

        return $unique;
    }
}
