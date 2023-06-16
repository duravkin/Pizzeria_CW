<?php require 'TEMPLATES/header.php';  ?>

<div id="mainApp">

<div class="container">
	<div v-for="type in typesList" class="row">
		<p class="h1 text-center">{{type.type}}</p>
		<div v-for="pizza in itemsList" v-if="pizza.type_id==type.id" class="col-3">	

			<div class="card">

			    <img v-if="pizza.image !== ''" class="card-img-top" :src="'IMG/' + pizza.image" alt="image.alt">
			    <img v-else class="card-img-top" src="IMG/template.png" alt="image.alt">

			    <div class="card-body">

					<h5 class="card-title">{{pizza.title}}</h5>
					<p class="card-text">{{pizza.price + '&nbsp₽'}}</p>
					<p class="card-text">{{pizza.description}}</p>
				</div>
				<div class="text-center bottom-align-text">
					<span v-if="cart[pizza.id] > 0">
						<button class="btn btn-secondary" v-on:click="UpdateCount(pizza.id, 0)">-</button>
						<span>Добавлено: {{cart[pizza.id]}}</span>
						<button class="btn btn-secondary" v-on:click="UpdateCount(pizza.id, 1)">+</button>
					</span>
					<span v-else>
						<button class="btn btn-secondary" style="width:100%;" v-on:click="UpdateCount(pizza.id, 1)">Добавить</button>
					</span>
				</div>
			  
			</div>
		</div>
	</div>
</div>
</div>
<script src="JS/index.js"></script>
<?php require 'TEMPLATES/footer.php';  ?>