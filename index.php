<?php
  $pdo = new PDO('sqlite:chinook.db');
  $sql = "
  	SELECT genres.Name,
  		   genres.GenreId
  	FROM genres
  ";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $names = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Assignment 1</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>Name</th>
		</tr>
		<?php foreach($names as $name) : ?>
			<tr>
				<td>
					<?php echo $name->GenreId ?>
				</td>
				<td>
					<a href="tracks.php?genre=<?php echo urlencode($name->Name) ?>"><?php echo $name->Name ?></a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>