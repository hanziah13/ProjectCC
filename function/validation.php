<?php

function validate(array $data)
{
  global $_POST;
  $validated = [];

  foreach ($data as $key) {
    if (isset($_POST[$key]) && trim($_POST[$key]) != '') {
      $validated[$key] = htmlspecialchars($_POST[$key]);
    } else {
      return false;
    }
  }

  return $validated;
}
