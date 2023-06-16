<?php require 'connect.php';

$id = $_GET['id'];

$sql = "delete from items where id = $id";

require 'query.php';