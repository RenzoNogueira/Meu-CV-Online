<?php
require "../../php/host/conexao.php";
if (!isset($_SESSION))  session_start();
if(isset($_SESSION["SESSION_TOKEN"])){
    $sessioncookie= json_decode($_SESSION["SESSION_TOKEN"]);
    define("NAME", $sessioncookie[0]);
    define("HASH", $sessioncookie[1]);
    
    $query = "SELECT `sessiontoken`, `name` FROM `user` WHERE `sessiontoken` = '".HASH."'"; // Token da última seção
    $result = mysqli_query($conexao, $query);
    $result = $result->fetch_all(MYSQLI_ASSOC);
    if ($sessiontoken = $result[0]["sessiontoken"] && $user = $result[0]["name"]) {
        if ($sessiontoken == HASH) { // Verifica se as senhas conferem
            $_SESSION["user"] = $user;
            header("Loaction: ../");
        }
    }
}