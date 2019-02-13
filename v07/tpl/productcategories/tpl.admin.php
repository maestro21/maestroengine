<?php if(superAdmin()) { ?>
  <h1><a href="<?php echo BASE_URL.$class;?>/add" title="<?php echo T('add product category');?>"class="fa fa-plus icon" style="display: inline-block;"></a></h1>
  <hr>
<?php } ?>
<div class="productcategories">
<?php
foreach($data as $row) { $id = $row['id'];?>
  <div>
    <?php if(superAdmin()) { ?>
      <p class='admBtns'>
        <a href="<?php echo BASE_URL.$class;?>/edit/<?php echo $id;?>" target="_blank" class="fa-pencil fa icon icon_sml"></a>
        <a href="javascript:void(0)" onclick="conf('<?php echo BASE_URL.$class;?>/del/<?php echo $id;?>', '<?php echo T('del conf');?>')" class="fa-trash-o fa icon icon_sml"></a>
      </p><br>
    <?php } ?>
    <a href="<?php echo BASE_URL . 'products/category/' . $row['id'];?>">
      <img class="img" src="<?php echo getImg('productcategories/img', $id);?>"><br>
      <img class="logo"src="<?php echo getImg('productcategories/logo', $id);?>"><br>
    </a>
</div>
<?php } ?>
</div>
