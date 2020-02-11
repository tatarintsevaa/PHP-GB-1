<?php
function getMenu($menuArray, $class = 'menu')
{
    $output = "<ul class=\"{$class}\">";
    foreach ($menuArray as $item) {
        if ($item['href'] == '/admin/') {
            if (!is_admin()) {
                unset($item, $menuArray);
            }
        }
        $output .= "<li><a href=\"{$item["href"]}\">{$item["tittle"]}</a>";
        if (isset($item["submenu"])) {
            $output .= getMenu($item["submenu"], 'submenu');
        }
        $output .= "</li>";
    }
    $output .= "</ul>";
    return $output;
}


function getMenuList() {
    return [
        'menu' => [
            [
                'tittle' => 'Главная',
                'href' => '/'
            ],
            [
                'tittle' => 'Галерея',
                'href' => '/gallery/'
            ],
            [
                'tittle' => 'Галерея SQL',
                'href' => '/gallerySQL/'
            ],
            [
                'tittle' => 'Каталог',
                'href' => '/catalog/',
                'submenu' => [
                    [
                        'tittle' => 'подменю 1',
                        'href' => 'https://geekbrains.ru'
                    ],
                    [
                        'tittle' => 'подменю 2',
                        'href' => 'https://geekbrains.ru'
                    ]
                ]
            ],
            [
                'tittle' => 'Корзина',
                'href' => '/cart/'
            ],
            [
                'tittle' => 'Админка',
                'href' => '/admin/'
            ],
        ]
    ];
}