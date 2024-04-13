<?php
function paginate($items, $perPage, $page)
{
    $totalPages = ceil(count($items) / $perPage);
    $page = max(min($page, $totalPages), 1); 

    $start = ($page - 1) * $perPage;

    return [
        'items' => array_slice($items, $start, $perPage),
        'totalPages' => $totalPages,
        'currentPage' => $page,
    ];
}
function filterByActivePromotion($data, $active_promotion, $key)
{
    $filtered_data = [];
    foreach ($data as $item) {
        if ($item['promotion'] === $active_promotion) {
            $filtered_data[] = $item[$key];
        }
    }
    return $filtered_data;
}

?>