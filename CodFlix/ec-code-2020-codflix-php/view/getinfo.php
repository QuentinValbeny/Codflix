<?php

$key = "0912a7966c27b25ddc987f88847cdf97";
$movieId= '553';
$json = file_get_contents("https://api.themoviedb.org/3/movie/$movieId?api_key=$key");

$result = json_decode($json, true);

$poster_path = $result["poster_path"];
$gender = $result["genres"][0]["name"];
$title = $result["original_title"];
$release = $result["release_date"];
$vote_count = $result["vote_count"];
var_dump($gender);
var_dump($title);
var_dump($release);
var_dump('nbVote: '.$vote_count);
echo $gender . 'ICI';
echo "<img src=\"https://image.tmdb.org/t/p/w500$poster_path\">";