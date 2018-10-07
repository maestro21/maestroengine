
<!-- breadcrumbs -->
<script type="text/x-template" id="breadcrumbs">
    <v-breadcrumbs divider="&rarr;">
        <v-breadcrumbs-item
            v-for="item in items"
            :key="item.text"
            :disabled="item.disabled">
        {{ item.text }}
        </v-breadcrumbs-item>
    </v-breadcrumbs>
</script>
<script>
Vue.component('breadcrumbs', {
  props: ['items'],
  template: '#breadcrumbs'
});
</script>
<!-- /breadcrumbs -->
