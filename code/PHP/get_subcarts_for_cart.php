<?php require 'connect.php';

if (isset($_COOKIE['userID'])){
	$userID = $_COOKIE['userID'];

	$sql = "select subcarts.id, title, type, price, quantity, (price * quantity) as sum_subcart 
	from subcarts
	join items on item_id = items.id
	join types on type_id = types.id
	where cart_id =  get_or_create_cart($userID)";

	require 'query.php';
}
?>