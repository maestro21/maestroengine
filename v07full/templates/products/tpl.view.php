<?php
  $description =   unserialize($data['description'])[getlang()];
 ?>
<div class="table product">
  <div class=tr>
    <div class=td style="width:150px">
      <img src="<?php echo getImg('products', $id);?>" align=left>
    </div>
    <div class="td productinfo">
      <p><?php echo unserialize($data['type'])[getlang()];?></p>
      <p><?php echo $description;?></p>
      <p class="price"><?php if(!empty($data['price'])) { echo "&euro;" . $data['price']; }?></p>
    </div>
  </div>
</div>
