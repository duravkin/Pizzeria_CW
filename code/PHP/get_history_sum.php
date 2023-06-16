<?php require 'connect.php';

if (isset($_COOKIE['userID'])){
	$userID = $_COOKIE['userID'];

	$sql = "select carts.id, date_order, coalesce(sum(price * quantity), 0) as cart_sum
	from subcarts
	join items on item_id = items.id
	join carts on cart_id = carts.id
	where status = 1 and user_id = $userID
	group by carts.id, date_order";

	require 'query.php';
}
?>