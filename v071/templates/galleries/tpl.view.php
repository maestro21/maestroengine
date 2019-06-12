<?php if(superAdmin()) { ?>
	<h3><?php echo T('upload image');?></h3>
<form method="POST" id="form" action="<?php echo BASE_URL . $class;?>/uploadImage?ajax=1">
<input type="hidden" name="id"  value="<?php echo $id;?>">
	<table cellpadding=0 cellspacing=0>
	<?php
		echo drawForm([ 'img' => [ null, 'file', 'path' => 'galleries/' . $id]]);
	?>
		<tr>
			<td colspan="2" align="center">
				<div class="btn submit"><?php echo T('save');?></div>
				<div class="messages"></div>
			</td>
		</tr>
	</table>
</form>
<hr></hr>
<?php } ?>

<div class=gallery>
<?php $images = array_reverse($data['images']);
foreach($images as $img) { ?>
		<div class="img" style="background-image:url('<?php echo BASEFMURL . 'galleries/' . $id . '/' . $img['name'];?>');">
			<?php if(superAdmin()) { ?>
				<p class='admBtns'>
					<span href="javascript:void(0)" onclick="conf('<?php echo BASE_URL.$class;?>/delimg/<?php echo  $id . '/' . $img['name'];?>', '<?php echo T('del conf');?>')" class="fa-trash-o fa icon icon_sml"></span>
				</p>
			<?php } ?>
			<a href="<?php echo BASEFMURL . 'galleries/' . $id . '/' . $img['name'];?>" rel="shadowbox[gal]" class="noanim">
					<div></div>
			</a>
		</div>
<?php } ?>
</div>

<script>
Shadowbox.init();
</script>
