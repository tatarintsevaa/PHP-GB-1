<?php
function getMenu($menuArray, $class = 'menu') {
    $output = "<ul class=\"{$class}\">";
    foreach($menuArray as $item) {
        $output .= "<li><a href=\"{$item["href"]}\">{$item["tittle"]}</a>";
        if (isset($item["submenu"])) {
            $output .= getMenu($item["submenu"],'submenu');
        }
        $output .= "</li>";
    }
    $output .= "</ul>";
    return $output;
}
echo getMenu($params['menu']);