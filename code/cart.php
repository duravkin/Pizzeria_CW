<?php require 'TEMPLATES/header.php';  ?>

<div id="cartApp" class="container">
	<h2 class="text-center">Корзина</h2>
	<div v-if="cart_sum">
		<table class="table">
			<tr>
				<th>Название</th>
				<th>Тип</th>
				<th>Цена</th>
				<th>Количество</th>
				<th>Сумма</th>
			</tr>
			<tr v-for="item in cart">
				<td>{{item.title}}</td>
				<td>{{item.type}}</td>
				<td>{{item.price}}</td>
				<td>{{item.quantity}}</td>
				<td>{{item.sum_subcart}}</td>
			</tr>
			<tr>
				<th colspan="3"></th>
				<th>Сумма заказа:</th>
				<th>{{cart_sum}}</th>
			</tr>
		</table>
		<button class="btn btn-secondary buy" v-on:click="Buy">Купить!</button>
	</div>
	<div v-else>
		<p><b>Корзина пуста!</b></p>
	</div>

</div>

<script src="JS/cart.js"></script>
