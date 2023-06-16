function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^| )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^]*)"
  ))
  return matches ? decodeURIComponent(matches[1]) : undefined
}

var cartApp = new Vue({
	el: '#cartApp',
	data:{
		userID: '',
		cart: '',
		cart_sum: '',
	},
	methods:{
		GetSubcarts: function(){
			axios.get('PHP/get_subcarts_for_cart.php')
			.then(function(res){
				cartApp.cart = res.data
				cartApp.GetSum()
			})
		},

		GetSum: function(){
			axios.get('PHP/get_sum_cart.php')
			.then(function(res){
				if (res.data) cartApp.cart_sum = res.data.cart_sum
				else cartApp.cart_sum = 0
			})
		},

		Buy: function(){
			axios.get('PHP/buy.php')
			.then(function(res){
				alert('Успешно куплено!')
				location.href='index.php'
			})
		},

		Main: function(){
			this.userID = getCookie('userID')
			if (this.userID) {
				this.GetSubcarts()
			}
		}
	}
})

cartApp.Main()