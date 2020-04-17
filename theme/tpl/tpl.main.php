<!DOCTYPE HTML>
<html>
<?php echo
    thead([
        'title' => 'Demo Template'
    ]) .
    tbody(
        adminpanel() .
            theader() .
            tmain(
                wrap(
                    h1($title) .
                     $content
                ) .
                tfooter()
            )
    );
?>
</html>
