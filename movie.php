<?php
include "conf/info.php";

$movie_id = $_GET['id'];
include_once "api/api_movie.php";
include_once "api/api_video_movie.php";
include_once "api/api_similar_movie.php";
$name = "Detail Movie (" . $id_movie->original_title . ")";
include_once "header.php";

?>
  <?php
  if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];
  ?>
    <h1><?php echo $id_movie->original_title ?></h1>

    <center>
      <?php

      foreach ($id_video_movie->results as $video) {
        echo '<iframe width="640" height="420" src="' . "https://www.youtube.com/embed/" . $video->key . '" frameborder="0" allowfullscreen></iframe>';
      }
      ?>

      <hr>
      <img src="<?php echo $imgurl_1 ?><?php echo $id_movie->backdrop_path ?>"></center>
    <br><br>
    <div class="static">
      <p>Title : <?php echo $id_movie->original_title ?></p>
      <p>Tagline : <?php echo $id_movie->tagline ?></p>
      <p>Genres :
        <?php
        foreach ($id_movie->genres as $gen) {
          echo '<span>' . $gen->name . '</span> ';
        }
        ?>
      </p>
      <p>Overview : <?php echo $id_movie->overview ?></p>
      <p>Release Date : <?php $rel = date('d F Y', strtotime($id_movie->release_date));
                        echo $rel ?></p>
      <p>Production Companies :
        <?php
        foreach ($id_movie->production_companies as $pc) {
          echo $pc->name . " ";
        }
        ?>
      </p>
      <p>Production Countries:
        <?php
        foreach ($id_movie->production_countries as $pco) {
          echo $pco->name . "&nbsp;&nbsp;";
        }
        ?>
      </p>
      <p>Budget: $ <?php echo $id_movie->budget ?> </p>
      <p>Vote Average : <?php echo $id_movie->vote_average ?></p>
      <p>Vote Count : <?php echo $id_movie->vote_count ?></p>

    </div>
    <hr>
    <h3>Similar Movies</h3>
    <ul>
      <center>
        <?php
        $arr = $id_sim_movie->results;
        $chunks = array_chunk($arr, 4);
        echo '<table border="0" width="500">';
        foreach ($chunks as $chunk) {
          echo '<tr width="5000">';

          foreach ($chunk as $p) {

            echo '<td><a href="movie.php?id=' . $p->id . '"><img src="http://image.tmdb.org/t/p/w300' . $p->poster_path . '"><h4>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4><h5><em>Rate : " . $p->vote_average . " |  Vote : " . $p->vote_count . "</em></h5></a></td>";
          }
          echo '</tr>';
        }
        echo '</table></center>';
        ?>
      </center>
    </ul>


  <?php
  } else {
    echo "<h5>Movie Not Found</h5>";
  }
  ?>

  <?php
  include_once "footer.php";
  ?>
