<?php

define('HOST', '127.0.0.1'); // Constante
define('USUARIO', 'u914795534_renzonogueiras'); // Mudar
define('SENHA', 'W0#Z4&7Nlz'); // Mudar
define('DB', 'u914795534_rzssn');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Erro ao conectar, tente novamente mais tarde ou recarregue a página.');
$conexao->set_charset('utf8');