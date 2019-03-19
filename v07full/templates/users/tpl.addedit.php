<?php $formid = $class . '_form_item_' . $id;?>
<form method="POST" id="form" action="<?php echo BASE_URL . $class;?>/save?ajax=1">
<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
	<div class="half half2">
		<table cellpadding=0 cellspacing=0>
			<tr>
				<td colspan=2>
					<form enctype="multipart/form-data" id="avatar_form" method="post">
						<input type="file" class="avatar_fupload">
					</form>					
					<div class="avatar"<?php echo getBgImg('avatars/' . $id);?>><div><i class="fas fa-upload"></i> <?php echo T('upload avatar');?></div>
					</div>
					<div class="avatar_sml"<?php echo getBgImg('avatars/' . $id . '_sml');?>></div>
				</td>
			</tr>
		<?php
			echo drawForm($fields, $data, $options, 'lang');
		?>
			<tr>
				<td colspan="2" align="center">
					<div class="btn submit"><?php echo T('submit');?></div>
					<div class="messages"></div>
				</td>
			</tr>
		</table>
	</div>
</form>

<script src="<?php echo BASE_URL;?>external/savectrls.js" type="text/javascript"></script>

<script>
$('.avatar').click(function() {
	$('.avatar_fupload').trigger('click');
});

$(".avatar_fupload").on('change', function(){
    var formData = new FormData();
	// HTML file input, chosen by user
	formData.append("img", this.files[0]);
	var request = new XMLHttpRequest();
	request.open("POST", "<?php echo BASE_URL;?>users/uploadavatar", true);
	request.send(formData);
	request.onreadystatechange = function() { 
		var response = jQuery.parseJSON(request.responseText);
		if(response.status == 'success' && response.img) {
			$('.avatar').css('background-image', 'url(' + response.img.img + ')');
			$('.avatar_sml').css('background-image', 'url(' + response.img.thumb + ')');
		}
	}
});

</script>