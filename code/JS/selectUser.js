function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^| )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^]*)"
  ))
  return matches ? decodeURIComponent(matches[1]) : undefined
}

var selectUserApp = new Vue({
	el: '#selectUserApp',
	data:{
		usersList: '',
		userID: 0,
		cart: {},
	},
	methods:{
		GetUsers: function(){
			axios.get('PHP/get_users_list.php')
			.then(function(res){
				selectUserApp.usersList = res.data
			})
		},

		SetCookieUserID: function(){
			document.cookie = 'userID=' + this.userID
			location.reload()
		},

		Main: function(){
			this.GetUsers()
			if(getCookie('userID')) this.userID = getCookie('userID')
		}
	}
})

selectUserApp.Main()


