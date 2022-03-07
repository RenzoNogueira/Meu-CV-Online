<?php 

require "../php/constantes.php";

// Redireciona usuário de páginas não válidas
header("Location: ".ROOT_404);

die();