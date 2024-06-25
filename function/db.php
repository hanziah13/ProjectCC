<?php
function connect_DB()
{
  $conn = new mysqli('localhost', 'root', '', 'db_clothing');
  return $conn;
}

$conn = connect_DB();
