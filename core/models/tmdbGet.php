<?php
  $key = "11bff7e96c4e8ec266c7fbd8607606ca";
  $url = "https://api.themoviedb.org/3/".$type."/".$film_id."?"."api_key=".$key."&language=ru-RU";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  $response = curl_exec($ch);
  if (!$response) die("<p class=\"internet-connection-problem\" style=\"font-size: 16pt;width: 100%;text-align: center;\">Проверьте свое интернет-соединение</p>");
  $data = json_decode($response, true);
  $image = "https://image.tmdb.org/t/p/w600_and_h900_bestv2/".$data['poster_path'];

  if ($type == 'movie') {
    $url = "https://api.themoviedb.org/3/" . $type . "/" . $film_id . "/release_dates?" . "api_key=" . $key . "&language=ru-RU";
  } else {
    $url = "https://api.themoviedb.org/3/" . $type . "/" . $film_id . "/content_ratings?" . "api_key=" . $key . "&language=ru-RU";
  }
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  $response = curl_exec($ch);
  $data2 = json_decode($response, true);
  curl_close($ch);

  if ($type == 'movie') {
    $age = $data2['results'][find('RU', $data2['results'], 'iso_3166_1')]['release_dates'][0]['certification'];
  } else {
    $age = $data2['results'][find('RU', $data2['results'], 'iso_3166_1')]['rating'];
  }

  if (strlen($age)<2) $age = '?';