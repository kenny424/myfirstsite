<?php include_once ('helpers.inc.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>результат</title>
</head>
<body>
<h1>Доп услуга</h1>
<p><a href="?add">Добавьте новый товар</a></p>
<table>
    <tr>
        <th>Название</th>
        <th>Описание</th>
        <th>Цена</th>
    </tr>
    <?php foreach($prod as $pro): ?>
        <tr>
            <td><?php echo htmlout($pro['Name_Add']); ?></td>
            <td><?php echo htmlout($pro['Description']);?></td>
            <td><?php echo htmlout($pro['price']); ?></td>
            <td>
                <form action="?" method="POST">
                    <div>
                        <input type="hidden" name="id" value="<?php htmlout($pro['id']); ?>">
                        <input type="submit" name="action" value="Редактировать">
                        <input type="submit" name="action" value="Удалить">
                    </div>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>