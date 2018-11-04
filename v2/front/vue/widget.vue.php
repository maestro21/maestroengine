
<!-- Widget -->
<script type="text/x-template" id="widget">

    <div v-if="twidget.type === '<?php echo WIDGET_STRING;?>'">
        <v-text-field 
            :label="twidget.text"
            :name="'data[' + tindex + '][' + twidget.key + ']'"            
            :value="value"
            :class="twidget.class"
        ></v-text-field>
    </div>
    
    <div v-else-if="twidget.type === '<?php echo WIDGET_CHECKBOX;?>'">
        <v-checkbox
            :label="twidget.text"
            :name="'data[' + tindex + '][' + twidget.key + ']'"           
            v-model="tvalue"
            :class="twidget.class"
        ></v-checkbox>
    </div>  

    <div v-else-if="twidget.type === '<?php echo WIDGET_MULTILANG;?>'">
        <multilang
            :widget="twidget"        
            v-bind:lang="tlang"
            :index="tindex"
            v-model="tvalue"
            :class="twidget.class"
        ></multilang>
    </div> 

    <div v-else-if="twidget.type === '<?php echo WIDGET_SELECT;?>'">
        <m-select
            :options="twidget.options"
            v-model="tvalue"
            :name="'data[' + tindex + '][' + twidget.key + ']'"
            :class="twidget.class"  
        ></m-select>
    </div> 

</script>
<script>
Vue.component('widget', {
  props: ['widget' , 'value', 'index', 'lang'],
  template: '#widget',
  data() {
      return {
          twidget: this.widget,
          tvalue: this.value,
          tindex: this.index,
          tlang: this.lang
      }
  }
});
</script>
<!-- /Widget -->
