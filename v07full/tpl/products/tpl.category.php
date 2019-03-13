<?php if(superAdmin()) { ?>
  <?php echo btns([[
				'text' => 'add',
				'icon' => 'fas fa-plus',
				'url' => BASE_URL.$class . '/add/' . $id
			]]); ?>
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
    
      <table>
        <tr>
          <td>
            <a href="<?php echo BASE_URL . 'products/view/' . $id;?>"><img class="img" src="<?php echo getImg('products', $id);?>" align=left></a>
          </td>
          <td>
            <a href="<?php echo BASE_URL . 'products/view/' . $id;?>"><h3><?php echo $name;?></h3></a>
            <p><?php echo unserialize($row['type'])[getlang()];?><br>
              <span class="price"><?php if(!empty($row['price'])) { echo "&euro;" . $row['price']; }?></span>
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
