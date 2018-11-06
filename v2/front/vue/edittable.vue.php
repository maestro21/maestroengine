<!-- edittable -->
<script type="text/x-template" id="edittable">
  <div>
    <v-btn @click.native="add">Add</v-btn>
    <slot name="buttons"></slot>
    <form :id="tformid">
    <v-data-table
      v-bind:headers="theaders"
      :items="titems"
      hide-actions
      disable-initial-sort
    >
      <template slot="items" slot-scope="props">
        <td v-for="(header) in headers" v-if="header.value != 'actions'">
          <!--<v-text-field v-model="props.item[header.value]"></v-text-field> -->
          <widget 
            :value="props.item[header.value]" 
            :lang="tlang" 
            :index="props.index" 
            :widget="getWidget(header.value)"
            :decode="tdecode" />
        </td>
        <td v-else>
          <v-btn icon class="mx-0" @click="del(props.item)">
            <fa icon="far fa-trash-alt" />
          </v-btn>
        </td>
      </template>
    </v-data-table>   
    </form> 
    <p class="text-md-center"><v-btn @click.native="save">save</v-btn></p>
  </div>
</script>
<script>
Vue.component('edittable', {
  props: [ 'items', 'headers', 'newitem', 'formfields', 'endpoint', 'formid', 'decode'],
  template: '#edittable',
  methods: {
    add () {
      this.titems.push(Vue.util.extend({},this.tnewitem));
    },
    del(item) { 
      const index = this.titems.indexOf(item);
      confirm('Are you sure you want to delete this item?') && this.titems.splice(index, 1)
    },
    save () {
      $.post(this.tendpoint,  $('#' + this.tformid).serialize() , handleResponse);
    },
    getWidget(key) {
      if(this.tformfields[key]) {
        return this.tformfields[key];
      }
      return null;
    }
  },
  data() { 
		return {
			tnewitem: this.newitem,
			theaders: this.headers,
      tformfields: this.formfields,
			titems: this.items,
      tendpoint: this.endpoint,
      tformid: this.formid,
      tdecode: this.decode,
      tlang: '<?php echo lang();?>'
		}
	}
});
</script>
<!-- /edittable -->