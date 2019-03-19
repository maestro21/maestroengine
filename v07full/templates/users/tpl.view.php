<?php $id = $data['id'];?>

<div class="avatar td"<?php echo getBgImg('avatars/' . $id);?>></div>
<div class="userdata td">
<p> <i class="fas fa-home"></i> Lives in <?php echo $data['country'];?>, <?php echo $data['city'];?></p>
<p><?php echo md($data['info']);?></p>

</div>