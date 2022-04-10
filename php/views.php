<?php
/* 
    Lux Andrew
    Recebe o ip e salva no bancp de dados.
*/


require "host/conexao.php";
// Importa classe localizacao da pasta objects
require "objects/Localizacao.php";

// Se existir o post de ip chanará iniciará a variavel geilocalizaçao com o retorno da classe
if (isset($_POST['ip'])) {
    // global Localizacao;
    $ip = $_POST['ip'];
    // Instancia classe localizacao pasando o ip
    $view = new Localizacao($ip);
    // Salva
    $view->save();
}