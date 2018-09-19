<!DOCTYPE html>
<html>
  <head>
    <?php echo tpl('head');?>
  </head>
  <body>
    <div id="app">
      <v-app dark>
        <?php echo tpl('adminpanel');?>
        <?php echo tpl('header');?>
        <v-content>
          <?php echo $content;?>
        </v-content>
        <?php echo tpl('footer');?>
     </div>     
     <?php echo tpl('vue');?>
  </body>
</html>
