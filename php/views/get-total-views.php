<?php
/* 
    Lux Andrew
    Recebe o ip e salva no bancp de dados.
*/

require "../host/conexao.php";
// Importa classe localizacao da pasta objects
require "../objects/Localizacao.php";

// Resebe um post com o periodo e chama a função para contar os dados
// if (isset($_POST['periodo'])) {
    $periodo = $_POST['periodo'];
    $view = new Localizacao();
    // Pega o total de views de todos os intervalos
    $total_views = [];
    forEach($periodo as $key => $value) {
        $total_views[$key] = $view->count(false, $value);
    }
    
    echo json_encode($total_views);
// }