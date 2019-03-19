 <?php 
$img = getimg('posts',$id); 
if($img) { ?>
<img src="<?php echo $img;?>">
<?php } ?>
<div class="wrap">
<div class="info"> 
<?php echo fdatetime($data['updated']);?> 
    <div class="tags">
        <?php $tags = explode(' ', $data['tags']); 
        foreach($tags as $tag) { 
            $tag = str_replace('#', '', trim($tag)); ?>
            <a href="<?php echo BASE_URL . 'tag/' . $tag;?>">#<?php echo $tag;?></a>
        <?php }?>
    </div>
</div>
<div class="shorttext"><?php echo ftype($data['shorttext'], WIDGET_MARKDOWN);?></div>
<?php echo ftype($data['text'], WIDGET_MARKDOWN);?>
</div>