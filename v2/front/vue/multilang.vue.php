<!-- Widget -->
<script type="text/x-template" id="multilang">
    <v-layout>
        <v-flex xs11>
            <template v-for="(lang) in langs">
            <v-text-field v-show='tlang === lang.abbr'
                :label="twidget.text + ' ' + lang.name"
                :name="'data[' + tindex + '][' + twidget.key + '][' + lang.abbr + ']'"
                :value="getValue(lang.abbr)"
                ></v-text-field>
            </template>
        </v-flex>
        <v-flex xs1>
            <m-select 
                :items="langs"
                v-model="tlang"
                class="langselect">
            </m-select>
        </v-flex>
    </v-layout>
</script>
<script>
Vue.component('multilang', {
  props: ['lang' , 'widget', 'value', 'index'],
  template: '#multilang',
  data() {
      return {
          langs: <?php echo json(langselect());?>,
          tlang: this.lang,
          twidget: this.widget,
          tvalue: this.value,
          tindex: this.index,
      }
  },
  methods: {
    getValue(lang) {
        if(this.tvalue && lang in this.tvalue) {
            return this.tvalue[lang];
        }
        return '';
    }
  }
});
</script>
<!-- /Widget -->
<style>
.langselect .v-select-list {
    padding-left: 0;
}
.langselect .v-list {
    background:rgba(0,0,0,0.3) !important;
}
</style>
