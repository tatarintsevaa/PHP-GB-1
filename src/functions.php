<?php
//Файл с функциями нашего движка

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [], $layout = 'layout')
{
    return renderTemplate(LAYOUTS_DIR . $layout, [
        'content' => renderTemplate($page, $params),
        'menu' => renderTemplate('menu', $params),
    ]);
}

/*
 * Функция подготовки переменных для передачи в шаблон
 */
function prepareVariables($page, $action) {
    $params = [
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
        ]
    ];
    switch ($page) {
        case 'gallery':

            if (isset($_POST['load'])) {
                filesUpload();
            }

            $params['imgArray'] = getImageList( BIG_IMG_DIR);
            break;

        case 'gallerySQL':

            $params['images'] = getImagesListSQL();
            break;

        case 'imageSQL':
            $params['image'] = getOneImage($_GET['id']);

            break;

        case 'catalog':
            $params['catalog'] = getCatalog();
            break;
        case 'catalogItem':
            doFeedbackAction($params, $action);
            $params['item'] = getCatalogItem($_GET['id']);

            $params['feedback'] = getAllFeedback($_GET['id']);
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

    return $params;
}
//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemplate($page, $params = [])
{
    ob_start();

    if (!is_null($params))
        extract($params);

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        var_dump($fileName);
        Die("Страницы {$page} не существует.");
    }

    return ob_get_clean();
}



function getMenu($menuArray, $class = 'menu')
{
    $output = "<ul class=\"{$class}\">";
    foreach ($menuArray as $item) {
        $output .= "<li><a href=\"{$item["href"]}\">{$item["tittle"]}</a>";
        if (isset($item["submenu"])) {
            $output .= getMenu($item["submenu"], 'submenu');
        }
        $output .= "</li>";
    }
    $output .= "</ul>";
    return $output;
}

