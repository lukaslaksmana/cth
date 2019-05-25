<?php
require_once('./core/Model.php');
$query = new DBquery();

?>
<DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title> Input User</title>
</head>
<body>
	<h2> TAMBAH USER </h2>
	<table class="table table-dark">
			<tr>
			<form method="POST" action="add.php?action=addUsers">
				<td> Masukan Username </td>
				<td>
					<input name="addusers" type="text">
					<button type="submit" name="add" class="btn btn-secondary" value="Tambah">Tambah</button>
				</td>
			</form>
		</tr>
	</table>
	<h4> LIHAT USER & SKILL </h4>
	<table class="table table-dark">
		<tr>
			<th> Nama </th>
			<th> Skill </th>
			<th> Tambah Skill </th>
		</tr>
		<?php
			foreach($query->getUserSkills() as $row):
		?>
		<tr>
			<td> <?= $row['name'] ?> </td>
			<td> 
				<?php 
					if($row[1] == ".") {
						echo "Belum ditambahkan";
					} else {
						echo $row[1];
					}
				?> </td>
			<form method="POST" action="add.php?action=update">
				<td>
					<input name="id" type="hidden" value="<?= $row['id'] ?>">
					<input name="skill" type="text">
					<button type="submit" name="add" class="btn btn-secondary" value="Tambah">Tambah</button>
				</td>
			</form>
		</tr>
		<?php
			endforeach;
		?>

	</table>
</body>
</html>