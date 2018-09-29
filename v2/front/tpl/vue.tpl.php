<?php
  echo include_dir(FRONT_PATH . 'vue/');
?>

<script>
new Vue({
el: '#app',
iconfont: 'fa',
data: () => ({
  drawer: false
  })
})
</script>
