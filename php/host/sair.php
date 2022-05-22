<?php
require "../constantes.php";
require "conexao.php";

if (isset($_COOKIE["token"])) {
    $user = $_COOKIE["user"];
    define("NAME", json_decode($_COOKIE["token"])[0]);
    unset($_COOKIE["token"]);
    
    $query = "UPDATE `user` SET `sessiontoken`='',`dataatualizacaosessiontoken`='" . date('d/m/Y H:i:s') . "' WHERE `name` = '" . NAME . "'"; // Remove as credenciais do usuário
    mysqli_query($conexao, $query);
}
setcookie("user", "", time() - 3600, "/");
unset($_COOKIE["user"]);
header("Location: ".LOGIN_ADM);
