<?php
  echo include_dir(FRONT_PATH . 'vue/');
?>

<script>
new Vue({
el: '#app',
data: () => ({
  drawer: false
  })
})
</script>
