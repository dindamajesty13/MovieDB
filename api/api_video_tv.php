<?php


$ctv = curl_init();
curl_setopt($ctv, CURLOPT_URL, "http://api.themoviedb.org/3/tv/".$tv_id."/videos?api_key=" . $api_key);
curl_setopt($ctv, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ctv, CURLOPT_HEADER, FALSE);
curl_setopt($ctv, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response17 = curl_exec($ctv);
curl_close($ctv);
$id_video_tv = json_decode($response17);
?>
