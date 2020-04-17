<?php $mainColor = 'black';?>
<?php $mainColor2 = 'white';?>

html, body {
    margin: 0;
    padding: 0;
    font-family: 'Arial';
}


body {
    background-color: lightgray;

    header {
        width: 100%;
        position:fixed;
        height: 50px;
        background-color: <?php echo $mainColor;?>;

        .logo img {
            height: 50px;
        }
    }

    .wrap {
        width: 1200px;
        margin: 0 auto;
    }

    main {
        padding-top: 70px;
    }

    footer {
        background-color: <?php echo $mainColor;?>;
        width: 100%;
        bottom: 0;
        position: fixed;
        color: <?php echo $mainColor2;?>;
        padding: 10px;
    }
}