<?php require 'connect.php';

$json = file_get_contents('php://input');
$d = json_decode($json);

$sql = "insert into items (title, type_id, price, image, description) values('$d->title', $d->type_id, $d->price, '$d->image', '$d->description')";

require 'query.php';