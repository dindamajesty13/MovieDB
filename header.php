<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="searching.php" method="get">
		<input type="text" name="search" placeholder="Type Title Here">
		<select name="channel" id="inlineFormCustomSelect" required>
			<option value="movie">Movie</option>
			<option value="tv">Tv Series</option>
		</select>
		<button type="submit">Cari</button
	</form>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="popular.php">Popular Movies</a></li>
		<li><a href="now.php">Now Playing Movies</a></li>
		<li><a href="upcoming.php">Upcoming Movies</a></li>
		<li><a href="tv_series.php">TV SERIES</a></li>
	</ul>
</body>
</html>
