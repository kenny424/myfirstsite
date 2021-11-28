<select name="id_genre">
		<?php foreach ($genre as $item): ?>
		<option value="<? echo $item['id_genre'];?>"><?php echo $item['genre_name'];?></option>
		<?php endforeach;?>
	</select>



$sql=$pdo->query('SELECT table_name FROM information_schema.tables where table_schema='compclub';');
$i = 0;
$genre = array();
while ($row = $sql->fetch()) {
$genre[$i]['id_genre'] = $row['id_genre'];
$genre[$i]['genre_name'] = $row['genre_name'];
$i++;
}