var usersApp = new Vue({
	el: '#usersApp',
	data:{
		users: '',
		newUser:{
			surname: '',
			name: '',
			city: '',
			street: '',
			home: '',
		},
		updateUser:{
			id: 0,
			surname: '',
			name: '',
			city: '',
			street: '',
			home: '',
		},
	},
	methods:{
		GetUsers: function(){
			axios.get('PHP/get_users_list.php')
			.then(function(res){
				usersApp.users = res.data
			})
		},

		SetNullUser: function(){
			this.newUser.surname = ''
			this.newUser.name = ''
			this.newUser.city = ''
			this.newUser.street = ''
			this.newUser.home = ''
		},

		GetUpdateUser: function(user){
			this.updateUser.id = user.id
			this.updateUser.surname = user.surname
			this.updateUser.name = user.name
			this.updateUser.city = user.city
			this.updateUser.street = user.street
			this.updateUser.home = user.home
		},
		
		AddUser: function(){
			axios.post('PHP/add_user.php', usersApp.newUser)
			.then(function(res){
				usersApp.GetUsers()
				usersApp.SetNullUser()
			})
			
		},

		DeleteUser: function(id){
			if (confirm("Вы уверены, что хотите удалить?"))
			axios.get('PHP/delete_user.php?id=' + id)
			.then(function(res){
				usersApp.GetUsers()
			})
		},
		
		UpdateUser: function(){
			axios.post('PHP/update_user.php', usersApp.updateUser)
			.then(function(res){
				usersApp.GetUsers()
				usersApp.updateUser.id = 0
			})
		},

		Main: function(){
			this.GetUsers()
		}
	}
})

usersApp.Main()