<?php $M = M('i18n');  ?>
<form method="POST" id="form" class="i18nform" action="<?php echo BASE_URL . $class;?>/save?ajax=1" novalidate="novalidate">
	<div class="center">
		<div class="btn submit"><i class="fas fa-save"></i><?php echo T('save');?></div>
	</div>

	<?php $langs = getLangs();
	if(count($langs) > 3) { ?>
		<div class="tabHeaders">
			<?php foreach ($langs as $lang) { ?>
					<a data-tab='<?php echo $lang['abbr'];?>' class="tab"><?php echo $lang['abbr'];?></a>
			<?php } ?>
		</div>
		<div class="tabContent">
			<?php $langs = getLangs(); 
				foreach($langs as $lang) { ?>
				<div class="tab tab_<?php echo $lang['abbr'];?>">
					<p><?php echo $lang['name']; ?></p>
					<textarea name="form[fields][<?php echo $lang['abbr'];?>]" class="translations"><?php echo $data[$lang['abbr']];?></textarea>
				</div>
			<?php } ?>
		</div>
	<?php } else { ?>			
		<div class="table">
			<?php $langs = getLangs(); 
				foreach($langs as $lang) { ?>
				<div class="td">
					<p><?php echo $lang['name']; ?></p>
					<textarea name="form[fields][<?php echo $lang['abbr'];?>]" class="translations"><?php echo $data[$lang['abbr']];?></textarea>
				</div>
			<?php } ?>
		</div>
	<?php } ?>

	<div class="center">
		<div class="btn submit"><i class="fas fa-save"></i><?php echo T('save');?></div>
	</div>	
</form>

<script src="<?php echo BASE_URL;?>external/savectrls.js" type="text/javascript"></script>
