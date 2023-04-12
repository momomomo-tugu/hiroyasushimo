<!DOCTYPE html>
<html>

<head>
    <title>Fakebook | トップページ</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/masonry.css">
</head>

<body>
    <main class="mainContainer">
        <h2 class="pageTitle">マイページ</h2>
        <div class="masonry-wrap">
            <ul class="masonry-indexView js-masonry-indexView">
                <?php foreach ($myitem as $item) { ?>
                    <li class="item js-item">
                        <div class="card">
                            <a href="../../items/items_controller/items_detail.php?id=<?= $item['id'] ?>">
                                <img src="../../assets/images/<?= htmlspecialchars($item['image_path']) ?>.png">
                            </a>
                            <p class="thumbnailTitle"><?= htmlspecialchars($item['title']) ?></p>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </main>

    <script src="../../js/jquery.js"></script>
    <script src="../../js/masonry.pkgd.min.js"></script>
    <script src="../../js/imagesloaded.pkgd.min.js"></script>
    <script src="../../js/main.js"></script>

</body>

</html>