function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^| )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^]*)"
  ))
  return matches ? decodeURIComponent(matches[1]) : undefined
}

var historyApp = new Vue({
	el: '#historyApp',
	data:{
		userID: '',
		history: '',
		historySum: '',
	},
	methods:{
		GetHistory: function(){
			axios.get('PHP/get_history.php')
			.then(function(res){
				historyApp.history = res.data
			})
			axios.get('PHP/get_history_sum.php')
			.then(function(res){
				historyApp.historySum = res.data
			})
		},

		DeleteCart:function(id){
			if (confirm("Вы уверены, что хотите удалить?"))
			axios.get('PHP/delete_cart.php?id=' + id)
			.then(function(res){
				historyApp.GetHistory()
			})
		},

		Main: function(){
			this.userID = getCookie('userID')
			if (this.userID) {
				this.GetHistory()
			}
		}
	}
})

historyApp.Main()