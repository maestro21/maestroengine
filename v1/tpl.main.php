<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $title;?></title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,500,600,700,800,900|Roboto:100,300,400,500,600,700,800,900&amp;subset=cyrillic' rel='stylesheet' type='text/css'>
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo $title;?>">
  <link rel="stylesheet" href="<?php echo BASE_URL?>layout.css?v=<?php echo $v;?>">
  <link rel="stylesheet" href="<?php echo BASE_URL?>gui.css?v=<?php echo $v;?>">
  <link rel="stylesheet" href="<?php echo BASE_URL?>__theme.css?v=<?php echo $v;?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
  <header>
    <nav class="wrap" class="navbar navbar-inverse navbar-fixed-top">
      <?php foreach($menu as $link => $text) { ?>
          <a href="<?php echo BASE_URL . $lang . '/'. $link;?>"><?php echo $text;?></a>
      <?php } ?>
      <div class="right langs">
          <ul class="dropdown">
              <li><a href="#"><?php echo $deflang;?></a>
                  <ul>
                      <?php foreach($langs as $lang) { ?>
                          <li><a href="<?php echo BASE_URL . $lang;?>"><?php echo $lang;?></a></li>
                      <?php } ?>
                  </ul>
              </li>
          </ul>
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
