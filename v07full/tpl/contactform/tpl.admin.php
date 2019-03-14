<?php  foreach($data as $message) {  $id = $message['id']; unset($message['id']);
	 ?>
	<div class="message"> 
		<div><?php echo $message['name']; ?> <a href="mailto:<?php echo $message['email']; ?>">(<?php echo $message['email']; ?>)</a> <?php echo T('sent on') . ' ' . fDateTime($message['sent']);?> <?php echo btns($buttons['table'], $id);?></div>
        <div><?php echo $message['text'];?></div>
	</div> 
<?php } ?>