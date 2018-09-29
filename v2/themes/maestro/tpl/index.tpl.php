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
          <wrap>
            <?php echo $content;?>
          </wrap>  
        </v-content>
        <?php echo tpl('footer');?>
     </div>
     <?php echo tpl('vue');?>
  </body>
</html>
