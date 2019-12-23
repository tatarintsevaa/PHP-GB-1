<?php

//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек
include dirname(__DIR__) . "/config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
$params = [
    'menu' => [
        [
            'tittle' => 'Главная',
            'href' => '/'
        ],
        [
            'tittle' => 'Галерея',
            'href' => '/?page=gallery'
        ],
        [
            'tittle' => 'Каталог',
            'href' => '/?page=catalog',
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
    ]
];
switch ($page) {
    case 'gallery':

        if (isset($_POST['load'])) {
            filesUpload();
        }

        $params['imgArray'] = getImageList( BIG_IMG_DIR);
        break;
    case 'catalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],
            [
                'name' => 'Чай',
                'price' => 1
            ],
            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];
        break;
    case 'apicatalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],
            [
                'name' => 'Чай',
                'price' => 1
            ],
            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];
        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        exit;
}


echo render($page, $params);


