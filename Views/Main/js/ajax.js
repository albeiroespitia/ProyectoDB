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
				if(res == 'Error'){
					$('.error-user').html('Usuario o contraseña incorrectos');
				}else if(res == 'ingeniero'){
					window.location.href = '../EngineerView/engineer.php';
				}else if(res == 'administrador'){
					window.location.href = '../Admin/admin.php';
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
		        console.log('holaaa');
		      }
		})

	})

		$.ajax({
			url: '/ProyectoDB/Controller/ControllerProducto.php',
			data: {tipo:'listarPrincipal'},
			type: 'POST',
			success: function(res){
				$('.productos').html(res);
			}
		})

	
});