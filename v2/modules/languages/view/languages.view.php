<edittable-languages 
  v-bind:items=<?php echo json($data);?>
  v-bind:headers=<?php echo json($headers);?>
  v-bind:newItem=<?php echo json($newItem);?>
  v-bind:formfields=<?php echo json($form);?>
  v-bind:decode="<?php echo ($decode ? 'true' : 'false');?>"
  endpoint='<?php echo $endpoint; ?>'
  formid='<?php echo uniqid();?>'
  prelanglist='<?php echo json($prelanglist);?>'
/>
