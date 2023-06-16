<?php require 'connect.php';

$id = $_GET['id'];

$sql = "delete from users where id = $id";

require 'query.php';