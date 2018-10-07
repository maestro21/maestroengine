<?php if(data('wrap')) echo "<wrap>";?>
  <?php if(data('breadcrumb')) echo '<breadcrumbs items=' . json(data('breadcrumb')) . '>'; ?>
  <h1><?php echo data('title');?></h1>
  <?php //if(data('buttons')) echo tpl('buttons', [ 'buttons' => data('buttons')]); ?>
  <?php echo $content;?>
<?php if(data('wrap'))  echo "</wrap>"; ?>
