<?php
/* 
    Lux Andrew
    Recebe o ip e salva no bancp de dados.
*/

require "../host/conexao.php";
// Importa classe localizacao da pasta objects
require "../objects/Localizacao.php";
// Atera o local da data para pt
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

// Resebe um post com o periodo e chama a função para contar os dados
// if (isset($_POST['periodo'])) {
// $periodo = $_POST['periodo'];
$view = new Localizacao();
// Pega o total de views de todos os intervalos
$total_views = [];
// forEach($periodo as $key => $value) {
$total_views = $view->get();
// }

$mes = [];

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

$semana = [
    "Sunday"=>[],
    "Monday"=>[],
    "Tuesday"=>[],
    "Wednesday"=>[],
    "Thursday"=>[],
    "Friday"=>[],
    "Saturday"=>[]
];

$anos = [];



// Preenche o array de meses com os dados do total_views
foreach ($total_views as $key => $value) {
    // Vefifica se $value->data_entry pertence ao ano atual
    if (date("Y", strtotime($value["data_entry"])) == date("Y")) {
        $monthNumber = date("n", strtotime($value["data_entry"]));
        // Verifica o mês da data e põe em sua determinada posição no array de meses
        array_push($meses[date("F", mktime(0, 0, 0, $monthNumber, 10))], $value["ip"]);
    }
}

// Inclui todos os dias do mês atual no array mes
for ($i=1; $i <= date("t"); $i++) { 
    $mes[$i] = [];
}
// Preenche o array de mes com os dados do total_views
foreach ($mes as $key => $value) {
    foreach ($total_views as $key2 => $value2) {
        if (date("d", strtotime($value2["data_entry"])) == $key) {
            array_push($mes[$key], $value2["ip"]);
        }
    }
}


// Preenche o array de semanas com os dados do total_views
foreach ($total_views as $key => $value) {
    // Vefifica se $value->data_entry pertence ao ano atual
    if (date("Y", strtotime($value["data_entry"])) == date("Y")) {
        // Verifica o mês da data e põe em sua determinada posição no array de meses
        array_push($semana[getdate(strtotime($value["data_entry"]))["weekday"]], $value["ip"]);
    }
}

// Inclui os ultimos 10 anos no array de anos
for ($i=0; $i < 10; $i++) { 
    $anos[date("Y", strtotime("-".$i." year"))] = [];
}
// Preenche o array de anos com os dados do total_views
// Coloca as datas em seus determinados anos
foreach ($anos as $key => $value) {
    foreach ($total_views as $key2 => $value2) {
        if (date("Y", strtotime($value2["data_entry"])) == $key) {
            array_push($anos[$key], $value2["ip"]);
        }
    }
}

// Substitui os dados do array por o vtotal de dados contido em sí
foreach ($mes as $key => $value) {
    $mes[$key] = count($mes[$key]);
}
foreach ($meses as $key => $value) { // Meses
    $meses[$key] = count($value);
}
foreach ($semana as $key => $value) { // Semana
    $semana[$key] = count($value);
}
foreach ($anos as $key => $value) { // Anos
    $anos[$key] = count($value);
}

echo json_encode(["mes"=>$mes, "meses"=>$meses,"semana"=>$semana, "anos"=>$anos]);
// }