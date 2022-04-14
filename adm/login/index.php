<!DOCTYPE html>
<html lang="pt-br">
<?php
if (!isset($_SESSION))  session_start();
if ($_SESSION["user"] != false) {
	// Redireciona usuário de páginas não válidas
	header("Location: ../#Usuário_já_logado!");
	die();
}
require "../../php/constantes.php";
require "../../php/host/lembrar_de_mim.php";
?>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../css/fonts/fonts.css">
	<link rel="stylesheet" href="../../frameworks/reveal-effect-button/main.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="img js-fullheight" style="background-image: url(images/mountain-bg.jpg);">
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.5/lodash.min.js"></script>
	<!-- <script src="../../frameworks/reveal-effect-button/main.js"></script> -->
	<script src="js/script.js"></script>
	<script>
		// Vue Js
		var app = new Vue({
			el: '#appLogin',
			data: {
				mostrarSenha: false,
				lembrarDeMim: false,
				menssageErrorUser: {
					numberMensage: 0,
					menssage: ["Este campo é obrigatório!", "Usuário não encontrado."]
				},
				menssageErrorPassword: {
					numberMensage: 0,
					menssage: ["Este campo é obrigatório!", "Senha não coincide."]
				},
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
				},
				submit: function(event) {
					event.preventDefault()
					const SELF = this
					const TOOGLE_FORM = (input) => {
						switch (input) {
							case "user":
								$("#name").addClass("is-invalid")
								$("#name").removeClass("is-valid")
								break
							case "password":
								$("#password-field").addClass("is-invalid")
								$("#password-field").removeClass("is-valid")
								break
							case true:
								$("#name, #password-field").addClass("is-valid")
								$("#name, #password-field").removeClass("is-invalid")
								break
							case false:
								$("#name, #password-field").removeClass("is-valid")
								$("#name, #password-field").removeClass("is-invalid")
								break
							default:
								$("#name, #password-field").addClass("is-invalid")
						}
					}
					$("input").click(function() {
						TOOGLE_FORM(false)
					})
					if (SELF.login.user.replace(/ /g, "").length != 0 && SELF.login.password.replace(/ /g, "").length != 0) {
						const DATA = {
							user: btoa(SELF.login.user),
							password: btoa(SELF.login.password),
							lembrarDeMim: SELF.lembrarDeMim? 1 : 0
						} // Trata os dados
						// Ajax
						$.ajax({
							type: "POST",
							url: "../../php/host/login.php",
							data: DATA,
							success: function(request) {
								console.log(request)
								if (request == "user") {
									SELF.menssageErrorUser.numberMensage = 1
									TOOGLE_FORM("user")
								} else if (request == "password") {
									SELF.menssageErrorPassword.numberMensage = 1
									TOOGLE_FORM(true)
									TOOGLE_FORM("password")
								} else if (request == true) { // Credenciais Conferem
									$("input").prop("disabled", true) // Disabilita o formulário
									$("section").css("opacity", "0.4") // Aplica opacidade no layout
									setTimeout(function() {
										window.location = "../"
									}, 600)
								}
							},
						})
					} else {
						SELF.menssageErrorUser.numberMensage = SELF.menssageErrorPassword.numberMensage = 0
						TOOGLE_FORM()
					}
				},
				revealEffectButton: function() {
					<?php require "../../frameworks/reveal-effect-button/main.js"; ?>
				}
			},
			watch: {},
			mounted: function() {
				const SELF = this
				$('#preloader').addClass('d-none')
				SELF.main()
				SELF.revealEffectButton()
				setTimeout(function() {
					$("input").prop("disabled", false)
				}, 900);


			},
		})
	</script>
</body>

</html>