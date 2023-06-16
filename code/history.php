<?php require 'TEMPLATES/header.php';  ?>

<div id="historyApp" class="container">
	<h2 class="text-center">История</h2>
	<div v-if="history.length">
		<table class="table" v-for="sum in historySum">
			<tr>
				<th>Название</th>
				<th>Тип</th>
				<th>Цена</th>
				<th>Количество</th>
				<th>Сумма</th>
			</tr>
			<tr v-for="item in history" v-if="sum.id === item.cart_id">
				<td>{{item.title}}</td>
				<td>{{item.type}}</td>
				<td>{{item.price}}</td>
				<td>{{item.quantity}}</td>
				<td>{{item.sum_subcart}}</td>
			</tr>
			<tr>
				<th colspan="5">
					Сумма заказа: {{sum.cart_sum}}<br>
					Дата заказа: {{sum.date_order}}<br>
					<button class="btn btn-secondary" v-on:click="DeleteCart(sum.id)">Удалить запись</button>
				</th>
			</tr>
		</table>
	</div>
	<div v-else>
		<p><b>Заказов нет!</b></p>
	</div>


</div>

<script src="JS/history.js"></script>
