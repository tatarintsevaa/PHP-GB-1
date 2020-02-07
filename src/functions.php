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
        'auth' => renderTemplate('auth', $params),
    ]);
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
        ]
    ];
}

/*
 * Функция подготовки переменных для передачи в шаблон
 */
function prepareVariables($page, $action)
{
    $params = getMenuList();

    doAuthActions($_GET['logout'],$params, $_POST['login'], $_POST['pass']);
/*
 * todo исправить баг с отзывами.
 * */
    $params['user'] = 'admin';
    switch ($page) {
        case 'gallery':
            if (isset($_POST['load'])) {
                filesUpload();
            }
            $params['imgArray'] = getImageList(BIG_IMG_DIR);
            break;
        case 'gallerySQL':
            $params['images'] = getImagesListSQL();
            break;
        case 'imageSQL':
            $params['image'] = getOneImage($_GET['id']);
            break;
        case 'catalog':
            session_start();
            $params['catalog'] = getCatalog();
            break;
        case 'catalogItem':

            $params['item'] = getCatalogItem($_GET['id']);
            $params['feedback'] = getAllFeedback($_GET['id']);

            break;
        case 'apiFeed':
            $data = json_decode(file_get_contents('php://input'));
            $parsedData = [
                'name' => $data->name,
                'feed' => $data->feed,
                'id_good' => $data->id_good,
            ];
            if ($action == 'add') {
                $id_goods = $parsedData['id_good'];
                $name = saveData($parsedData['name']);
                $feedback = saveData($parsedData['feed']);
                $sql = "INSERT INTO feedback (`name`, `feedback`, `id_goods`) VALUES ('{$name}', '{$feedback}','{$id_goods}')";
                $result = executeQuery($sql);
                $id_feed = mysqli_insert_id(getDb());
                echo json_encode(['status' => $result, 'id' => $id_feed]);
            }
            if ($action == 'edit') {
                $id_feed = (int)$_GET['id_feed'];
                $sql = "SELECT * FROM `feedback` WHERE id = '{$id_feed}'";
                $result = getAssocResult($sql)[0];
                echo json_encode(['name' => $result['name'], 'feed' => $result['feedback']]);
            }
            if ($action == "save") {
                $id = (int)$_GET['id_feed'];
                $name = saveData($parsedData['name']);
                $feedback = saveData($parsedData['feed']);
                $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id};";
                $result = executeQuery($sql);
                echo json_encode(['status' => $result]);

            }
            if ($action == "del") {
                $id_feed = (int)$_GET['id_feed'];
                $sql = "DELETE FROM `feedback` WHERE id = {$id_feed}";
                $result = executeQuery($sql);
                echo json_encode(['status' => $result]);
            }
            die();
            break;
        case 'cart':
            session_start();
            $params['products'] = getCartProducts(session_id());
            $params['totalPrice'] = totalPrice($params['products']);
            break;
        case 'api':
            session_start();
            echo doOrderActions($action, $_GET['id']);
            die();
            break;
        case 'apiAuth':
            if ($action == 'auth') {
                $data = json_decode(file_get_contents('php://input'));
                $parsedData = [
                    'login' => $data->login,
                    'pass' => $data->pass,
                    'save' => $data->save,
                ];
                var_dump($parsedData);
            }
            die();
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

