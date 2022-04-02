<!DOCTYPE html>
<html lang="pt-br">
<?php
require "../php/constantes.php";
require "../php/host/verifica_login.php";
// $_SESSION["user"] = false;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frameworks/Bootstrap-5.0/Lux-Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/style-adm.css">
    <title><?php echo HOME; ?></title>
</head>

<body class="customScrollbar-y">
    <div id="app">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid d-flex flex-row-reverse ">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Procurar" aria-label="Search">
                    <button class="btn btn-outline-secondary text-light" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
        <main>
            <div class="d-flex flex-row p-2">
                <div class="menu-lateral bg-secondary btn-group btn-group-vertical" role="group">
                    <button type="button" class="btn  btn-outline-light"><span class="text-dark">1</span></button>
                    <button type="button" class="btn mb-2 btn-outline-light"><span class="text-dark">2</span></button>
                    <button type="button" class="btn mb-2 btn-outline-light"><span class="text-dark">3</span></button>
                    <button type="button" class="btn mb-2 btn-outline-light"><span class="text-dark">4</span></button>
                    <button type="button" class="btn mb-2 btn-outline-light"><span class="text-dark">5</span></button>
                    <button type="button" class="btn mb-2 btn-outline-light"><span class="text-dark">6</span></button>
                    <button type="button" class="btn mb-2 btn-outline-light"><span class="text-dark">7</span></button>
                    <button type="button" class="btn mb-2 btn-outline-light"><span class="text-dark">8</span></button>
                    <button type="button" class="btn mb-2 btn-outline-light"><span class="text-dark">9</span></button>
                    <button type="button" class="btn mb-2 btn-outline-light"><span class="text-dark">10</span></button>
                </div>
                <div class="content"></div>
            </div>
        </main>
    </div>
</body>

</html>