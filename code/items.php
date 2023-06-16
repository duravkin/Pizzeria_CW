<?php require 'TEMPLATES/header.php';  ?>

<div id="itemsApp" class="container row">
	<h2>Редактирование товаров</h2>
	<table class="table">
		<tr>
			<th>Название</th>
			<th>Тип товара</th>
			<th>Цена</th>
			<th>Картинка</th>
			<th>Описание</th>
			<th colspan="2">Действие</th>
		</tr>
		<tr v-for="item in items" v-if="updateItem.id !== item.id ">
			<td>{{item.title}}</td>
			<td>{{item.type}}</td>
			<td>{{item.price}}</td>
			<td>{{item.image}}</td>
			<td><textarea readonly placeholder="Пустое описание" :value="item.description"></textarea></td>
			<td><button class="btn btn-secondary" v-on:click="GetUpdateItem(item)">Изменить</button></td>
			<td><button class="btn btn-secondary" v-on:click="DeleteItem(item.id)">Удалить</button></td>
		</tr>
		<tr v-else>
			<td><input type="text" placeholder="Название" v-model="updateItem.title"></td>
			<td>
				<select v-model="updateItem.type_id">
					<option v-for="type in types" :value="type.id">{{type.type}}</option>
				</select>
			</td>
			<td><input type="number" step="0.01" placeholder="Цена" v-model="updateItem.price"></td>
			<td><input type="text" placeholder="Картинка" v-model="updateItem.image"></td>
			<td><textarea placeholder="Описание" v-model="updateItem.description"></textarea></td>
			<td><button class="btn btn-secondary" v-on:click="UpdateItem()">Обновить</button></td>
			<td><button class="btn btn-secondary" v-on:click="updateItem.id = 0">Отменить</button></td>
		</tr>
		<tr>
			<th><input type="text" placeholder="Название" v-model="newItem.title"></th>
			<th>
				<select v-model="newItem.type_id">
					<option disabled value="0">Выберете:</option>
					<option v-for="type in types" :value="type.id">{{type.type}}</option>
				</select>
			</th>
			<th><input type="number" step="0.01" placeholder="Цена" v-model="newItem.price"></th>
			<th><input type="text" placeholder="Картинка" v-model="newItem.image"></th>
			<th><textarea placeholder="Описание" v-model="newItem.description"></textarea></th>
			<th colspan="2"><button class="btn btn-secondary" v-on:click="AddItem">Добавить</button></th>
		</tr>
	</table>
</div>

<script src="JS/items.js"></script>
