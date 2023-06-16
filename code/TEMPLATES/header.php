<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Пиццерия</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/style.css">
	<script src="https://cdn.jsdelivr.net/npm/vue@2.7.8/dist/vue.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
</head>
<body>
	<nav class="container-fluid row align-items-center fs-5 fixed-top">
		<div class="col">
			<img src="IMG/pizza-svgrepo-com.svg" alt="Pizza">
			<a href="index.php">Главная</a>
			<a href="history.php">История заказов</a>
			<a href="users.php">Пользователи</a>
			<a href="items.php">Товары</a>
		</div>
		<div id="selectUserApp" class="col-2 text-end">
			<select class="form-select" v-model="userID" v-on:change="SetCookieUserID">
				<option disabled value="0">Выберете пользователя:</option>
				<option v-for="user in usersList" :value="user.id">{{user.surname}}</option>
			</select>
		</div>
		<script src="JS/selectUser.js"></script>
		<div class="col-1 text-end">
			<a href="cart.php" class="btn btn-light">Корзина</a>
		</div>
	</nav>