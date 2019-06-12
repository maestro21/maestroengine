<!DOCTYPE HTML>
<html>
	<head>
		<?php echo tpl('header', array('class' => $class)); ?>
	</head>
	<body style="background-image:url(<?php echo BASE_URL . tpath(); ?>img/bg.jpg)">
        <?php if(superAdmin()) echo tpl('adminpanel'); ?>
        <header>
            <nav class="wrap" class="navbar navbar-inverse navbar-fixed-top">
                <?php echo navBtns();?>
                <div class="tmcn"><?php echo menu(); ?></div>
                <?php echo langs();  ?>
                <div class="tmcm"><?php echo menu(); ?></div>
            </nav>
        </header>

        <main>
            <div class="wrap">
                <h1><?php echo $title;?></h1>
                <div class="content">
                    <?php echo $content; ?>
                </div>
            </div>
            <footer>
                <div class="wrap">
                    &copy; <?php echo date('Y');?> <?php echo G('sitename');?> &nbsp;
                    <span class="right"> <?php echo T('Design');?> Maestro Studio</span>
                </div>
            </footer>
        </main>
	</body>
</html>
