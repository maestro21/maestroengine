<!-- edittable-languages -->
<script type="text/x-template" id="edittable-languages">
  <div>
  <edittable 
        v-bind:items=this.titems
        v-bind:headers=this.theaders
        v-bind:newItem=this.tnewItem
        v-bind:formfields=this.tformfields
        v-bind:decode=this.tdecode
        endpoint=this.tendpoint
        formid=this.tformid
        >
        <template slot="buttons">
        <m-select
                :options="this.tprelanglist"
                v-model="tprelang"
                name="prelang"
            ></m-select>
        </template>
    </edittable>
  </div>
</script>
<script>
Vue.component('edittable-languages', {
  props: [ 'items', 'headers', 'newitem', 'formfields', 'endpoint', 'formid', 'decode', 'prelanglist'],
  template: '#edittable-languages',
  methods: {
    
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
            tprelang: 'en',
            tprelanglist: JSON.parse(this.prelanglist)
		}
	}
});
</script>
<!-- /edittable -->