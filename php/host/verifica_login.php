<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION["user"])) {
    // Redireciona usuário de páginas não válidas
    header("Location: ".LOGIN_ADM);
    die();
}