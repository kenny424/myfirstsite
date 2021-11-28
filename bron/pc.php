<?php
session_start();
include '../helpfiles/session.php';
include'../database/connect_db.php';
include '../database/connect_db.php';
try
    {
        $sql='select categories,proc,dimm,monitor,graphics,keyboard,mouse from pc INNER JOIN amenities on pc.id=amenities.id_pc INNER JOIN place on amenities.id=place.id_amen INNER JOIN booking on place.id=booking.id_place INNER JOIN customer on customer.id=booking.id_cust WHERE logg="'.$logg.'"';
        $rsl=$pdo->query($sql);
    }
    catch (PDOException $e)
    {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
        include '../helpfiles/error.html.php';
        exit();
    }
     while ($row = $rsl->fetch())
    {
        $conf[]=array(
            'id' => $row['id'],
            'categories' =>$row['categories'],
            'proc' =>$row['proc'],
            'dimm' =>$row['dimm'],
            'monitor' =>$row['monitor'],
            'graphics' =>$row['graphics'],
            'keyboard' =>$row['keyboard'],
            'mouse' =>$row['mouse'],
        );
    }
?>
<?php if(isset($_POST['actions']) && $_POST['place']=='1'):?>
<br>
 <table border="1">
            <tr>
                <th>Категория</th>
                <th>Процессор</th>
                <th>Оперативная память</th>
                <th>Монитор</th>
                <th>Видеокарта</th>
                <th>Клавиатура</th>
                <th>Мышка</th>
            </tr>
            <?php foreach($conf as $bk): ?>
              <tr>
                  <td><?php echo htmlout($bk['categories']); ?></td>
                  <td><?php echo htmlout($bk['proc']);?></td>
                  <td><?php echo htmlout($bk['dimm']);?></td>
                  <td><?php echo htmlout($bk['monitor']);?></td>
                  <td><?php echo htmlout($bk['graphics']);?></td>
                  <td><?php echo htmlout($bk['keyboard']);?></td>
                  <td><?php echo htmlout($bk['mouse']);?></td>             
        </tr>
    <?php endforeach; ?>
</table>
<?php endif;?>