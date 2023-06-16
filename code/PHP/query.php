<?php require 'connect.php';

$result = mysqli_query($connection, $sql);

if (gettype($result) == 'boolean'){
	echo $result;
}
else {
	$data = array();
	foreach ($result as $row){
		$data[] = $row;
	}
	echo json_encode($data);
}
