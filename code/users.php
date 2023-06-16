<?php require 'TEMPLATES/header.php';  ?>

<div id="usersApp" class="container row">
	<h2>Редактирование пользователей</h2>
	<table class="table">
		<tr>
			<th>Фамилия</th>
			<th>Имя</th>
			<th>Город</th>
			<th>Улица</th>
			<th>Дом</th>
			<th colspan="2">Действие</th>
		</tr>
		<tr v-for="user in users" v-if="updateUser.id !== user.id ">
			<td>{{user.surname}}</td>
			<td>{{user.name}}</td>
			<td>{{user.city}}</td>
			<td>{{user.street}}</td>
			<td>{{user.home}}</td>
			<td><button class="btn btn-secondary" v-on:click="GetUpdateUser(user)">Изменить</button></td>
			<td><button class="btn btn-secondary" v-on:click="DeleteUser(user.id)">Удалить</button></td>
		</tr>
		<tr v-else>
			<td><input type="text" placeholder="Фамилия" v-model="updateUser.surname"></td>
			<td><input type="text" placeholder="Имя" v-model="updateUser.name"></td>
			<td><input type="text" placeholder="Город" v-model="updateUser.city"></td>
			<td><input type="text" placeholder="Улица" v-model="updateUser.street"></td>
			<td><input type="text" placeholder="Дом" v-model="updateUser.home"></td>
			<td><button class="btn btn-secondary" v-on:click="UpdateUser()">Обновить</button></td>
			<td><button class="btn btn-secondary" v-on:click="updateUser.id = 0">Отменить</button></td>
		</tr>
		<tr>
			<th><input type="text" placeholder="Фамилия" v-model="newUser.surname"></th>
			<th><input type="text" placeholder="Имя" v-model="newUser.name"></th>
			<th><input type="text" placeholder="Город" v-model="newUser.city"></th>
			<th><input type="text" placeholder="Улица" v-model="newUser.street"></th>
			<th><input type="text" placeholder="Дом" v-model="newUser.home"></th>
			<th colspan="2"><button class="btn btn-secondary" v-on:click="AddUser">Добавить</button></th>
		</tr>
	</table>
</div>

<script src="JS/users.js"></script>
