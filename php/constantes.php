<?php

// Nome do servidor
define("ROOT", $_SERVER['SERVER_NAME']);
// Pega a pasta raiz da url
// Apenas a primeira pasta
define("ROOT_FOLDER", "/" . explode("/", $_SERVER['REQUEST_URI'])[1]);

// Caminho de redirecionamento erro 404
define("ROOT_404", "/pages/404.php");

// Caminho de redirecionamento erro 404
define("LOGIN_ADM", "/adm/login/");

// Títulos das páginas
define("HOME", "Renzo Nogueira");
define("LOGIN_DASHBOARD", "Página de login");
define("ADMIN", "Dashboard admin");

// Descroção das páginas
define("HOME_DESC", 
"Renzo da SilvaSoares Nogueira. Desenvolvedor web | Desenvolvedor Júnior;
Telefone para orçamento: (61) 996044897; E-mail : renzossnmail@gmail.com;
Endereço : Riacho Fundo II Brasília DF.");
define("META_KEYWORDS", "Lux Andrew, lux andrew, LuxAndrew, Lux_andrew, Lux_Andrew, Lux-Andrew, LUX_ANDREW, Lux, Andrew, Renzo Nogueira, Renzo, Nogueira, Renzo Nogueira Desenvolvedor, Desenvolvedor, Desenvolvedor web, Desenvolvedor web Renzo Nogueira,
Desenvolvedor web Renzo, Desenvolvedor web Nogueira, HTML, CSS, PHP, Blog, Riacho Fundo II, Brasília, DF, Brasília DF");

// Links das páginas
define("HOME_LINK", "http://" . ROOT . ROOT_FOLDER.'/');
define("BLOG", "http://" . ROOT . ROOT_FOLDER.'/pages/blog.php');
define("PORTIFOLIO", "http://" . ROOT . ROOT_FOLDER.'/pages/portifolio.php');
