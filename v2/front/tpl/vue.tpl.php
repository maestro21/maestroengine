<?php
  echo include_dir(FRONT_PATH . 'vue/');
  echo include_vues();
?>

<script>
new Vue({
el: '#app',
data: () => ({
  drawer: false
  })
})
</script>
