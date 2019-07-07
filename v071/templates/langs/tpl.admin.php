<?php echo btns($buttons['admin']) .
    popupbtn('addDefLangDialog', T('add deflang'), ['icon' => 'fas fa-plus' ]) .
    popup('addDefLangDialog',
        h3(T('add exisiting lang')) .
        drawForm(['deflangs' => [ 'string', WIDGET_SELECT]], $data, $options) .
        btn(['id' => 'addLang', 'text' => T('add')])
    ); ?>
);?>

<table cellpadding=0 cellspacing=0>
	<thead>
	<tr>
		<td>
		<a href="<?php echo BASE_URL.$class;?>filter/sort_<?php echo $class;?>/<?php echo 'id_'.getFilterState($class,'id');?>">id</a><?php echo filterImg($class,'id');?>
		</td>
		<?php foreach ($fields as $k=>$v){  if(@$v['hide']) continue;?>
			<td><a href="<?php echo BASE_URL.$class;?>filter/sort_<?php echo $class;?>/<?php echo $k.'_'.getFilterState($class,$k);?>"><?php echo T($k);?></a><?php echo filterImg($class,$k);?></td>
		<?php }?>
		<td><?php echo T('options');?></td>
	</tr>
	</thead>
	<?php  foreach (@$data as $row){
		$id = $row['id']; unset($row['id']); ?>
		<tr>
		<td>
			<a href="<?php echo BASE_URL.$class;?>/view/<?php echo $id;?>" target="_blank">#<?php echo $id;?></a>
		</td>
		<?php
		foreach($fields as $field => $f){   if(@$f['hide']) continue;
			$k = $field; $v = $row[$field];
			if($field == 'flag') {
					echo "<td>";
					if(file_exists(BASE_PATH . 'front/img/langs/' . $row['abbr'] . '.png'))
						echo '<img class="flag" src="' . BASE_URL . 'front/img/langs/' . $row['abbr']. '.png">';
					echo "</td>";
				} else {
					echo "<td>".fType($v, $f[1], @$options[$k])."</td>";
				}
		}?>
		<td class="rowBtns">
			<?php echo btns($buttons['table'], $id);?>
		</td>
		</tr>
	<?php } ?>
</table>
<script>
$( document ).ready(function() {
	$('#showAddLangDialog').click(function() {
		$('#addLangDialog').toggleClass('hidden');
	});

	$('#addLang').click(function() {
		$.post('<?php echo BASE_URL.$class;?>/adddeflang',
		 {
			lang: $('#deflangs option:selected').val()
		}).done(function() {
			window.location.reload();
		});
	});
});


</script>