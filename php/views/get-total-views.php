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
// $periodo = $_POST['periodo'];
$view = new Localizacao();
// Pega o total de views de todos os intervalos
$total_views = [];
// forEach($periodo as $key => $value) {
$total_views = $view->get();
// }
// Cria um array de meses preenchido com as tadas recebidas pelo total_views
// eem ingles
$meses = [
    "January"=>[],
    "February"=>[],
    "March"=>[],
    "April"=>[],
    "May"=>[],
    "June"=>[],
    "July"=>[],
    "August"=>[],
    "September"=>[],
    "October"=>[],
    "November"=>[],
    "December"=>[]
];
foreach ($total_views as $key => $value) {
    // Vefifica se $value->data_entry pertence ao ano atual
    if (date("Y", strtotime($value["data_entry"])) == date("Y")) {
        $monthNumber = date("n", strtotime($value["data_entry"]));
        // Verifica o mês da data e põe em sua determinada posição no array de meses
        array_push($meses[date("F", mktime(0, 0, 0, $monthNumber, 10))], $value["ip"]);

    }
}
// $total_views = $meses;

echo json_encode($meses);
// }