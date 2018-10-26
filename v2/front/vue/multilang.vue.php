<!-- Widget -->
<script type="text/x-template" id="multilang">
    <v-layout>
        <v-flex xs8>
            <template v-for="(lang) in langs">
            <v-text-field v-if='tlang === lang.abbr'
                :label="twidget.text + ' ' + lang.name"
                :name="'data[' + tindex + '][' + twidget.key + '][lang.abbr]'"            
                :value="value[lang.abbr]"
                ></v-text-field>
            </template>
        </v-flex>
        <v-flex xs2>
            <span class="langs">
            <v-select 
                item-value="abbr"
                item-text="name"
                :items="langs"
                v-model="tlang">
                <template slot="item"  slot-scope="data">
                    <img class="langicon" :src="'<?php echo UPLOAD_URL;?>langs/' + data.item.abbr + '.png'" align="absmiddle">
                </template>
                <template slot="selection"  slot-scope="data">
                    <img class="langicon" :src="'<?php echo UPLOAD_URL;?>langs/' + data.item.abbr + '.png'" align="absmiddle">
                </template>
            </v-select>
            </span>
        </v-flex>
    </v-layout>    
</script>
<script>
Vue.component('multilang', {
  props: ['lang' , 'widget', 'value', 'index'],
  template: '#multilang',
  data() {
      return {
          langs: <?php echo json(languages(false));?>,
          tlang: this.lang,
          twidget: this.widget,
          tvalue: this.value,
          tindex: this.index,
      }
  },
  mounted() {
      console.log(this.langs);
  }
});
</script>
<!-- /Widget -->
