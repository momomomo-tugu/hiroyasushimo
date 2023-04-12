<!DOCTYPE html>
<html>

<head>
  <title>Fakebook | トップページ</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
  <link rel="stylesheet" href="../../css/html5reset-1.6.1.css">
  <link rel="stylesheet" href="../../css/style.css">
  <!-- <link rel="stylesheet" href="../../css/masonry.css"> -->
</head>

<body>
  <main class="mainContainer">
    <div>
      <ul class="index__listWrap">
        <?php foreach ($items as $item) { ?>
          <li>
            <div class="card">
              <!-- ログインしている場合 -->
              <?php if (isset($_SESSION['member_id'])) { ?>
                <!-- ログインしているユーザーが管理者だったら -->
                <?php if ($_SESSION['member_id'] == '9') {?>
                  <a href="items_detail.php?id=<?= $item['id'] ?>">
                    <img src="../../assets/images/<?= htmlspecialchars($item['image_path']) ?>.png" class="index__listWrap__img">
                  </a>
                  <?php if($item['title'] !== '') { ?> 
                    <p class="thumbnailTitle"><?= htmlspecialchars($item['title']) ?></p>
                  <?php } ?>
                <!-- ログインしているユーザーが管理者ではなかったら -->
                <?php } else { ?>
                  <?php if($item['image_path'] !== '../../assets/images/getReady') { ?>
                    <a href="items_detail.php?id=<?= $item['id'] ?>">
                      <img src="../../assets/images/<?= htmlspecialchars($item['image_path']) ?>.png" class="index__listWrap__img">
                    </a>
                    <?php if($item['title'] !== '') { ?> 
                      <p class="thumbnailTitle"><?= htmlspecialchars($item['title']) ?></p>
                    <?php } ?>
                  <?php } else {?>
                    <div>
                      <img src="../../assets/images/<?= htmlspecialchars($item['image_path']) ?>.png" class="index__listWrap__img">
                    </div>
                  <?php } ?>
                <?php } ?>
              <!-- ログインしていない場合 -->
              <?php } else { ?>
                <?php if($item['image_path'] !== '../../assets/images/getReady') { ?>
                    <a href="items_detail.php?id=<?= $item['id'] ?>">
                      <img src="../../assets/images/<?= htmlspecialchars($item['image_path']) ?>.png" class="index__listWrap__img">
                    </a>
                    <?php if($item['title'] !== '') { ?> 
                      <p class="thumbnailTitle"><?= htmlspecialchars($item['title']) ?></p>
                    <?php } ?>
                  <?php } else {?>
                    <div>
                      <img src="../../assets/images/<?= htmlspecialchars($item['image_path']) ?>.png" class="index__listWrap__img">
                    </div>
                  <?php } ?>
              <?php } ?>
            </div>
          </li>
        <?php } ?>
      </ul>
    </div>
  </main>

  <script src="../../js/jquery.js"></script>
  <!-- <script src="../../js/masonry.pkgd.min.js"></script>
  <script src="../../js/imagesloaded.pkgd.min.js"></script> -->
  <!-- <script src="../../js/main.js"></script> -->
  <script src="../../js/hamburger.js"></script>

</body>

</html>