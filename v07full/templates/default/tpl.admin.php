
<?php echo btns($buttons['admin']);
?>
<table cellpadding=0 cellspacing=0>
	<thead>
	<tr>
		<td>
		<a href="<?php echo BASE_URL.$class;?>filter/sort_<?php echo $class;?>/<?php echo 'id_'.getFilterState($class,'id');?>">id</a><?php echo filterImg($class,'id');?>
		</td>
		<?php foreach ($fields as $k=>$v){  if(@$v['hide'] || @$v['notInTable']) continue; ?>
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
		foreach($fields as $field => $f){  if(@$f['hide'] || @$f['notInTable']) continue;
			$k = $field; $v = $row[$field]; 
			echo "<td>".fType($v, $f[1], @$options[$k])."</td>";
		}?>
		<td width=150>
			<?php echo btns($buttons['table'], $id);?>
		</td>
		</tr>
	<?php } ?>
</table>
