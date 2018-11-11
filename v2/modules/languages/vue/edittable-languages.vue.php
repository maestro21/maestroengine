<!-- edittable-languages -->
<script type="text/x-template" id="edittable-languages">
  <div>
   <edittable 
        v-bind:items=this.titems
        v-bind:headers=this.theaders
        :newitem=this.newitem
        v-bind:formfields=this.tformfields
        v-bind:decode=this.tdecode
        :endpoint=this.tendpoint
        formid=this.tformid
        >
        <template slot="buttons">
            <m-dialog
                btntext="Add predefined language"
                title="Add predefined language">
                    <template slot="content">
                        <m-select
                            :options="this.tprelanglist"
                            v-model="this.tprelang"
                            name="prelang"
                            id="prelang"
                        ></m-select>
                    </template>
                    <template slot="buttons">
                        <v-btn @click="addPredefinedLanguage()">Add</v-btn>
                    </template>
            </m-dialog>  
        </template>
    </edittable>
  </div>
</script>
<script>
Vue.component('edittable-languages', {
  props: [ 'items', 'headers', 'newitem', 'formfields', 'endpoint', 'formid', 'decode', 'prelanglist'],
  template: '#edittable-languages', 
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
	},
    methods: {
        addPredefinedLanguage() {
            this.tprelang = $('#prelang input[name=prelang]').val();
            for(lang of this.tprelanglist) {
                if(lang.value == this.tprelang) { 
                    this.items.push(
                        {
                            img: fileFromUrl(lang.img),
                            abbr: lang.value,
                            name: lang.text,
                        }
                    )
                }
            }
        }
    }
});
</script>
<!-- /edittable -->