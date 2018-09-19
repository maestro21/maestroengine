<?php
  echo include_dir(FRONT_PATH . 'vue/');
?>

<script>
new Vue({
el: '#app',
iconfont: 'fa',
data: () => ({
  drawer: false,
model: null,
items: [
   { 'text': 'Home' },
   { 'text': 'Products'},
   { 'text': 'Vodka'}
]
})
})
</script>
