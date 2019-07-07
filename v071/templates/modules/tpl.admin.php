<?php echo btn([
	'text' => T('reinstall'),
	'icon' => 'fas fa-sync',
	'class' => 'reinstall'
]);?>
<table>
<?php
$statuses = ['error','inactive','active'];
$statustexts = ['not installed','installed','activated'];
 foreach (@$data as $module){ ?>
     <tr>
	     <td>
            <td class="info">
                <h2><a href="<?php echo BASE_URL . $module['name'];?>"><?php echo $module['name'];?></a></h2>
                <?php echo $module['description']; ?>
            </td>
            <td>
                <span class="nobg-<?php echo $statuses[$module['status']];?>"><?php echo T($statustexts[$module['status']]);?></span>
            </td>
            <td>
                <?php switch($module['status']) {
                        //Not installed
                        case 0:?>
                            <a class="btn btn-active" href="javascript:changestatus('<?php echo $module['name'];?>', 1);"><?php echo T('Install');?></a>
                <?php  	break;

                        //Installed, not activated
                        case 1:?>
                            <a class="btn btn-ok" href="javascript:changestatus('<?php echo $module['name'];?>', 2);"><?php echo T('Activate');?></a>
                            <a class="btn btn-del" href="javascript:changestatus('<?php echo $module['name'];?>', 0);"><?php echo T('Uninstall');?></a>
                <?php	break;

                        case 2: ?>
                            <a class="btn" href="javascript:changestatus('<?php echo $module['name'];?>', 1);"><?php echo T('Deactivate');?></a>
                            <a class="btn btn-del" href="javascript:changestatus('<?php echo $module['name'];?>', 0);"><?php echo T('Uninstall');?></a>
                <?php  } ?>
            </td>
         </td>
     </tr>
<?php } ?>
</table>
<script>

function changestatus(module, status_id) {
	$.get('<?php echo BASE_URL;?>modules/changestatus/' + module + '?ajax=1&status=' + status_id)
		.done(function() {
			window.location.reload(0);	
	});
}


$(function() {
	$('.reinstall').click(function(){
		toastr.info('<?php echo T('reinstalling');?>');
		$.get('<?php echo BASE_URL;?>modules/reinstall')
			.done(function() {
				toastr.success('<?php echo T('reinstalled');?>');
				window.location.reload(3000);	
		});
	});
});

</script>
