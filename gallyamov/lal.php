  <?php 
  if($login =='admin')
    { 
      echo '<h2 class="y"><a href="mmain(admin).php">Успеваемость</a></h2>';
    }
    else
    {
      echo '<h2 class="y"><a href="mmain.php">Успеваемость</a></h2>';
    }
    ?>
      <?php 
  if($login =='admin')
    { 
      echo '<h2 class="es1"><a href="dis(admin).php">Дисциплина</a></h2>';
    }
    else
    {
      echo '<h2 class="es1"><a href="dis.php">Дисциплина</a></h2>';
    }
    ?>
    <?php
   $sql = "SELECT * FROM disp";
   $result = $pdo->query($sql); 
   echo "<table border=1 width=600 height=200>";
   echo "<td align=center>Номер</td>
   <td align=center>Фамилия</td>
  <td align=center>Дисциплина</td>
  <td align=center>Аудитория</td>";
   while ($row = $result->fetch())
   {
       $pole1=$row[0];
       $pole2=$row[1];
       $pole3=$row[2];
       $pole4=$row[3];
       echo "<tr><td>$pole1</td><td>$pole2</td><td>$pole3</td><td>$pole4</td></tr>";
   }
   echo "</table>";
?>

<form method="post" action="admin.php" >
  <label for="id">Введите номер:</label><br />
  <input id="id" name="id" type="text" size="30" /><br />
  <input type="submit" name="Remove" value="Удалить" />
</form>