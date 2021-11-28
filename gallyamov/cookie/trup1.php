<?php
    session_start();
?><html>
<head>
    <meta charset="utf-8">
    <title>Session</title></head>
<body>
    <form method="post">
        <input type="text" name="val" value="<?php echo isset($_POST['val']) ? $_POST['val'] : '' ?>">
        <input type="submit" value="Отправить" />
    </form>
    <?php
        if (isset($_POST['val']))
        {
            $_SESSION['val'] = $_POST['val'];
        }
        var_dump($_SESSION);
    ?>
</body>
</html>
