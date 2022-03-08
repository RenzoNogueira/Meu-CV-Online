<?php
if (!isset($_SESSION))  session_start();
if ($_SESSION["user"] == false) {
    // Redireciona usuário de páginas não válidas
    header("Location: ".LOGIN_ADM);
    die();
}
