<form method="POST" id="form" action="<?php echo BASE_URL . $class;?>/savegroups/<?php echo $id;?>">
	<?php echo drawForm($fields, $data); ?>
    <div>
        <div class="btn submit"><?php echo T('save');?></div>	
        </div>
</form>
