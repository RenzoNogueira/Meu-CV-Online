<!DOCTYPE html>
<html lang="pt-br">
<?php
require "../../php/constantes.php";
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../css/fonts/fonts.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<div id="appLogin">
		<?php
		require "../../pages/admimPage/login.html"; // Importação de página 
		?>
		<div id="preloader">
			<preloader></preloader>
		</div>
	</div>
	<script src="../../frameworks/jQuery-3.6/jquery-3.6.0.min.js"></script>
	<script src="../../frameworks/Bootstrap-5.0/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
	<script src="../../js/components/vue-componenst.js"></script>
	<script>
		// Vue Js
		var app = new Vue({
			el: '#appLogin',
			data: {
				login: {
					user: "",
					password: ""
				}
			},
			methods: {
				main: function() { // Botão de mostar a senha
					var fullHeight = function() {
						$('.js-fullheight').css('height', $(window).height());
						$(window).resize(function() {
							$('.js-fullheight').css('height', $(window).height());
						});

					};
					fullHeight();
					$(".toggle-password").click(function() {
						$(this).toggleClass("fa-eye fa-eye-slash");
						var input = $($(this).attr("toggle"));
						if (input.attr("type") == "password") {
							input.attr("type", "text");
						} else {
							input.attr("type", "password");
						}
					});
				}
			},
			watch: {},
			mounted: function() {
				const SELF = this
					$('#preloader').addClass('d-none')
					SELF.main()
					setTimeout(function(){
						$("input").prop( "disabled", false )
   }, 600);
					
			},
		})
	</script>
</body>

</html>