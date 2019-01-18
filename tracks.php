<?php
  $pdo = new PDO('sqlite:chinook.db');
  $sGenre = urldecode($_GET["genre"]);
  $sql = "
  	SELECT
      tracks.Name AS TrackName,
      albums.Title AS AlbumTitle,
      artists.Name AS ArtistsName,
      tracks.UnitPrice AS UnitPrice
    FROM 
      tracks
    INNER JOIN
      genres
    ON 
      tracks.GenreId = genres.GenreId
    INNER JOIN
      albums
    ON
      tracks.AlbumId = albums.AlbumId
    INNER JOIN
      artists
    ON
      albums.ArtistId = artists.ArtistId
    WHERE
      genres.Name =
  ";
  $sql = $sql . "'" . $sGenre . "'";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $tracks = $statement->fetchAll(PDO::FETCH_OBJ);
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
      <th>Track Name</th>
      <th>Album Title</th>
      <th>Artist Name</th>
      <th>Unit Price</th>
    </tr>
    <?php foreach($tracks as $track) : ?>
      <tr>
        <td>
          <?php echo $track->TrackName ?>
        </td>
        <td>
          <?php echo $track->AlbumTitle ?>
        </td>
        <td>
          <?php echo $track->ArtistsName ?>
        </td>
        <td>
          <?php echo $track->UnitPrice ?>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
</body>
</html>