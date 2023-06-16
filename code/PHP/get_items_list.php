<?php 

$sql = "select items.id as id, title, type, type_id, price, image, description from items join types on type_id = types.id";

require 'query.php';