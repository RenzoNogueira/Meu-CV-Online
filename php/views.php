<?php
require "host/conexao.php";
mysqli_query($conexao, 'SET NAMES utf8');
$query = "SELECT `visualizacoes` FROM `info`"; // Número de visualizações
$newViews = (mysqli_query($conexao, $query)->fetch_all(MYSQLI_ASSOC)[0]["visualizacoes"]) + 1; // Implementa mais 1 nas visualizações
// var_dump(mysqli_query($conexao, $query)->fetch_all(MYSQLI_ASSOC)[0]["visualizacoes"]);
$query = "UPDATE `info` SET `visualizacoes`='" . $newViews . "'";
mysqli_query($conexao, $query); // Implementa as visualizações
echo $newViews;