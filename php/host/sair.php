<?php
require "../constantes.php";
require "conexao.php";

if (!isset($_SESSION))  session_start();
if (isset($_SESSION["SESSION_TOKEN"])) {
    $user = $_SESSION["user"];
    define("NAME", json_decode($_SESSION["SESSION_TOKEN"])[0]);
    unset($_SESSION["SESSION_TOKEN"]);
    unset($_SESSION["user"]);

    $query = "UPDATE `user` SET `sessiontoken`='',`dataatualizacaosessiontoken`='" . date('d/m/Y H:i:s') . "' WHERE `name` = '" . NAME . "'"; // Remove as credenciais do usuário
    mysqli_query($conexao, $query);
}
header("Location: ".LOGIN_ADM);
