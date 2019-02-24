<?php if(@$data['subpages']) {  ?>
	<div class='submenu'>
		<ul>
		<?php
			foreach($data['subpages'] as $page) {
				$_path = BASE_URL . $page['fullurl'];
				$text = $page['name'];
				$_selected = ($page['fullurl'] == $data['fullurl'] ? ' class="selected"': '');
				echo "<li><a href='$_path'$_selected>$text</a>";
		 } ?>
		</ul>
	</div>
<?php } ?>
<?php echo parse_tags($data['content']);?>
