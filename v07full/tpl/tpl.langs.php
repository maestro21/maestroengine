	<?php $langs = getLangs();
?>
<div class="dropdownmenu langs">
<ul  class="topmenu">
<li><a href="#" class="curr_lang"></a>
	<ul>
	<?php $langs = getLangs();
	foreach ($langs as $lang)  {
		$abbr = $lang['abbr'];
		$url = (empty($lang['website']) ?  BASE_URL . $abbr : $lang['website'] . HOST_FOLDER);?>
		<li id="lang_<?php echo $abbr;?>">
			<a href="<?php echo $url;?>"><img src="<?php echo IMG_URL . 'langs/' .$abbr . '.png';?>" align="absmiddle"> 
				<span class="fullname"><?php echo $lang['name'];?></span>
				<span class="abbr"><?php echo $abbr;?></span>
			</a>
		<?php if($abbr == getLang()) { ?>
			<script>$('.curr_lang').html($('#lang_<?php echo $abbr;?> a').html());</script>
		<?php } ?>
	<?php } ?>
	</ul>
</ul>
</div>
