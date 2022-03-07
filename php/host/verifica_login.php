<?php
if (!isset($_SESSION))  session_start();
require "../php/constantes.php";
if ($_SESSION["user"] == false) {
    // Redireciona usuário de páginas não válidas
    header("Location: ".LOGIN_ADM);
    die();
}
