<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .menu {
            list-style-type: none;
            display: flex;
            justify-content: space-around;
        }

        .submenu {
            list-style-type: none;
            display: flex;
            flex-direction: column;
        }

        .gallery_box {
            max-width: 800px;
            display: flex;
            margin: 0 auto;
            justify-content: space-around;
            flex-wrap: wrap;
            align-content: space-between;
        }

        .gallery_box a {
            margin-bottom: 10px;
            transition: transform 0.2s;
        }

        .gallery_box a:hover {
            transform: scale(1.05);
        }

        h1 {
            text-align: center;
        }
    </style>
<body>
<?= $menu ?>
<?= $content ?>
</body>
</html>