<!DOCTYPE html>
<html lang="pt-br">
<?php
require "php/constantes.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="frameworks/Bootstrap-5.0/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fonts/fonts.css">
    <link rel="stylesheet" href="css/gooeyTextMorphSnippet.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-home.css">
    
    <title><?php echo HOME;?></title>
    <meta name="description" content="<?php echo HOME_DESC;?>">
    <meta name="keywords" content="<?php echo META_KEYWORDS;?>">
    <meta name="author" content="Renzo Nogueira, Lux Andrew">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://rz.dev.br" />
</head>

<body class="customScrollbar-y">
    <div id="app">
        <main>
            <!-- Header -->
            <header id="header-home">
                <?php
                require "pages/homePage/headerHome.html"; // Importação de página 
                ?>
            </header>
            <!-- Header -->

            <div data-bs-spy="scroll" data-bs-target="#menu-desktop" data-bs-offset="0" tabindex="100" class="px-2">
                <!-- Olá -->
                <section id="section-hi" class="fw-normal container">
                    <?php
                    require "pages/homePage/sectionHi.html"; // Importação de página 
                    ?>
                </section>
                <!-- Olá -->

                <!-- Educação -->
                <section id="section-education" class="container  fw-normal mt-5">
                    <?php
                    require "pages/homePage/sectionEducation.html"; // Importação de página 
                    ?>
                </section>
                <!-- Educação -->

                <!-- Trabalho -->
                <section id="section-trabalho" class="container  fw-normal mt-4">
                    <?php
                    require "pages/homePage/sectionTrabalho.html"; // Importação de página 
                    ?>
                </section>
                <!-- Trabalho -->

                <!-- Habilidades gerais -->
                <section id="section-habilidades-gerais" class="container mt-5 fw-normal">
                    <?php
                    require "pages/homePage/sectionHabilidadesGerais.html"; // Importação de página 
                    ?>
                </section>
                <!-- Habilidades gerais -->

                <!-- Portifólio -->
                <section id="section-portifolio" class="container mt-5 fw-normal">
                    <?php
                    require "pages/homePage/sectionPortifolio.html"; // Importação de página 
                    ?>
                </section>
                <!-- Portifólio -->

                <!-- Blog -->
                <section id="section-blog" class="container mt-5 fw-normal">
                    <?php
                    require "pages/homePage/sectionBlog.html"; // Importação de página 
                    ?>
                </section>
                <!-- Blog -->

                <!-- Orçamento -->
                <section id="section-orcamento" class="container mt-5 fw-normal">
                    <?php
                    require "pages/homePage/sectionOrcamento.html"; // Importação de página 
                    ?>
                </section>
                <!-- Orçamento -->
            </div>
        </main>

        <!-- Rodapé -->
        <?php
        require "pages/homePage/footer.html"; // Importação de página 
        ?>
