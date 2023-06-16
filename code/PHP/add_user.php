<?php require 'connect.php';

$json = file_get_contents('php://input');
$d = json_decode($json);

$sql = "insert into users (surname, name, city, street, home) values('$d->surname', '$d->name', '$d->city', '$d->street', '$d->home')";

require 'query.php';