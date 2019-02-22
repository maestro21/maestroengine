<?php echo btns($buttons['admin']);?>

<div id="addLangDialog" class="modal2 hidden"><!-- Remove this space between .modal and .modal-dialog
--><div class="modal-dialog2"><div class="fa fa-times icon icon-big modal-close"></div>
		<?php  echo drawForm(['deflangs' => [ 'string', WIDGET_SELECT_IMG]], $data, $options); ?>
		<div class="btn" id="addLang"><?php echo T('add');?></div>
	</div>
</div>

<table cellpadding=0 cellspacing=0>
	<thead>
	<tr>
		<td>
		<a href="<?php echo BASE_URL.$class;?>filter/sort_<?php echo $class;?>/<?php echo 'id_'.getFilterState($class,'id');?>">id</a><?php echo filterImg($class,'id');?>
		</td>
		<?php foreach ($fields as $k=>$v){ ?>
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
		foreach($fields as $field => $f){
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
		<td width=150>
			<a href="<?php echo BASE_URL.$class;?>/edit/<?php echo $id;?>" target="_blank" class="fa-pencil fa icon icon_sml"></a>
			<a href="javascript:void(0)" onclick="conf('<?php echo BASE_URL.$class;?>/del/<?php echo $id;?>', '<?php echo T('del conf');?>')" class="fa-trash-o fa icon icon_sml"></a>
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