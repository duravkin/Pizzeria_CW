var itemsApp = new Vue({
	el: '#itemsApp',
	data:{
		types: '',
		items: '',
		newItem:{
			title: '',
			type_id: 0,
			price: '',
			image: '',
			description: '',
		},
		updateItem:{
			id: 0,
			title: '',
			type_id: '',
			price: '',
			image: '',
			description: '',
		},
	},
	methods:{
		GetTypes: function(){
			axios.get('PHP/get_types_list.php')
			.then(function(res){
				itemsApp.types = res.data
			})
		},

		GetItems: function(){
			axios.get('PHP/get_items_list.php')
			.then(function(res){
				itemsApp.items = res.data
			})
		},

		SetNullItem: function(){
			this.newItem.title = ''
			this.newItem.type_id = 0
			this.newItem.price = ''
			this.newItem.image = ''
			this.newItem.description = ''
		},

		GetUpdateItem: function(item){
			this.updateItem.id = item.id
			this.updateItem.title = item.title
			this.updateItem.type_id = item.type_id
			this.updateItem.price = item.price
			this.updateItem.image = item.image
			this.updateItem.description = item.description
		},
		
		AddItem: function(){
			axios.post('PHP/add_item.php', itemsApp.newItem)
			.then(function(res){
				itemsApp.GetItems()
				itemsApp.SetNullItem()
			})
			
		},

		DeleteItem: function(id){
			if (confirm("Вы уверены, что хотите удалить?"))
			axios.get('PHP/delete_item.php?id=' + id)
			.then(function(res){
				itemsApp.GetItems()
			})
		},
		
		UpdateItem: function(){
			axios.post('PHP/update_item.php', itemsApp.updateItem)
			.then(function(res){
				itemsApp.GetItems()
				itemsApp.updateItem.id = 0
			})
		},

		Main: function(){
			this.GetTypes()
			this.GetItems()
		}
	}
})

itemsApp.Main()