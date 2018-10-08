<!-- edittable -->
<script type="text/x-template" id="edittable">
  <div>
    <v-btn @click.native="add">Add</v-btn>
    <v-data-table
      v-bind:headers="theaders"
      v-bind:items="titems"
      hide-actions
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <td v-for="header in headers">
          <v-text-field v-model="props.item[header.value]"></v-text-field>
        </td>
      </template>
    </v-data-table>
  </div>
</script>
<script>
Vue.component('edittable', {
  props: [ 'items', 'headers', 'newitem'],
  template: '#edittable',
  methods: {
    add () {
      this.titems.push(this.tnewitem);
    }
   },
   data() {
		return {
			tnewitem: this.newitem,
			theaders: this.headers,
			titems: this.items,
		}
	}
});
</script>
<!-- /edittable -->