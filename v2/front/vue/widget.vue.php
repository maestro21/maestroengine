
<!-- Widget -->
<script type="text/x-template" id="widget">

    <div v-if="twidget.type === '<?php echo WIDGET_STRING;?>'">
        <v-text-field 
            :label="twidget.text"
            :name="'data[' + tindex + '][' + twidget.key + ']'"            
            :value="value"
        ></v-text-field>
    </div>
    
    <div v-else-if="twidget.type === '<?php echo WIDGET_CHECKBOX;?>'">
        <v-checkbox
            :label="twidget.text"
            :name="'data[' + tindex + '][' + twidget.key + ']'"           
            v-model="tvalue"
        ></v-checkbox>
    </div>  

</script>
<script>
Vue.component('widget', {
  props: ['widget' , 'value', 'index'],
  template: '#widget',
  data() {
      return {
          twidget: this.widget,
          tvalue: this.value,
          tindex: this.index,
      }
  }
});
</script>
<!-- /Widget -->
