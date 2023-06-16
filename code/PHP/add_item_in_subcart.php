<?php require 'connect.php';

$userID = $_COOKIE['userID'];
$id = $_GET['id'];
$c = $_GET['c'];

$sql = "call change_subcart($userID, $id, $c)";

require 'query.php';
