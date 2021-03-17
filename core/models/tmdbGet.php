<?php
  $key = "11bff7e96c4e8ec266c7fbd8607606ca";

  $url = "https://api.themoviedb.org/3/".$type."/".$film_id."?"."api_key=".$key."&language=ru-RU";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  $response = curl_exec($ch);
  $data = json_decode($response, true);
  curl_close($ch);

  $image = "https://image.tmdb.org/t/p/w600_and_h900_bestv2/".$data['poster_path'];