<?php

require('host/conexao.php');
define('MIN_VALUE', $_POST['data']['positionAfterItem']);
define('MAX_VALUE', 3);

// QUERY
$query = "SELECT * FROM `blog`";

$result = mysqli_query($conexao, $query);
mysqli_query($conexao, 'SET NAMES utf8');
if ($result) {
    $result = $result->fetch_all(MYSQLI_ASSOC);
}

echo json_encode(array_slice($result, MIN_VALUE, MAX_VALUE));