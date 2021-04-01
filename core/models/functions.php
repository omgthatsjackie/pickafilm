<?php
  function find($needle, $haystack, $column){
    return array_search($needle, array_column($haystack, $column));
  }