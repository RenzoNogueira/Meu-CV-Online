<?php

// Nome do servidor
define("ROOT", $_SERVER['SERVER_NAME']);
// Pega a pasta raiz da url
// Apenas a primeira pasta
define("ROOT_FOLDER", "/".explode("/", $_SERVER['REQUEST_URI'])[1]);

// Caminho de redirecionamento erro 404
define("ROOT_404", ROOT.ROOT_FOLDER. "/pages/404.php");

// Caminho de redirecionamento erro 404
define("LOGIN_ADM", ROOT.ROOT_FOLDER. "/adm/login/");

// Títulos das páginas
define("HOME", "Renzo Nogueira");
define("LOGIN_DASHBOARD", "Página de login");
define("ADMIN", "Dashboard admin");
