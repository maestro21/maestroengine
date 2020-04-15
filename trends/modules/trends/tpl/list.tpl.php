<a href="<?php echo BASE_URL;?>trends/markasread" target="_blank">Mark all as read</a>

<div class="news">
    <?php
    //Print all the entries
    /** @var TrendsModel $entry */
    foreach($data as $entry){
        ?>
        <div>
            <div>
                <img src="<?= $entry->getPicture() ?>">
            </div>
            <div>
                <h2><?php if($entry->isNew()) echo "<b>NEW!</b> ";?><a href="<?= $entry->getLink(); ?>" target="_blank"><?= $entry->getName(); ?></a> </h2>
                <a href="https://www.google.com/search?q=<?= $entry->getName; ?>" target="_blank">Google</a>
                <b><?= $entry->getTraffic();?></b><br> <i><span title="<?=$entry->getTime()->getDateTime();?>">
                        <?=$entry->getTime()->setTimezone("MST")->getDateTime();?></span></i>
                <ol>
                    <?php
                     /** @var TrendNewsModel $item */
                    foreach($entry->getNews() as $item) { ?>
                        <li><a href="<?php echo $item->getUrl() ;?>" target="_blank"><?php echo $item->getTitle();?></a> | <?=$item->getSource();?><br>
                            <?= $item->getText() ?>
                        </li>
                    <?php } ?>
                </ol>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<style>
    .news > div {
        border: 1px grey solid;
        margin: 20px;
        padding: 20px;
        display: flex;
    }

    .news > div > div {
        padding: 10px;
    }

    .news > div h2 {
        display: inline-block;
        margin: 0;
    }

    body {
        font-family: Arial;
    }

    a {
        color: forestgreen;
    }

</style>
