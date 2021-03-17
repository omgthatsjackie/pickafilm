<?php
  $userid = $_SESSION['user']['id'];
  $searchLikes = mysqli_query($db, "SELECT * FROM `likes` WHERE `userid`='$userid'");
  while ($row = mysqli_fetch_assoc($searchLikes)){
    $type = $row['type'];
    $film_id = $row['contentid'];

    require "core/models/tmdbGet.php";


    $genres_count = count($data['genres']);
    $genres = "";
    for ($i = 0; $i < $genres_count; $i++) {
      if ($i != $genres_count - 1) {
        $genres .= ($data['genres'][$i]['name'] . ", ");
      } else {
        $genres .= $data['genres'][$i]['name'];
        $genres .= ".";
      }
    }

    if($type=="movie") $year = preg_split("/[-]+/",$data['release_date']);
    if($type=="tv") $year = preg_split("/[-]+/",$data['last_air_date']);

    if($type=="movie") $name = $data['title'];
    if($type=="tv") $name = $data['name'];

    echo "<a href=\"filmPage?id=$film_id&type=$type\" class=\"card\">\n";
    echo "<div class=\"poster\">\n";
    echo "<img loading=\"lazy\" src=\"$image\" alt=\"Film poster\">\n";
    echo "</div>\n";
    echo "<div class=\"info\">\n";
    echo "<h3 class=\"title\">".$name."</h3>\n";
    echo "<div class=\"film-labels\">\n";
    echo "<div class=\"certification item\">16+</div>\n";
    echo "<div class=\"release-year item\">".$year[0]."</div>\n";
    echo "<div class=\"genres item\">".ucwords($genres)."</div>\n";
    echo "</div>\n";
    echo "<div class=\"rating\">".$data['vote_average']."</div>\n";
    echo "</div>\n";
    echo "</a>\n";
  }
?>