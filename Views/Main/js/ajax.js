$(document).ready(function() {

	$('#login-form').submit(function(e){

		var username = $('input[name="username"]').val();
		var password = $('input[name="password"]').val();
		e.preventDefault();


		$.ajax({
			url: '/ProyectoDB/Controller/Action/act_login.php',
			data: {username:username, password: password},
			type: 'POST',
			success: function(res){
				console.log(res);
			}
		})

	})
	
});