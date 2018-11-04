<!-- Widget -->
<script type="text/x-template" id="m-select">
    <v-autocomplete
        search-input
	    item-text="text"
	    item-value="value"
        :items="toptions"
        v-model="tvalue"
        @input="setValue"
        class="tclass">
        <template slot="item"  slot-scope="data">
            <img v-if="data.item.img" v-bind:src="data.item.img"> {{ clearSpace(data.item.text) }}
        </template>
        <template slot="selection"  slot-scope="data">
            <img v-if="data.item.img" v-bind:src="data.item.img"> {{ clearSpace(data.item.text) }}
            <input type="hidden" :name="tname" :value="data.item.value">
        </template>
    </v-autocomplete>
</script>
<script>
Vue.component('m-select', {
  props: ['options' , 'value', 'name', 'class' ],
  template: '#m-select',
  data() {
      return {
          toptions: this.options,
          tvalue: this.value,
          tname: this.name,
          tclass: this.class,
      }
  },
  methods: {
      setValue(value) {
          this.tvalue = value;
      },
      clearSpace(str) {
        return str.replace(/_/gi, ' ');
      }
  }
});
</script>
<!-- /Widget -->