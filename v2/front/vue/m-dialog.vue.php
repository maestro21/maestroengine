<!-- Maestro Dialog -->
<script type="text/x-template" id="m-dialog">
    <v-dialog  max-width="500px">
        <v-btn slot="activator" color="primary" dark class="mb-2">{{ this.btntext }}</v-btn>
        <v-card>
          <v-card-title>
            <span class="headline">{{ this.title }}</span>
          </v-card-title>
          <v-card-text>
            <v-container grid-list-md>
              <v-layout wrap>
                <slot name="content"></slot>
              </v-layout>
            </v-container>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <slot name="buttons"></slot>
          </v-card-actions>
        </v-card>
    </v-dialog>
</script>
<script>
Vue.component('m-dialog', {
    props: ['title', 'btntext'],
    template: '#m-dialog'
});
</script>
<!-- /Maestro Dialog -->