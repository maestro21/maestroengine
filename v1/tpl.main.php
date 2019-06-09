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
  <link rel="stylesheet" href="<?php echo BASE_URL?>theme.css?v=<?php echo $v;?>">
    <link rel="stylesheet" href="<?php echo BASE_URL?>adminpanel.css?v=<?php echo $v;?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <?php include('tpl.aside.php');?>
  <header>
    <nav class="wrap" class="navbar navbar-inverse navbar-fixed-top">
        <?php echo navBtns();?>
        <div class="tmcn"><?php include('topmenu.php');?></div>
      <div class="right langs">
          <ul class="dropdown">
              <li> <a href="#"> <span class="lang_short"><?php echo $lang;?></span>
                  <span class="lang_long"><img src="http://localhost/maestroengine/v07/front/img/langs/en.png" align="absmiddle" class="avatar"> English</span></a>
                  <ul>
                      <?php foreach($langs as $lang) { ?>
                          <li><a href="<?php echo BASE_URL . $lang;?>">
                                  <span class="lang_short"><?php echo $lang;?></span>
                                  <span class="lang_long"><img src="http://localhost/maestroengine/v07/front/img/langs/en.png" align="absmiddle" class="avatar"> English</span>
                              </a></li>
                      <?php } ?>
                  </ul>
              </li>
          </ul>
      </div>

        <div class="tmcm"><?php include('topmenu.php');?></div>
    </nav>
  </header>
  <main>
    <div class="wrap">
        <h1>Welcome page</h1>
        <div class="content">
            <?php include('pages/' . $page . '.php');?>
        </div>
    </div>
  </main>
</body>
</html>
