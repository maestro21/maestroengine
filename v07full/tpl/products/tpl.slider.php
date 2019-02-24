<h1><?php echo T('Products');?></h1>
  <div class="galproducts">
  <div class="gallery">
    <div class="prev"><img src="<?php echo BASE_PATH;?>img/larr.png"></div>
    <div class="items">
      <?php $i = 0; foreach($data as $item) { $i++;?>
        <div data-i="<?php echo BASE_URL . 'products/' . $i;?>">
          <a href="<?php echo $item['url'];?>" target="_blank">
            <img src="<?php echo BASE_PATH;?>img/bottles/<?php echo $i;?>.png?v=<?php echo $v;?>">
          </a>
        </div>
      <?php } ?>
      <div class="dots">
        <div class="prev"><img src="<?php echo BASE_PATH;?>img/larr.png"></div>
        <?php for($i = 1; $i<= $max; $i++)  { ?>
          <div class="dot" data-i="<?php echo $i;?>"></div>
        <?php } ?>
        <div class="next"><img src="<?php echo BASE_PATH;?>img/rarr.png"></div>
      </div>
    </div>
    <div class="next"><img src="<?php echo BASE_PATH;?>img/rarr.png"></div>
  </div>
</div>
