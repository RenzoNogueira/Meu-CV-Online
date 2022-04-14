<?php
require "../../php/host/conexao.php";
if (!isset($_SESSION)) session_start();
if (isset($_SESSION["token"])) {
    $sessioncookie = $_SESSION["token"];
    var_dump($sessioncookie);
    $query = "SELECT `sessiontoken`, `name` FROM `user` WHERE `sessiontoken` = '" . $sessioncookie . "'"; // Token da última seção
    $result = mysqli_query($conexao, $query);
    $result = $result->fetch_all(MYSQLI_ASSOC);
    if (count($result) > 0) {
        if ($result[0]["sessiontoken"] == $sessioncookie) {
            $_SESSION["user"] = $result[0]["name"];
            header("Location: ../");
        } else {
            echo false;
        }
    }
}
