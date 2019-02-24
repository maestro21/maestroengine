<?php
  $description =   unserialize($data['description'])[getlang()];
 ?>
<div class="table product">
  <div class=tr>
    <div class=td style="width:150px">
      <img class="productimg" src="<?php echo getImg('products', $id);?>" align=left>
    </div>
    <div class="td productinfo">
      <p><?php echo unserialize($data['type'])[getlang()];?></p>
      <p><?php echo $description;?></p>
      <p><?php if(!empty($data['alchohol'])) { echo T('alch') . ': ' . str_replace('Vol','', $data['alchohol']) . ' Vol'; }?><br>
        <?php if(!empty($data['size'])) { echo '℮ ' . $data['size']  . ' ml'; }?>
      </p>
    </div>
  </div>
</div>
