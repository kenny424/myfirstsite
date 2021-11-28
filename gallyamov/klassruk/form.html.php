<?php include_once ('helpers.inc.php'); ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?php htmlout($pageTitle); ?></title>
</head>
<body>
<h1><?php htmlout($pageTitle); ?></h1>
<form action="?<?php htmlout($action); ?>" method="POST">
    <table border="1">
        <tr><td>
    <div>
        <label for="fam">Фамилия:</td><td> <input type="text" name="fam" id="fam" value="<?php htmlout($fam);?>"></label>
   </td></tr></div><tr><td>
    <div>
        <label for="disp">Дисциплина:</td><td> <input type="text" name="disp" id="disp" value="<?php htmlout($disp);?>"></label>
    </div></tr><td>
    <div>
        <label for="ots">Оценка: </td><td><input type="text" name="ots" id="ots" value="<?php htmlout($ots);?>"></label>
    </div></tr>
         </table>
    <div>
        <input type="hidden" name="id" value="<?php htmlout($id);?>">
        <input type="submit" value="<?php htmlout($button);?>">
    </div>
   
</form>
</body>
</html>