<?php
include '../database/connect_db.php';
try
    {
        $query = "SELECT id,proc, dimm, keyboard, monitor, graphics, mouse, headphones FROM pc";
        $sql = "SELECT id, categories, price,id_pc FROM amenities";
        $sql1= "SELECT id, dataforbooking,id_place, id_cust FROM booking";
        $sql2= "SELECT id, surname,nname, patronymic,phone,email FROM customer";
        $sql3= "SELECT id, surname,nname, patronymic,id_job,phone FROM employees";
        $sql4= "SELECT id, title,requirements, charge FROM job";
        $sql5= "SELECT id, id_amen,chair FROM place";
        $sql6= "SELECT * FROM console";
        $rsl=$pdo->query($sql);
        $rsl1=$pdo->query($sql1);
        $rsl2=$pdo->query($sql2);
        $rsl3=$pdo->query($sql3);
        $rsl4=$pdo->query($sql4);
        $rsl5=$pdo->query($sql5);
        $rsl6=$pdo->query($sql6);
        $result = $pdo->query($query);
        $countt=0;
    }
    catch (PDOException $e)
    {
        echo "Ошибка выполнения запроса: " . $e->getMessage();
        include '../helpfiles/error.html.php';
        exit();
    }
     while ($row = $result->fetch())
    {
        $conf[]=array(
            'id' => $row['id'],
            'proc' =>$row['proc'],
            'dimm' =>$row['dimm'],
            'monitor' =>$row['monitor'],
            'graphics' =>$row['graphics'],
            'keyboard' =>$row['keyboard'],
            'mouse' =>$row['mouse'],
            'headphones' =>$row['headphones']
        );
    }
    while ($row = $rsl->fetch())
    {
        $price[]=array(
            'id' => $row['id'],
            'categories' =>$row['categories'],
            'price' =>$row['price'],
            'id_pc'=>$row['id_pc']
        );
    }
    while ($row = $rsl1->fetch())
    {
        $book[]=array(
            'id' => $row['id'],
            'dataforbooking' =>$row['dataforbooking'],
            'id_place' =>$row['id_place'],
            'id_cust' =>$row['id_cust']
        );
    }
    while ($row = $rsl2->fetch())
    {
        $cust[]=array(
            'id' => $row['id'],
            'surname' =>$row['surname'],
            'nname' =>$row['nname'],
            'patronymic' =>$row['patronymic'],
            'phone' =>$row['phone'],
            'email' =>$row['email']
        );
    }
    while ($row = $rsl3->fetch())
    {
        $emp[]=array(
            'id' => $row['id'],
            'surname' =>$row['surname'],
            'nname' =>$row['nname'],
            'patronymic' =>$row['patronymic'],
            'phone' =>$row['phone'],
            'id_job' =>$row['id_job']
        );  
    }

    while ($row = $rsl4->fetch())
    {
        $job[]=array(
            'id' => $row['id'],
            'title' =>$row['title'],
            'requirements' =>$row['requirements'],
            'charge' =>$row['charge']
        );  
    }
    while ($row = $rsl5->fetch()) 
    {
    $place[]=array(    
            'id' => $row['id'],
            'id_amen' =>$row['id_amen'],
            'chair' =>$row['chair']
        );
    }
    while ($row = $rsl6->fetch())
    {
        $console[]=array(
            'id' => $row['id'],
            'nname' =>$row['nname'],
            'monitor' =>$row['monitor'],
            'gamepad' =>$row['gamepad'],
            'games' =>$row['games']
        );
    }
    ?>

<?php if(isset($_POST['action']) and $_POST['table_name']=='booking'):?>
 <table border="1">
            <tr>
                <th>Дата бронирования</th>
                <th>Номер места</th>
                <th>Номер пользователя</th>
            </tr>
            <?php foreach($book as $bk): ?>
              <tr>
                  <td><?php echo htmlout($bk['dataforbooking']); ?></td>
                  <td><?php echo htmlout($bk['id_place']);?></td>
                  <td><?php echo htmlout($bk['id_cust']);?></td>
                   <td>
                     <form action="?" method="POST"> 
                                      <div>
                                          <input type="hidden" name="id" value="<?php htmlout($bk['id']); ?>">
                                          <input type="submit" name="action" value="Редактировать">
                                          <input type="submit" name="action" value="Удалить">
                                      </div>
                                  </form>
                              </td>                           
        </tr>
    <?php endforeach; ?>
</table>
<?php endif;?>
<?php if(isset($_POST['action']) and $_POST['table_name']=='amenities'):?>
 <table border="1">
            <tr>
                <th>Название конфигурации</th>
                <th>Цена</th>
                <th>Номер компьютера</th>
            </tr>
            <?php foreach($price as $pri): ?>
              <tr>
                  <td><?php echo htmlout($pri['categories']); ?></td>
                  <td><?php echo htmlout($pri['price']);?></td>
                  <td><?php echo htmlout($pri['id_pc']);?></td>
                   <td>
                     <form action="?" method="POST"> 
                                      <div>
                                          <input type="hidden" name="id" value="<?php htmlout($pri['id']); ?>">
                                          <input type="submit" name="action" value="Редактировать">
                                          <input type="submit" name="action" value="Удалить">
                                      </div>
                                  </form>
                              </td>                           
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
<?php if(isset($_POST['action']) and $_POST['table_name']=='customer'):?>
 <table border="1">
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Телефон</th>
                <th>Email</th>
            </tr>
            <?php foreach($cust as $cst): ?>
              <tr>
                  <td><?php echo htmlout($cst['surname']); ?></td>
                  <td><?php echo htmlout($cst['nname']);?></td>
                  <td><?php echo htmlout($cst['patronymic']); ?></td>
                  <td><?php echo htmlout($cst['phone']);?></td>
                  <td><?php echo htmlout($cst['email']); ?></td>
                   <td>
                     <form action="?" method="POST"> 
                                      <div>
                                          <input type="hidden" name="id" value="<?php htmlout($cst['id']); ?>">
                                          <input type="submit" name="action" value="Редактировать">
                                          <input type="submit" name="action" value="Удалить">
                                      </div>
                                  </form>
                              </td>                           
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
<?php if(isset($_POST['action']) and $_POST['table_name']=='employees'):?>
 <table border="1">
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Телефон</th>
                <th>Номер должности</th>  
            </tr>
            <?php foreach($emp as $ep): ?>
              <tr>
                  <td><?php echo htmlout($ep['surname']); ?></td>
                  <td><?php echo htmlout($ep['nname']);?></td>
                  <td><?php echo htmlout($ep['patronymic']); ?></td>
                  <td><?php echo htmlout($ep['phone']);?></td>
                  <td><?php echo htmlout($ep['id_job']); ?></td>
                   <td>
                     <form action="?" method="POST"> 
                                      <div>
                                          <input type="hidden" name="id" value="<?php htmlout($ep['id']); ?>">
                                          <input type="submit" name="action" value="Редактировать">
                                          <input type="submit" name="action" value="Удалить">
                                      </div>
                                  </form>
                              </td>                           
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
<?php if(isset($_POST['action']) and $_POST['table_name']=='job'):?>
 <table border="1">
            <tr>
                <th>Название должности</th>
                <th>Требования</th>
                <th>Обязанности</th>
            </tr>
            <?php foreach($job as $jb): ?>
              <tr>
                  <td><?php echo htmlout($jb['title']); ?></td>
                  <td><?php echo htmlout($jb['requirements']);?></td>
                  <td><?php echo htmlout($jb['charge']); ?></td>
                   <td>
                     <form action="?" method="POST"> 
                                      <div>
                                          <input type="hidden" name="id" value="<?php htmlout($jb['id']); ?>">
                                          <input type="submit" name="action" value="Редактировать">
                                          <input type="submit" name="action" value="Удалить">
                                      </div>
                                  </form>
                              </td>                           
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
<?php if(isset($_POST['action']) and $_POST['table_name']=='pc'):?>
<table border="1">
            <tr>
                <th>Процессор</th>
                <th>Оперативная память</th>
                <th>Монитор</th>
                <th>Мышка</th>
                <th>Клавиатура</th>
                <th>Видеокарта</th>
                <th>Наушники</th>
            </tr>
            <?php foreach($conf as $pro): ?>
              <tr>
                  <td><?php echo htmlout($pro['proc']); ?></td>
                  <td><?php echo htmlout($pro['dimm']);?></td>
                  <td><?php echo htmlout($pro['monitor']); ?></td>
                  <td><?php echo htmlout($pro['mouse']); ?></td>
                  <td><?php echo htmlout($pro['keyboard']); ?></td>
                  <td><?php echo htmlout($pro['graphics']); ?></td>
                  <td><?php echo htmlout($pro['headphones']); ?></td>
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
<?php endif; ?>
<?php if(isset($_POST['action']) and $_POST['table_name']=='place'):?>
 <table border="1">
            <tr>
                <th>Номер конфигурации</th>
                <th>Кресло</th>
            </tr>
            <?php foreach($place as $plc): ?>
              <tr>
                  <td><?php echo htmlout($plc['id_amen']); ?></td>
                  <td><?php echo htmlout($plc['chair']);?></td>
                   <td>
                     <form action="?" method="POST"> 
                                      <div>
                                          <input type="hidden" name="id" value="<?php htmlout($plc['id']); ?>">
                                          <input type="submit" name="action" value="Редактировать">
                                          <input type="submit" name="action" value="Удалить">
                                      </div>
                                  </form>
                              </td>                           
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
<?php if(isset($_POST['action']) and $_POST['table_name']=='console'):?>
 <table border="1">
            <tr>
                <th>Название</th>
                <th>Монитор</th>
                <th>Геймпад</th>
                <th>Игры</th>
            </tr>
            <?php foreach($console as $cnsl): ?>
              <tr>
                  <td><?php echo htmlout($cnsl['nname']); ?></td>
                  <td><?php echo htmlout($cnsl['monitor']);?></td>
                  <td><?php echo htmlout($cnsl['gamepad']); ?></td>
                  <td><?php echo htmlout($cnsl['games']);?></td>
                   <td>
                     <form action="?" method="POST"> 
                                      <div>
                                          <input type="hidden" name="id" value="<?php htmlout($plc['id']); ?>">
                                          <input type="submit" name="action" value="Редактировать">
                                          <input type="submit" name="action" value="Удалить">
                                      </div>
                                  </form>
                              </td>                           
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>