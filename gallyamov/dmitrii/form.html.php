<?php include_once ('helpers.inc.php'); ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?php htmlout($pageTitle); ?></title>
</head>
<body>
<h1><?php htmlout($pageTitle); ?></h1>
<form action="?<?php htmlout($action); ?>" method="POST">
    <div>
        <label for="Name_Add">Название: <input type="text" name="Name_Add" id="Name_Add" value="<?php htmlout($Name_Add);?>"></label>
    </div>
    <div>
        <label for="Description">Описание: <input type="text" name="Description" id="Description" value="<?php htmlout($Description);?>"></label>
    </div>
    <div>
        <label for="price">Цена: <input type="text" name="price" id="price" value="<?php htmlout($price);?>"></label>
    </div>
    <div>
        <input type="hidden" name="id" value="<?php htmlout($id);?>">
        <input type="submit" value="<?php htmlout($button);?>">
    </div>
</form>
</body>
</html>