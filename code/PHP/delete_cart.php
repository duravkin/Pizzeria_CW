<?php

$id = $_GET['id'];

$sql = "delete from carts where id = $id";

require 'query.php';
