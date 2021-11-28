if (isset($_POST['config']) and $_POST['config']==1)
{
    	include'../database/connect_db.php';
    	try
   		{
        $sql='select amenities.categories as am,pc.proc as prc,pc.dimm as dmm,pc.monitor as mntr from pc INNER JOIN amenities on pc.id=amenities.id_pc INNER JOIN place on amenities.id=place.id_amen INNER JOIN booking on place.id=booking.id_place INNER JOIN customer on customer.id=booking.id_cust WHERE logg="'.$logg.'"';
        $result = $pdo->query($sql);
    	}
    	catch(PDOException $e)
    	{
        $error='Ошибка при извлечении данных';
        include'error.html.php';
        exit();
   		}
   		while ($row = $result1->fetch())
        {
         $confi[]=array(
             $id=>$row['id'],
             $am =>$row['am'],
             $prc =>$row['prc'],
             $dmm =>$row['dmm'],
             $mntr =>$row['mntr']
         );
         echo "<table border='1'>";
         echo "<tr>";
         echo "<th>Категория</th>";
         echo "<th>Процессор</th>";
         echo "<th>ОЗУ</th>";
         echo "<th>Монитор</th>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>".$am."</td>";
         echo "<td>".$prc."</td>";
         echo "<td>".$dmm."</td>";
         echo "<td>".$mntr."</td>";
         echo "</tr>";
         echo "</table>";
         }
}