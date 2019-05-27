<ul class="dropdown topmenu">
    <?php foreach($menu as $link => $text) { ?>
        <li><a href="<?php echo BASE_URL . $lang . '/'. $link;?>">1.<?php echo $text;?></a>
            <ul>
                <?php foreach($menu as $l => $t) { ?>
                    <li><a href="<?php echo BASE_URL . $lang . '/'. $l;?>">2.<?php echo $t;?></a>
                        <ul>
                            <?php foreach($menu as $ll => $tt) { ?>
                                <li><a href="<?php echo BASE_URL . $lang . '/'. $ll;?>">3.<?php echo $tt;?></a>
                                    <ul>
                                        <?php foreach($menu as $lll => $ttt) { ?>
                                            <li><a href="<?php echo BASE_URL . $lang . '/'. $lll;?>">4.<?php echo $tt;?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
</ul>