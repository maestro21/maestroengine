<?php $M = M('i18n');  ?>
<form method="POST" id="form" class="i18nform" action="<?php echo BASE_URL . $class;?>/save?ajax=1" novalidate="novalidate">


		<div class="messages"></div>
		<div class="btn submit"><?php echo T('save');?></div>


	<div class="table">
		<?php $langs = getLangs(); 
			foreach($langs as $lang) { ?>
			<div class="td">
				<p><?php echo $lang['name']; ?></p>
				<textarea name="form[fields][<?php echo $lang['abbr'];?>]" class="translations"><?php echo $data[$lang['abbr']];?></textarea>
			</div>
		<?php } ?>
	</div>

		<div class="btn submit"><?php echo T('save');?></div>
		<div class="messages"></div>
		
</form>

<script src="<?php echo BASE_URL;?>external/savectrls.js" type="text/javascript"></script>
