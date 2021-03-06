<?php
require "../constantes.php";
require "conexao.php";
// Função para lembrar o login
// A seção será salva com ul token no banco de dados
// O tekn será salvo no campo sessiontoken do user
// O token nunca devrá ser repetido
function lembrarDeMim($nameUser, $password)
{
    global $conexao;
    $token = md5(uniqid(rand(), true));
    $sql = "UPDATE user SET sessiontoken = '$token' WHERE name = '$nameUser' AND password = '$password'";
    $result = mysqli_query($conexao, $sql);
    if ($result) {
        // Salva por uma semana
        setcookie("token", $token, time() + (86400 * 7), "/");
        setcookie("user", $nameUser, time() + (86400 * 7), "/");
        setcookie("password", $nameUser, time() + (86400 * 7), "/");
        return true;
    } else {
        return false;
    }
}

// Cria constantes com os dados do usuário: user. password e lembrar de mim recebidos por post
define("USER", base64_decode($_POST["user"]));
define("PASSWORD", $_POST["password"]);
define("LEMBRAR_DE_MIM", boolval($_POST["lembrarDeMim"]));

// Verifica se o usuário existe no banco de dados
$sql = "SELECT * FROM user WHERE `name` = '" . USER . "'";
$result = mysqli_query($conexao, $sql);
if (mysqli_num_rows($result) > 0) {
    // Se o usuário existe, verifica se a senha está correta usando password_verify
    $row = mysqli_fetch_assoc($result);
    // Se o usuário não está logado, verifica se o usuário quer lembrar de mim
    if (isset($_COOKIE["token"]) && $_COOKIE["token"] == $row["sessiontoken"]) {
        // Salva por um dia
        setcookie("user", USER, time() + (86400), "/");
        echo USER;
    } else {
        // Se a senha está correta, verifica se o usuário está logado
        if (password_verify(PASSWORD, $row["password"])) {
            if (LEMBRAR_DE_MIM) {
                // Se o usuário quer lembrar de mim, lembra de mim
                lembrarDeMim(USER, $row["password"]);
            }
            // Salva o nome do usuário na sessão
            // Salva por um dia
            setcookie("user", USER, time() + (86400), "/");
            // echo USER; // Retorna usuário para o ajax
        } else {
            // Se a senha está incorreta, redireciona para a página de erro
            echo "password"; // Retorna false para o ajax
        }
    }
} else {
    // Se o usuário não existir, echo false
    echo false; // Retorna false para o ajax
}
