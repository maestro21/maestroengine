<?php $m = M('feedback'); $m->add(); echo $m->parse();?>


<?php foreach($data as $message) {
    if(!$message['visible'] && !superAdmin()) continue;
    $id = $message['id']; unset($message['id']);
    ?> 
    <div class="message<?php if(!$message['visible']) echo ' invisible';?>">    
        <hr>
        <div class="date"><?php echo fDateTime($message['sent']);?> <?php if(superAdmin()) echo btns($buttons['table'], $id);?></div>
        <div><?php echo $message['text'];?></div>
        <div>&mdash; <?php echo $message['name']; ?> </div> 
    </div>
<?php } ?>
