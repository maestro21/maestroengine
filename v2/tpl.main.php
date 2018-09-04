<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $title;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $title;?>">
  <link rel="stylesheet" href="<?php echo BASE_URL?>style.css?v=<?php echo $v;?>">
</head>
<body>
  <header>
    <nav class="wrap" class="navbar navbar-inverse navbar-fixed-top">
      <?php foreach($menu as $link => $text) { ?>
          <a href="<?php echo BASE_URL . $lang . '/'. $link;?>"><?php echo $text;?></a>
      <?php } ?>
      <div class="langs">
        <?php foreach($langs as $lang) { ?>
            <a href="<?php echo BASE_URL . $lang;?>"><?php echo $lang;?></a>
        <?php } ?>
      </div>
    </nav>
  </header>
  <main>
    <div class="wrap">
      <?php include('pages/' . $page . '.php');?>
    </div>
  </main>
</body>
</html>
