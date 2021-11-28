<?php
setcookie ("_ws_","test",time()-3600,"/"); 
    if (isset($_POST['val']))
    {
        setcookie(
            'val',
            $_POST['val']
        );
    }
?><html>
<head>
    <title>Cookie</title>
    <meta charset="utf-8">
</head>
<body>
    <form method="post">
        <input type="text" name="val" value="<?php echo isset($_POST['val']) ? $_POST['val'] : '' ?>">
        <input type="submit" value="Отправить" />
    </form>
    <?php
        var_dump($_COOKIE);
    ?>
</body>
</html>
