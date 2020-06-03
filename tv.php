<?php
  $tv_id = $_GET['id'];
  include "conf/info.php";
  include_once "api/api_id_tv.php";
  include_once "api/api_video_tv.php";
  $name = "Watch TV (".$id_tv->original_name.")";
  include_once "header.php";
?>
    <?php
    if(isset($_GET['id'])){
      $tv_id = $_GET['id'];
      $rel = date('d F Y', strtotime($id_tv->last_air_date));
    ?>
    <h1><?php echo $id_tv->original_name ?></h1>
    <?php
      echo "<h5>~ <sub>Last Air Date</sub> : <span>".$rel."</span> ~</h5>";
    ?>

    <?php

      foreach($id_video_tv->results as $video){
                    echo '<iframe width="560" height="315" src="'."https://www.youtube.com/embed/".$video->key.'" frameborder="0" allowfullscreen></iframe>';
      }
     ?>"

    <hr>
    <img src="http://image.tmdb.org/t/p/w300<?php echo $id_tv->poster_path ?>" />
    <p>Title : <?php echo $id_tv->original_name ?></p>
    <p>Status : <?php echo $id_tv->status ?></p>
    <p>Genres :
              <?php
                foreach($id_tv->genres as $gen){
                  echo '<span>' . $gen->name . '</span> ';
                }
              ?>
    </p>
    <p>Overview : <?php echo $id_tv->overview ?></p>
    <p>First Air Date : <?php $rel = date('d F Y', strtotime($id_tv->first_air_date)); echo $rel ?></p>
    <p>Production Companies :
              <?php
                foreach($id_tv->production_companies as $pc){
                  echo $pc->name;
                }
              ?>
    </p>
    <p>Original Country :
              <?php
                foreach($id_tv->origin_country as $pco){
                  echo $pco. "&nbsp;&nbsp;" ;
                }
              ?>
    </p>
    <p>Created by :
              <?php
                foreach($id_tv->created_by as $pco){
                  echo $pco->name. "&nbsp;&nbsp;" ;
                }
              ?>
    </p>
    <p>Vote Average : <?php echo $id_tv->vote_average ?></p>
    <p>Vote Count : <?php echo $id_tv->vote_count ?></p>
    <hr>
    <h3>Similar TV Show</h3>
    <ul>
      <?php
        $count = 4;
        $output="";
        foreach($id_similar_tv->results as $similar){
          $output.='<li><a href="tvshow.php?id='.$similar->id.'"><img src="http://image.tmdb.org/t/p/w300'.$similar->backdrop_path.'"><h5>'.$similar->original_name.'</h5></a></li>';
          if($count <=0){
            break;
            $count--;
          }
        }
        echo $output;
      ?>
    </ul>


    <?php
    } else{
      echo "<h5>Movie tidak ditemukan.</h5>";
    }
    ?>

<?php
  include_once "footer.php";
?>
