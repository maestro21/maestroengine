<v-toolbar dark fixed flat>
  <v-toolbar-items  class="hidden-sm-and-down">
    <v-btn flat @click.stop="drawer = !drawer" class="admin icon"><fa icon="fas fa-laptop"/></v-btn>
    <v-btn flat :href="'/'" class="home icon"><img src="logo.png"></v-btn>
    <v-btn flat :href="'about'">About</v-btn>
    <v-btn flat :href="'about'">Products</v-btn>
    <v-btn flat :href="'about'">Company</v-btn>
    <v-btn flat :href="'about'">Test</v-btn>
    <v-btn flat :href="'about'">Test2</v-btn>
  </v-toolbar-items>
  <v-spacer></v-spacer>
  <v-toolbar-items  class="hidden-sm-and-down">
    <v-menu open-on-hover offset-y  class="langs">
      <v-btn flat
        slot="activator"
      >
        <img src="langs/en.png" align="absmiddle"> English &darr;
      </v-btn>
      <v-list  class="langs">
        <v-list-tile @click=""><v-list-tile-title><img src="langs/de.png" align="absmiddle">Deutsch</v-list-tile-title></v-list-tile>
        <v-list-tile @click=""><v-list-tile-title><img src="langs/fr.png" align="absmiddle">Francais</v-list-tile-title></v-list-tile>
        <v-list-tile @click=""><v-list-tile-title><img src="langs/it.png" align="absmiddle">Italiano</v-list-tile-title></v-list-tile>
        <v-list-tile @click=""><v-list-tile-title><img src="langs/ru.png" align="absmiddle">Русский</v-list-tile-title></v-list-tile>
      </v-list>
    </v-menu>
  </v-toolbar-items>
</v-toolbar>
