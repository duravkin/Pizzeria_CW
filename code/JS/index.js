function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^| )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^]*)"
  ))
  return matches ? decodeURIComponent(matches[1]) : undefined
}

var mainApp = new Vue({
	el: '#mainApp',
	data:{
		typesList: '',
		itemsList: '',
		usersList: '',
		userID: '',
		cart: {},
	},
	methods:{
		GetTypes: function(){
			axios.get('PHP/get_types_list.php')
			.then(function(res){
				mainApp.typesList = res.data
			})
		},

		GetItems: function(){
			axios.get('PHP/get_items_list.php')
			.then(function(res){
				mainApp.itemsList = res.data
			})
		},

		GetSubcarts: function(){
			axios.get('PHP/get_subcarts_list.php')
			.then(function(res){
				mainApp.cart = res.data
			})
		},

		GetUsers: function(){
			axios.get('PHP/get_users_list.php')
			.then(function(res){
				mainApp.usersList = res.data
			})
		},

		SetCookieUserID: function(){
			document.cookie = 'userID=' + this.userID
			this.GetSubcarts()
		},

		UpdateCount: function(id, mode){
			if (this.userID){
				if(mode) {
					if (!(id in this.cart)) this.cart[id] = 0
					this.cart[id]++
				}
				else this.cart[id]--
				this.$forceUpdate() // Обновление компонента.
				axios.get('PHP/add_item_in_subcart.php?id=' + id + '&c=' + this.cart[id])
			}
			else alert("Выберете, пожалуйста, пользователя или создайте нового.")
		},

		Main: function(){
			this.GetTypes()
			this.GetItems()
			this.GetUsers()
			this.userID = getCookie('userID')
			if (this.userID) {
				this.GetSubcarts()
			}
		}
	}
})

mainApp.Main()


