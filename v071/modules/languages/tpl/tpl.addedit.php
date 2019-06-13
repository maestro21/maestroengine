<?php $formid = $class . '_form_item_' . $id;?>
<form method="POST" id="form" action="<?php echo BASE_URL . $class;?>../../../index.php">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
	<table cellpadding=0 cellspacing=0>
	<?php
		echo drawForm($fields, $data, $options);
	?>
		<tr>
			<td colspan="2" align="center">
				<div class="btn submit"><?php echo T('save');?></div>
				<div class="messages"></div>
			</td>
		</tr>
	</table>
</form>

<script src="<?php echo BASE_URL;?>external/savectrls.js" type="text/javascript"></script>
<?php  if(file_exists(BASE_PATH . 'front/img/langs/' . $data['abbr'] . '.png')) { ?>
	<script>$('#flag').replaceWith('<img class="flag" src="<?php echo BASE_URL . 'front/img/langs/' . $data['abbr'] . '.png';?>">'+
	'<a href="javascript:void(0)" onclick="conf(\\'<?php echo BASE_URL.$class;?>/delflag/<?php echo  $data['abbr'];?>\\', \\'<?php echo T('del conf');?>\\')" class="fa-trash-o fa icon icon_sml"></a>');</script>
<?php } ?>
