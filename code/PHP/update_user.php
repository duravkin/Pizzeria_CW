<?php require 'connect.php';

$json = file_get_contents('php://input');
$d = json_decode($json);

$sql = "update users set surname = '$d->surname', name = '$d->name', city = '$d->city', street = '$d->street', home = '$d->home' where id = $d->id";

require 'query.php';