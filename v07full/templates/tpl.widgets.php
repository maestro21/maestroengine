<?php
var_dump($data);
switch($name) {
    case 'tabs': ?>
        <div class="tabheaders">
            <?php foreach($data as $tab) { ?>
                <a href="javascript:void" onclick="tab('<?php echo $tab;?>')"><?php echo T($tab);?></a>
            <?php } ?>
        </div>
    <?php


}