<tr>
		<td>
			<?php echo htmlspecialchars($pdo['surname'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['name'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['patronymic'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['age'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['gender'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['address'],ENT_QUOTES,'utf-8');?>
		</td>
		<td>
			<?php echo htmlspecialchars($pdo['phone'],ENT_QUOTES,'utf-8');?>
		</td>
	</tr>




	<tr>
			<td>
				<?php htmlout($pdo['surname']);?>
			</td>
			<td>
				<?php htmlout($pdo['name']);?>
			</td>
			<td>
				<?php htmlout($pdo['patronymic']);?>
			</td>
			<td>
				<?php htmlout($pdo['age']);?>
			</td>
			<td>
				<?php htmlout($pdo['gender']);?>
			</td>
			<td>
				<?php htmlout($pdo['address']);?>
			</td>
			<td>
				<?php htmlout($pdo['phone']);?>
			</td>
			<td>
			<form action="" method="POST">
				<div>
					<input type="hidden" name="id" value="<?php htmlout($pdo[id]);?>">
					<input type="submit" name="action" value="редактирование">
					<input type="submit" name="action" value="удалить">
				</div>
			</form>
			</td>
	</tr>