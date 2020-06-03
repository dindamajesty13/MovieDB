<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
  include "conf/info.php";
  $title="Welcome to";
  include_once "header.php";
?>
<center>
  <br>
  <h1>~ Top Rate Movies ~</h1>
  <br>
</center>
<hr>
<!--perintah untuk menampilkan data API-->
<center>
    <?php
    include_once "api/api_toprated.php";
    $arr = $toprated->results;
    $chunks = array_chunk($arr, 4);
    echo '<table border="0" width="500">';
    foreach ($chunks as $chunk) {
      echo '<tr height="600">';

      foreach ($chunk as $p) {

        echo '<td ><a href="movie.php?id=' . $p->id . '"><img src="http://image.tmdb.org/t/p/w300' . $p->poster_path . '"><h4>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4><h5><em>Rate : " . $p->vote_average . " |  Vote : " . $p->vote_count . "</em></h5></a></h4>";
      }
      echo '</tr>';
    }
    echo '</table>';
    ?>
</center>
<?php
  include_once "footer.php";
?>
</body>
</html>
