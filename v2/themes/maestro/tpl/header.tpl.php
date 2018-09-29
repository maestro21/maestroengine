<v-toolbar dark fixed flat>
  <v-toolbar-items  class="hidden-sm-and-down">
    <v-btn flat @click.stop="drawer = !drawer" class="admin icon"><fa icon="fas fa-laptop"/></v-btn>
    <v-btn flat :href="'/'" class="home icon"><img src="<?php echo themeurl();?>img/logo.png"></v-btn>
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
        <?php $lang = getlang();?>
        <img src="<?php echo UPLOAD_URL;?>langs/<?php echo $lang['abbr'];?>.png" align="absmiddle"><?php echo $lang['name'];?> &darr;
      </v-btn>
      <v-list  class="langs">
        <?php $langs = langs(); foreach($langs as $lang) { ?>
          <v-list-tile @click=""><v-list-tile-title><img src="<?php echo UPLOAD_URL;?>langs/<?php echo $lang['abbr'];?>.png" align="absmiddle"><?php echo $lang['name'];?></v-list-tile-title></v-list-tile>
        <?php } ?>
      </v-list>
    </v-menu>
  </v-toolbar-items>
</v-toolbar>
