<?php


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/movie/" . $movie_id . "/videos?api_key=" . $api_key);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response = curl_exec($ch);
curl_close($ch);
$id_video_movie = json_decode($response);
