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

<body class="overflow-hidden">
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
            <div class="p-2 mt-4 menu-lt">
                    <div class="menu-lateral btn-group btn-group-vertical">
                        <div>
                            <button type="button" class="btn btn-menu-lt position-relative mb-2"><span class="text-light fs-5"><i class="fa-solid fa-house-user"></i></span><span class="text-light btn-text-lt">Home</span></button>
                            <button type="button" class="btn btn-menu-lt position-relative mb-2"><span class="text-light fs-5"><i class="fa-solid fa-arrow-up-right-from-square"></i></span><span class="text-light btn-text-lt">Opção</span></button>
                            <button type="button" class="btn btn-menu-lt position-relative mb-2"><span class="text-light fs-5"><i class="fa-solid fa-arrow-up-right-from-square"></i></span><span class="text-light btn-text-lt">Opção</span></button>
                            <button type="button" class="btn btn-menu-lt position-relative mb-2"><span class="text-light fs-5"><i class="fa-solid fa-arrow-up-right-from-square"></i></span><span class="text-light btn-text-lt">Opção</span></button>
                            <button type="button" class="btn btn-menu-lt position-relative mb-2"><span class="text-light fs-5"><i class="fa-solid fa-arrow-up-right-from-square"></i></span><span class="text-light btn-text-lt">Opção</span></button>
                            <button type="button" class="btn btn-menu-lt position-relative mb-2"><span class="text-light fs-5"><i class="fa-solid fa-arrow-up-right-from-square"></i></span><span class="text-light btn-text-lt">Opção</span></button>
                            <button type="button" class="btn btn-menu-lt position-relative mb-2"><span class="text-light fs-5"><i class="fa-solid fa-arrow-up-right-from-square"></i></span><span class="text-light btn-text-lt">Opção</span></button>
                            <button type="button" class="btn btn-menu-lt position-relative mb-2"><span class="text-light fs-5"><i class="fa-solid fa-arrow-up-right-from-square"></i></span><span class="text-light btn-text-lt">Opção</span></button>
                            <button type="button" class="btn btn-menu-lt position-relative mb-2"><span class="text-light fs-5"><i class="fa-solid fa-arrow-up-right-from-square"></i></span><span class="text-light btn-text-lt">Opção</span></button>
                            <button type="button" class="btn btn-menu-lt position-relative mb-2"><span class="text-light fs-5"><i class="fa-solid fa-arrow-up-right-from-square"></i></span><span class="text-light btn-text-lt">Opção</span></button>
                        </div>
                    </div>
            </div>
        </main>
    </div>

    <script src="https://kit.fontawesome.com/274af9ab8f.js" crossorigin="anonymous"></script>
</body>

</html>