<?php if(superAdmin()) { ?>
  <h1><a href="<?php echo BASE_URL.$class;?>/add/<?php echo $id;?>" title="<?php echo T('add product');?>"class="fa fa-plus icon" style="display: inline-block;"></a></h1>
  <hr>
<?php } ?>
<div class="productlist">
<?php
$lang = getlang();
foreach($data as $row) {
  $id = $row['id'];
  $name = unserialize($row['name'])[$lang]; ?>
  <div class="products">
    <?php if(superAdmin()) { ?>
      <p class='admBtns'>
        <a href="<?php echo BASE_URL.$class;?>/edit/<?php echo $id;?>" target="_blank" class="fa-pencil fa icon icon_sml"></a>
        <a href="javascript:void(0)" onclick="conf('<?php echo BASE_URL.$class;?>/del/<?php echo $id;?>', '<?php echo T('del conf');?>')" class="fa-trash-o fa icon icon_sml"></a>
      </p><br>
    <?php } ?>
    <a href="<?php echo BASE_URL . 'products/view/' . $id;?>">
      <table>
        <tr>
          <td>
            <img class="img" src="<?php echo getImg('products', $id);?>" align=left>
          </td>
          <td>
            <h3><?php echo $name;?></h3>
            <p><?php echo unserialize($row['type'])[getlang()];?><br>
              <p><?php if(!empty($row['alchohol'])) { echo T('alch') . ': ' . str_replace('Vol','', $row['alchohol']) . ' Vol'; }?><br>
                <?php if(!empty($row['size'])) { echo '℮ ' . $row['size']  . ' ml'; }?>
            </p>
            <p>
              <div class="btn sml"><?php echo T('more');?> &rarr;</div>
            </p>
          </td>
        </tr>
      </table>
    </a>
</div>
<?php } ?>
</div>
