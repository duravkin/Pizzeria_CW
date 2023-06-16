<?php require 'connect.php';

$json = file_get_contents('php://input');
$d = json_decode($json);

$sql = "update items set title = '$d->title', type_id = $d->type_id, price = $d->price, image = '$d->image', description = '$d->description' where id = $d->id";

require 'query.php';