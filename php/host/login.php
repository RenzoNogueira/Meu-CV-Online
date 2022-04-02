<?php
require "conexao.php";
if (!isset($_SESSION))  session_start();
// Verifica se usuário marcou se quer ser lembrado
function lembrarDeMim($option, $nameUser, $password)
{
    global $conexao;
    if ($option) {
        date_default_timezone_set('America/Sao_Paulo');
        $stringHash = $nameUser . $password . date('d/m/Y H:i:s');
        define("HASH", password_hash($stringHash, PASSWORD_DEFAULT));
        $_SESSION["SESSION_TOKEN"] = json_encode([$nameUser, HASH]); // Salva o token da seção
        $query = "UPDATE `user` SET `sessiontoken`='" . HASH . "',`dataatualizacaosessiontoken`='" . date('d/m/Y H:i:s') . "' WHERE `name` = '" . $nameUser . "'"; // Usuário
        mysqli_query($conexao, $query);
    }
}

// Verifica o login do usuário
define('USER', base64_decode($_POST["user"]));
define('PASSWORD', $_POST["password"]);
define('LEMBRAR_DE_MIM', boolval($_POST["lembrarDeMim"]));
// QUERY
$query = "SELECT `name` FROM `user` WHERE `name` = '" . USER . "'"; // Usuário

mysqli_query($conexao, 'SET NAMES utf8');
$result = mysqli_query($conexao, $query);
if ($user = $result->fetch_all(MYSQLI_ASSOC)[0]["name"]) {
    $query = "SELECT `password` FROM `user` WHERE `name` = '" . USER . "'"; // Senha
    $result = mysqli_query($conexao, $query);
    if ($result = $result->fetch_all(MYSQLI_ASSOC)[0]["password"]) {
        if (password_verify(PASSWORD, $result)) { // Verifica se as senhas conferem
            // Credenciais Conferem
            $_SESSION["user"] = $user;
            lembrarDeMim(LEMBRAR_DE_MIM, USER, PASSWORD);
            echo true;
        } else {
            echo "password"; // A senha está incorreta
        }
    }
} else {
    echo "user"; // O usuário não existe
}
