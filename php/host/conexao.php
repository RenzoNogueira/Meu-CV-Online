<?php

define('HOST', '127.0.0.1'); // Constante
define('USUARIO', 'root'); // Mudar
define('SENHA', ''); // Mudar
define('DB', 'rzssn');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Erro ao conectar, tente novamente mais tarde ou recarregue a página.');
$conexao->set_charset('utf8');