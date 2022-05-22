<?php
if (!isset($_COOKIE["user"]) || $_COOKIE["user"] == false) {
    // Redireciona usuário de páginas não válidas
    header("Location: ".LOGIN_ADM);
    die();
}