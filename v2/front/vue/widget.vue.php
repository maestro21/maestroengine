
<!-- Widget -->
<script type="text/x-template" id="widget">

    <div v-if="widget.type === text">
        <v-text-field 
            label="widget.text"
            v-model="value"
        ></v-text-field>
    </div>
    
    <div v-else-if="widget.type === checkbox">
        <v-checkbox
            label="widget.text"
            v-model="value"
        ></v-checkbox>
    </div>  

</script>
<script>
Vue.component('widget', {
  props: ['widget' , 'value'],
  template: '#widget'
});
</script>
<!-- /Widget -->
