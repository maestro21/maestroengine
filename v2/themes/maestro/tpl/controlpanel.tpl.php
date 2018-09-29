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
        <img src="<?php echo themeurl();?>img/logo.png">
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
  <h1><img src="<?php echo themeurl();?>img/logo.png"></h1>
  <div class="center">Maestro Engine X<br>
  Administration Panel</div>
  <hr>
  <v-list dense class="cpmenu">
    <?php $modules = ['settings']; ?>
    <?php foreach($modules as $module) { ?>
      <v-list-tile href="<?php echo BASE_URL . lang() . '/'. $module;?>"><v-list-tile-content>
        <v-list-tile-title><?php echo t($module);?></v-list-tile-title></v-list-tile-content>
      </v-list-tile>
    <?php } ?>
  </v-list>
</v-navigation-drawer>
