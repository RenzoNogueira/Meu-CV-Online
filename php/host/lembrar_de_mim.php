<?php
require "../../php/host/conexao.php";
if (isset($_COOKIE["token"])) {
    $sessioncookie = $_COOKIE["token"];
    $query = "SELECT `sessiontoken`, `name` FROM `user` WHERE `sessiontoken` = '" . $sessioncookie . "'"; // Token da última seção
    $result = mysqli_query($conexao, $query);
    $result = $result->fetch_all(MYSQLI_ASSOC);
    if (count($result) > 0) {
        if ($result[0]["sessiontoken"] == $sessioncookie) {
            // salva por um dia
            setcookie("user", $result[0]["name"], time() + (86400), "/");
            header("Location: ../");
        } else {
            echo false;
        }
    }
}