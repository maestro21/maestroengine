<aside class="adminpanel">
    <div>
        <img src="<?php echo BASE_URL . tpath(); ?>img/logo.png" height=50><br>
        Maestro Engine X<br>
        <b><?php echo T('Control Panel');?></b>        
    </div>        
    <div>
        Administrator <i class="fas fa-sign-out-alt logout"></i>
    </div>    

    <div class="nopadding">
        <b>Modules</b>
        <?php $modules = cache('modules');
        if($modules) {?>
            <ul>
                <?php foreach($modules as $module) {
                   // if($module['name'] == 'modules') continue;
                    if($module['status'] > 1) {?>
                    <li><a href="<?php echo BASE_URL . $module['name'];?>/admin"><?php echo T($module['name']);?></a></li>
                <?php }
                }?>
            </ul>
        <?php } ?>
    </div>

</aside>
