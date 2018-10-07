<?php
inspect($headers);
inspect($newItem);
inspect($data); ?>

<!-- edittable -->
<script type="text/x-template" id="edittable">
  <div>
    <v-btn @click.native="add">Add</v-btn>
    <v-data-table
      :headers="headers"
      :items="data"
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
  template: '#edittable',
  methods: {
    add () {
      this.data.push(this.newitem);
	  console.log(this.data);
    }
   },
   data() {
		return {
			newitem: <?php php2js($newItem);?>,
			headers: <?php php2js($headers);?>,	
			data: <?php php2js($data);?>
		}
	  }
});
</script>