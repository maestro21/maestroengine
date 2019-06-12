<div class="right langs">
    <ul class="dropdown">
        <li>
            <a href="#" class="curr_lang"></a>
            <ul>
            <?php $langs = getLangs();
            foreach ($langs as $lang)  {
                $abbr = $lang['abbr'];
                $url = (empty($lang['website']) ?  BASE_URL . $abbr : $lang['website'] . HOST_FOLDER);?>
                <li id="lang_<?php echo $abbr;?>">
                    <a href="<?php echo $url;?>">
                        <span class="lang_long"><img src="<?php echo IMG_URL . 'langs/' .$abbr . '.png';?>" align="absmiddle"  class="avatar"> <?php echo $lang['name'];?></span>
                        <span class="lang_short"><?php echo $abbr;?></span>
                    </a>
                </li>
                <?php if($abbr == getLang()) { ?>
                    <script>$('.curr_lang').html($('#lang_<?php echo $abbr;?> a').html());</script>
                <?php } ?>
            <?php } ?>
            </ul>
        </li>
    </ul>
</div>
