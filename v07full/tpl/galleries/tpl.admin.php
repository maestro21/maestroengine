<?php if(superAdmin()) { ?>
  <?php echo btns($buttons['admin']); ?>
<?php } ?>

<div class="gallery">
<?php
foreach($data as $row) {
  $id = $row['id'];
  $name = unserialize($row['name'])[getlang()]; ?>
  <div class="img" style="background-image:url('<?php echo getImg('galleries', $id);?>');">
      <?php if(superAdmin()) { ?>
        <p class='admBtns'>
          <a href="<?php echo BASE_URL.$class;?>/edit/<?php echo $id;?>" target="_blank" class="fa-pencil fa icon icon_sml"></a>
          <a href="javascript:void(0)" onclick="conf('<?php echo BASE_URL.$class;?>/del/<?php echo $id;?>', '<?php echo T('del conf');?>')" class="fa-trash-o fa icon icon_sml"></a>
        </p>
      <?php } ?>
      <a href="<?php echo BASE_URL . 'galleries/view/' . $row['id'];?>">
        <h3><p><?php echo $name;?></p></h3>
      </a>
  </div>
<?php } ?>
</div>
