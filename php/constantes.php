<?php

// Nome do servidor
define("ROOT", $_SERVER['SERVER_NAME']);
// pegar apasta atual dentro local host
define("PASTA", $_SERVER['REQUEST_URI']);

// Caminho de redirecionamento erro 404
define("ROOT_404", "http://" . ROOT.PASTA. "pages/404.php");

// Caminho de redirecionamento erro 404
define("LOGIN_ADM", "http://" . ROOT.PASTA. "login/");

// Títulos das páginas
define("HOME", "Renzo Nogueira");
define("LOGIN_DASHBOARD", "Página de login");
define("ADMIN", "Dashboard admin");
