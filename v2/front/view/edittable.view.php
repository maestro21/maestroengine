<edittable 
  v-bind:items=<?php echo json($data);?>
  v-bind:headers=<?php echo json($headers);?>
  v-bind:newItem=<?php echo json($newItem);?>
  v-bind:formfields=<?php echo json($form);?>
  endpoint='<?php echo $endpoint; ?>'
  formid='<?php echo uniqid();?>'
/>