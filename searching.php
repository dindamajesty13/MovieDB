<?php
$keywords = $_GET['search'];
$channel = $_GET['channel'];
$search = $keywords;
include_once "conf/info.php";
$name = 'Result Search | ' . $keywords;
include_once "header.php";
include_once "api/api_search.php";
?>
<h3>Result Search: <em><?php echo $keywords ?></em></h3>
<hr>
<ul>
	<?php
	if ($channel == "movie") {
		foreach ($searching->results as $result) {
			$name 		= $result->title;
			$id 		= $result->id;
			$release	= $result->release_date;
			if (!empty($release) && !is_null($release)) {
				$tempyear 	= explode("-", $release);
				$year 		= $tempyear[0];
				if (!is_null($year)) {
					$name = $name . ' (' . $year . ')';
				}
			}
			$poster 	= $result->backdrop_path;
			if (empty($poster) && is_null($poster)) {
				$poster =  dirname($_SERVER['PHP_SELF']) . '/image/no-image.webp';
			} else {
				$poster = 'http://image.tmdb.org/t/p/w300' . $poster;
			}
			echo '<li><a href="movie.php?id=' . $id . '"><img src="' . $poster . '"><h4>' . $name . '</h4></a></li>';
		}
	} elseif ($channel == "tv") {
		foreach ($search->results as $result) {
			$name 		= $result->original_name;
			$id 		= $result->id;
			$release	= $result->first_air_date;
			if (!empty($release) && !is_null($release)) {
				$tempyear 	= explode("-", $release);
				$year 		= $tempyear[0];
				if (!is_null($year)) {
					$name = $name . ' (' . $year . ')';
				}
			}
			$poster 	= $result->backdrop_path;
			if (empty($poster) && is_null($poster)) {
				$poster =  dirname($_SERVER['PHP_SELF']) . '/image/no-image.webp';
			} else {
				$poster = 'http://image.tmdb.org/t/p/w300' . $poster;
			}
			echo '<li><a href="tvshow.php?id=' . $id . '"><img src="' . $poster . '"><h4>' . $name . '</h4></a></li>';
		}
	}
	?>
</ul>
<?php
include_once('footer.php');
?>
