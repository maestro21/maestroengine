
<!-- Widget -->
<script type="text/x-template" id="widget">

    <div v-if="twidget.type === '<?php echo WIDGET_STRING;?>'">
        <v-text-field 
            :label="twidget.text"
            v-model="tvalue"
        ></v-text-field>
    </div>
    
    <div v-else-if="twidget.type === '<?php echo WIDGET_CHECKBOX;?>'">
        <v-checkbox
            :label="twidget.text"
            v-model="tvalue"
        ></v-checkbox>
    </div>  

</script>
<script>
Vue.component('widget', {
  props: ['widget' , 'value'],
  template: '#widget',
  data() {
      return {
          twidget: this.widget,
          tvalue: this.value
      }
  }
});
</script>
<!-- /Widget -->
