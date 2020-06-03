<?php


$cti = curl_init();
curl_setopt($cti, CURLOPT_URL, "http://api.themoviedb.org/3/tv/".$tv_id."?api_key=" . $api_key);
curl_setopt($cti, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($cti, CURLOPT_HEADER, FALSE);
curl_setopt($cti, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response14 = curl_exec($cti);
curl_close($cti);
$tv_id = json_decode($response14);

$cti3 = curl_init();
curl_setopt($cti3, CURLOPT_URL, "http://api.themoviedb.org/3/tv/".$tv_id."/similar?api_key=" . $api_key);
curl_setopt($cti3, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($cti3, CURLOPT_HEADER, FALSE);
curl_setopt($cti3, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response16 = curl_exec($cti3);
curl_close($cti3);
$id_similar_tv = json_decode($response16);

?>
