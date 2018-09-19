<v-navigation-drawer
  v-model="drawer"
  temporary
  floating
  app
>
<v-toolbar flat class="transparent">
  <v-list class="pa-0">
    <v-list-tile avatar>
      <v-list-tile-avatar>
        <img src="https://randomuser.me/api/portraits/men/85.jpg">
      </v-list-tile-avatar>

      <v-list-tile-content>
        <v-list-tile-title>Sergei Popov</v-list-tile-title>
      </v-list-tile-content>
      <v-list-tile-action>
        <fa icon="fas fa-sign-out-alt" />
      </v-list-tile-action>
    </v-list-tile>
  </v-list>
</v-toolbar>
  <hr>
  <h1><i class="caesar">M</i></h1>
  <div class="center">Maestro Engine X<br>
  Administration Panel</div>
  <hr>
  <v-list dense class="cpmenu">
    <v-list-tile @click=""><v-list-tile-content>
      <v-list-tile-title>Languages</v-list-tile-title></v-list-tile-content>
    </v-list-tile>
    <v-list-tile @click=""><v-list-tile-content>
    <v-list-tile-title>  Settings</v-list-tile-title></v-list-tile-content>
    </v-list-tile>
  </v-list>
</v-navigation-drawer>
