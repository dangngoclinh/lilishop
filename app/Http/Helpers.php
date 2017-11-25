<?php

function option($key)
{
    $option = config('option');
    if (isset($option[$key]))
        return $option[$key];
    return '';
}

function media($file) {
    return asset(config('constants.storage_uploads') . $file);
}

function sort_category($categories) {
    $result     = array();
    foreach ($categories as $category) {
        $parent            = ($category->parent_id != null) ? $category->parent_id : 0;
        $result[$parent][] = $category;
    }
    return $result;
}