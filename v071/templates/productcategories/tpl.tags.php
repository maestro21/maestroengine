<div id="tagCanvasContainer">
  <canvas width="1000" height="300" id="tagCanvas">
    <ul>
      <?php foreach($data as $row) {
        for($i = 0; $i < 10; $i++) { $id = $row['id'];?>
           <li>
             <a href="<?php echo BASE_URL . 'products/category/' .$id;?>">
               <img class="logo"src="<?php echo getImg('productcategories/logo', $id);?>">
             </a>
           </li>
        <?php }
      }?>
    </ul>
  </canvas>
</div>
<div id="tags">
  <ul>
    <?php foreach($data as $row) {
     $id = $row['id'];?>
         <li>
           <a href="<?php echo BASE_URL . 'products/category/' .$id;?>">
             <img class="logo"src="<?php echo getImg('productcategories/logo', $id);?>">
           </a>
         </li>
      <?php
    }?>
  </ul>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    if(!$('#tagCanvas').tagcanvas({
      textColour: '#ff0000',
      outlineColour: '#ffffff',
      reverse: true,
      depth: 0.8,
      maxSpeed: 0.05,
      shape: 'vcylinder'
    },'tags')) {
      // something went wrong, hide the canvas container
      $('#tagCanvasContainer').hide();
    }
  });
  TagCanvas.Start('tagcanvas2','ptTags', {
    shape: 'vcylinder'
  });
</script>
