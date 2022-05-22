<?php

require('host/conexao.php');
if (isset($_POST['data']['positionAfterItem'])) {
    define('MIN_VALUE', $_POST['data']['positionAfterItem']);
    define('MAX_VALUE', 2);

    // QUERY
    $query = "SELECT * FROM `portifolio`";

    $result = mysqli_query($conexao, $query);
    mysqli_query($conexao, 'SET NAMES utf8');
    if ($result) {
        $result = $result->fetch_all(MYSQLI_ASSOC);
    }

    $result = array_slice($result, MIN_VALUE, MAX_VALUE);
    echo json_encode($result);
} else {
    // QUERY
    $query = "SELECT * FROM `portifolio`";

    $result = mysqli_query($conexao, $query);
    mysqli_query($conexao, 'SET NAMES utf8');
    if ($result) {
        $result = $result->fetch_all(MYSQLI_ASSOC);
    }
    echo json_encode($result);
}
