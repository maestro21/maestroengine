<?php echo btns($buttons['admin']); ?>
<ol class="simple-list">
    <?php  foreach (@$data as $article){
        $id = $article['id'];
        $img = getimg('posts',$id); 
        ?>
        <li<?php if(!$article['active']) echo ' class=inactive';?>><div data-id='<?php echo $id;?>' class="article <?php echo ($img ? 'wraptext" style="background-image:url(\'' . $img . '\')"' : 'noimg');?>>
            <article>                  
                <h3><a href="<?php echo BASE_URL. 'posts/post/' . $id . '/' . $article['url'];?>"><?php echo $article['title'];?></a>
                <?php if(superAdmin()) { ?>
                    <a href="<?php echo BASE_URL.$class;?>/edit/<?php echo $id;?>" target="_blank" class="fa-pencil fa icon icon_sml"></a>
                    <a href="javascript:void(0)" onclick="conf('<?php echo BASE_URL.$class;?>/del/<?php echo $id;?>', '<?php echo T('del conf');?>')" class="fa-trash-o fa icon icon_sml"></a>
                <?php } ?>
                </h3>
                <?php echo $article['shorttext'];?>
            </article>            
        </div>
        </li>
    <?php } ?>
</ol> 
