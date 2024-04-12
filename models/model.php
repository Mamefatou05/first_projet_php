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
?>