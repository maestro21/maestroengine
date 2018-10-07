<!DOCTYPE html>
<html>
  <head>
    <?php echo tpl('head');?>
  </head>
  <body>
    <div id="app">
      <v-app dark>
        <?php echo tpl('controlpanel');?>
        <?php echo tpl('header');?>
        <v-content>
            <?php echo tpl('page', ['content' =>$content]);?>
        </v-content>
        <?php echo tpl('footer');?>
     </div>
     <?php echo tpl('vue');?>
  </body>
</html>
