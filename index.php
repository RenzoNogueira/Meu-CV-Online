<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="frameworks/Bootstrap-5.0/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/gooeyTextMorphSnippet.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-home.css">
    <title>Renzo Nogueira</title>
</head>

<body class="customScrollbar-y">
    <div id="app">
        <main>
            <!-- Header -->
            <header id="header-home">
                <!-- Nav Menu -->
                <div class="menu">
                    <nav id="menu-desktop" class="nav-pills px-5 nav-menu d-none d-lg-block d-xl-block d-xxl-block position-fixed top-0">
                        <div id="links-menu">
                            <links-menu class="pt-4 px-4 nav nav-pills flex-column flex-sm-row text-uppercase fs-6 position-relative">
                            </links-menu>
                        </div>
                    </nav>

                    <nav class="d-inline-flex p-4 p-md-3 bd-highlight nav-mobile-menu d-sm-block d-md-block d-lg-none px-4 nav nav-pills text-uppercase fs-6 position-fixed top-0">
                        <i v-on:click="togleMobileMenu()" class="m-0 mx-md-5 fas fa-bars text-light button-mobile-menu"></i>
                        <div>
                            <div class="mobile-menu d-none position-fixed shadow"></div>
                            <div id="menu-mobile" class="mobile-menu-links d-none position-fixed d-flex justify-content-center align-items-center text-center">
                                <i onClick="app.togleMobileMenu()" class="m-5 fas fa-times text-light button-close-mobile-menu position-absolute top-0
                                    start-0"></i>
                                <div id="links-menu-mobile">
                                    <links-menu></links-menu>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <div class="personal-profile pt-5">
                        <div class="row container position-relative mt-5">
                            <div class="img-profile d-none d-lg-block d-xl-block d-xxl-block col-md-4 px-5 mb-4">
                                <img class="position-absolute" src="assets/img/img_avatar.jpg" alt="">
                            </div>
                            <div class="container col-xs-12 col-md-8 px-4 pb-4">
                                <h1 class="personal-profile-name text-light undeline">Renzo da Silva Soares Nogueira
                                </h1>
                                <!-- <span class="text-light">Desenvolvedor web</span> -->
                                <div id="textMorph">
                                    <span class="text-light" id="text1"></span>
                                    <span class="text-light" id="text2"></span>
                                </div>
                                <svg id="filters" class="d-none">
                                    <defs>
                                        <filter id="threshold">
                                            <!-- Basically just a threshold effect - pixels with a high enough opacity are set to full opacity, and all other pixels are set to completely transparent. -->
                                            <feColorMatrix in="SourceGraphic" type="matrix" values="1 0 0 0 0
                                                0 1 0 0 0
                                                0 0 1 0 0
                                                0 0 0 255 -140" />
                                        </filter>
                                    </defs>
                                </svg>

                                <div class="mt-5">
                                    <dl class="row contact-list">
                                        <dt class="col-12 col-md-4 text-uppercase">Idade :</dt>
                                        <dd class="col-12 col-md-8 text-light">
                                            {{(new Date().getFullYear()) - 2001}}
                                        </dd>
                                        <dt class="col-12 col-md-4 text-uppercase">Telefone :</dt>
                                        <dd class="col-12 col-md-8 text-light">(61) 996044897</dd>
                                        <dt class="col-12 col-md-4 text-uppercase">E-mail :</dt>
                                        <dd class="col-12 col-md-8"><a class="text-light text-decoration-none" href="mailto: renzossnmail@gmail.com">renzossnmail@gmail.com</a>
                                        </dd>
                                        <dt class="col-12 col-md-4 text-uppercase">Endereço :</dt>
                                        <dd class="col-12 col-md-8 text-light">Riacho Fundo II Brasília DF</dd>
                                    </dl>
                                    <div class="d-flex personal-profile_social">
                                        <a data-bs-toggle="tooltip" title="Gitgub" href="http://"><i class="fab fa-github text-light fs-4"></i></a>
                                        <a class="px-4" data-bs-toggle="tooltip" title="Linkedin" href="http://"><i class="fab fa-linkedin text-light fs-4"></i></a>
                                        <a data-bs-toggle="tooltip" title="Facebook" href="http://"><i class="fab fa-facebook-square text-light fs-4"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header -->

            <div data-bs-spy="scroll" data-bs-target="#menu-desktop" data-bs-offset="0" tabindex="100" class="px-2">
                <!-- Olá -->
                <section id="section-hi" class="fw-normal container">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="hi-title">
                                <h1 class="undeline">Olá</h1>
                            </div>
                            <div class="pt-4">
                                <p>
                                    Dedicado e sempre buscando novos conhecimentos, espero aprender bastante em cada
                                    oportunidade.
                                </p>
                            </div>
                            <a download="assets/cv/cv-renzo-nogueira.pdf" href="assets/cv/cv-renzo-nogueira.pdf" type="button" class="btn btn-info btn-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="Fazer download do currículo"><span class="fs-5">Baixar
                                    CV</span></a>
                        </div>
                    </div>
                </section>
                <!-- Olá -->

                <!-- Educação -->
                <section id="section-education" class="container  fw-normal mt-5">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="sub-section-title mb-5">
                                <span class="undeline fw-lighter fs-7">Educação</span>
                            </div>
                            <div id="list-education" class="mt-3 px-3 list-education">
                                <item-list-hystory v-for="items in education" :modelo="items.modelo" :periodo="items.periodo" :local="items.local" :descricao="items.descricao">
                                </item-list-hystory>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Educação -->

                <!-- Trabalho -->
                <section id="section-trabalho" class="container  fw-normal mt-4">
                    <div class="col-md-10">
                        <div class="sub-section-title mb-5">
                            <span class="undeline fw-lighter fs-7">Trabalho</span>
                        </div>
                        <div id="list-trabalho" class="mt-3 px-3 list-trabalho">
                            <item-list-hystory v-for="items in trabalho" :modelo="items.modelo" :periodo="items.periodo" :local="items.local" :descricao="items.descricao">
                            </item-list-hystory>
                        </div>
                    </div>
                </section>
                <!-- Trabalho -->

                <!-- Habilidades gerais -->
                <section id="section-habilidades-gerais" class="container mt-5 fw-normal">
                    <div>
                        <div class="sub-section-title mb-5">
                            <span class="undeline fw-lighter fs-7">Habilidades gerais</span>
                        </div>
                        <div id="list-ability" class="row mt-3 px-3 list-ability">
                            <ability prop="fab fa-html5" ability="html5"></ability>
                            <ability prop="fab fa-css3-alt" ability="css3"></ability>
                            <ability prop="fab fa-js-square" ability="js"></ability>
                            <ability prop="fab fa-vuejs" ability="vuejs"></ability>
                            <ability prop="fab fa-php" ability="php7"></ability>
                            <ability prop="fas fa-database" ability="mysql"></ability>
                        </div>
                    </div>
                </section>
                <!-- Habilidades gerais -->

                <!-- Portifólio -->
                <section id="section-portifolio" class="container mt-5 fw-normal">
                    <div>
                        <div class="sub-section-title mb-5">
                            <span class="undeline fw-lighter fs-7">Portifólio</span>
                        </div>
                        <div id="list-portifolio" class="mt-3 px-3 list-portifolio position-relative">
                            <!-- Loop dentro dos dados do portifólio -->
                            <div v-for="(item, index) in portifolio.data" class="position-relative row item-portifolio p-2 border shadow-sm rounded m-2">
                                <div class="col-xs-12 py-2 col-md-6 portifolio-item-img">
                                    <img class="img-thumbnail" :src="item.srcImg" :title="item.title" :alt="item.description">
                                </div>
                                <div class="row col-xs-12 col-xs-12 col-md-4 my-3  portifolio-item-body">
                                    <div class="col-12">
                                        <a target="_blank" v-if="item.linkProject != null && item.linkProject.length > 0" class="fs-r text-decoration-none link-dark" :href="item.linkProject">{{item.title}}
                                            <i class="ml-2 fas fa-link"></i></a>
                                        <a v-else class="fs-3 text-decoration-none link-dark" href="#">{{item.title}}</a>
                                        <p>{{item.description}}</p>
                                    </div>
                                    <div class="col-12 d-flex align-items-end">
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" :data-bs-target="'#modalPortifolio-'+index">Visualizar</button>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" :id="'modalPortifolio-'+index" tabindex="-1" :aria-labelledby="'ModalLabel-'+index" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header d-flex flex-row-reverse bd-highlight">
                                                <button type="button" class="close btn fs-3" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <img :src="item.srcImg" :alt="item.description" class="img-fluid" :title="item.title">
                                                </div>
                                                <div class="mt-3">
                                                    <span class="fs-3">{{item.title}}</span>
                                                    <p class="mt-3 text-truncate">{{item.description}}</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info text-uppercase" data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                            </div>

                            <div class="container d-flex justify-content-center">
                                <button v-if="moreDataPort.portifolio" v-on:click="loadPortifolio" class="btn btn-small btn-dark m-2 rounded-pill">Carregar mais</button>
                                <button v-else v-on:click="loadPortifolio(true)" class="btn btn-small btn-dark m-2 rounded-pill">Carregar menos</button>
                            </div>
                            <!-- Loop dentro dos dados do portifólio -->
                        </div>
                    </div>
                </section>
                <!-- Portifólio -->

                <!-- Blog -->
                <section id="section-blog" class="container mt-5 fw-normal">
                    <div>
                        <div class="sub-section-title mb-5">
                            <span class="undeline fw-lighter fs-7">Blog</span>
                        </div>
                        <div id="contents-blog" class="row mt-3 px-3 contents-blog position-relative">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 mb-3">
                                <div v-on:click="openViewPostBlog(blog.data[0]?blog.data[0]:'')" id="blog-last-publication">
                                    <div class="position-relative cursor">
                                        <img id="image-after-publication" :src="blog.data[0]?blog.data[0].srcImg:''" :alt="blog.data[0]?blog.data[0].description:''" class="img-fluid img-thumbnail" :title="blog.data[0]?blog.data[0].title:''">
                                        <div class="badge text-nowrap position-absolute bottom-0 start-0 m-3" style="width: 6rem;">
                                            <span class="text-dark bg-light p-1 rounded">{{blog.data[0]?blog.data[0].title:''}}</span>
                                        </div>
                                        <div class="badge text-nowrap position-absolute top-0 start-0 m-3" style="width: 6rem;">
                                            <span class="text-dark bg-light p-1 rounded">Ultima publicação</span>
                                        </div>
                                        <div id="descrption-after-publication" class="position-absolute top-50 start-50 translate-middle">
                                            <div class="rounded d-none d-xs-none d-sm-none d-md-block">
                                                <p class="text-dark p-1">
                                                    {{blog.data[0]?(blog.data[0].description.substring(0, 120) + (blog.data[0].description.length > 120? '...': '')):''}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="title-publications">
                                    <span>Publicações</span>
                                </div>
                                <div id="blog-publications" class="position-relative flipped border-top border-bottom customScrollbar-x">
                                    <div class="d-flex content">
                                        <div class="cursor border rounded p-2 mb-2 post-blog-publications row" v-for="(item, index) in blog.data" v-if="index >= 1">
                                            <div v-on:click="openViewPostBlog(item)" :id="'post-'+index">
                                                <div class="col d-flex justify-content-center">
                                                    <img :title="item.title" :src="item.srcImg" :alt="item.description" class="blog-list-image img-fluid img-thumbnail rounded float-start">
                                                </div>
                                                <div class="col p-3">
                                                    <span>{{item.title}}</span>
                                                    <p class="text-truncate">{{item.description}}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="container d-flex align-items-center justify-content-center">
                                            <button v-if="moreDataPort.blog" v-on:click="loadBlog" class="btn btn-small btn-dark m-2 rounded-pill"><i class="fas fa-angle-right"></i></button>
                                            <button v-else v-on:click="loadBlog(true)" class="btn btn-small btn-dark m-2 rounded-pill"><i class="fas fa-angle-left"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between px-4">
                                    <i data-bs-toggle="tooltip" data-bs-placement="top" title="Retroceder" v-on:click="scrollbarPostsBlogBack" class="cursor fs-1 fas fa-angle-double-left"></i>
                                    <i data-bs-toggle="tooltip" data-bs-placement="top" title="Avançar" v-on:click="scrollbarPostsBlogMore" class="cursor fs-1 fas fa-angle-double-right"></i>
                                </div>
                            </div>
                        </div>


                        <!-- View Post Blog -->
                        <div class="containerViewPostBlog position-fixed top-50 start-50 translate-middle d-none">
                        </div>
                        <div v-if="(blog.selectedPost != null)" class="position-fixed top-50 start-50 translate-middle viewPostBlog p-4 shadow rounded d-none customScrollbar-y">
                            <div class="button-close-post-blog d-flex align-items-center justify-content-end p-3">
                                <button v-on:click="closeViewPostBlog" type="button" class="fs-4 btn-close float-end" aria-label="Close"></button>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="image-view-post-blog col-md-6 col-sm-12 col-xs-12 col-lg-6">
                                        <img :src="blog.selectedPost.srcImg?blog.selectedPost.srcImg:''" :alt="blog.selectedPost.title?blog.selectedPost.title:''" class="img-fluid img-thumbnail" :alt="blog.selectedPost.title?blog.selectedPost.title:''">
                                    </div>
                                    <div class="col">
                                        <h1 class="text-dark p-1">
                                            {{blog.selectedPost.title?blog.selectedPost.title:''}}
                                        </h1>
                                        <p>{{blog.selectedPost.description?blog.selectedPost.description:''}}
                                        </p>
                                    </div>
                                </div>
                                <hr />
                                <div class="p-2 mt-4">
                                    <p>{{blog.selectedPost.content?blog.selectedPost.content:''}}</p>
                                    <div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- View Post Blog -->
                </section>
                <!-- Blog -->

                <!-- Orçamento -->
                <section id="section-orcamento" class="container mt-5 fw-normal">
                    <div>
                        <div class="sub-section-title mb-5">
                            <span class="undeline fw-lighter fs-7">Pedir um orçamento</span>
                        </div>
                        <div id="contents-orcamento" class="row mt-3 px-3 py-5 contents-blog position-relative">
                            <div class="text-center">
                                <h1 class="fs-4">Faça um orçamento para o seu site agora</h1>
                            </div>
                            <div class="container-fluid justify-content-center row">
                                <div class="col-auto mt-3 text-center">
                                    <img class="img-fluid" src="assets/img/developing.png" alt="developing">
                                </div>
                                <div class="col-auto mt-5 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0 d-flex justify-content-center flex-column">
                                    <h2 class="fs-5 mb-3">Crie seu orçamento agora</h2>
                                    <button id="openFormOrc" v-on:click="openViewOrcamento" data-bs-toggle="tooltip" data-bs-placement="left" title="Preencha um formulário para calcular o seu orçamento" type="button" class="mt-3 btn btn-lg btn-outline-dark">Abrir formulário <i class="fas fa-hand-point-up"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="viewOrcamento d-none position-fixed top-50 start-50 translate-middle p-4 shadow rounded customScrollbar-y"> -->
                        <div class="viewOrcamento position-fixed top-50 start-50 translate-middle p-4 shadow rounded customScrollbar-y">
                            <div class="button-close-post-blog d-flex align-items-center justify-content-end p-3">
                                <button v-on:click="closeViewOrcamento" type="button" class="fs-4 btn-close float-end" aria-label="Close"></button>
                            </div>
                            <!-- Formulário de Orçamento -->
                            <div>
                                <div class="accordion" id="accordionInformacoesPessoais">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="informacoesPessoais-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#InformacoesPessoais-collapseOne" aria-expanded="true" aria-controls="informacoesPessoais-collapseOne">
                                                Informações Pessoais
                                            </button>
                                        </h2>
                                        <div id="InformacoesPessoais-collapseOne" class="accordion-collapse collapse" aria-labelledby="informacoesPessoais-headingOne">
                                            <div class="accordion-body">

                                                <form class="row">
                                                    <div class="col-6 mt-2">
                                                        <div class="form-floating">
                                                            <input type="text" name="first_name" class="form-control" id="nomeOrcamento" placeholder="Seu Nome">
                                                            <label for="nomeOrcamento">Nome*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-2">
                                                        <div class="form-floating">
                                                            <input type="text" name="second_name" class="form-control" id="sobrenomeOrcamento" placeholder="Seu Sobrenome">
                                                            <label for="sobrenomeOrcamento">Sobrenome*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-2">
                                                        <div class="form-floating">
                                                            <input type="email" name="email" class="form-control" id="emailOrcamento" placeholder="Seu e-mail">
                                                            <label for="emailOrcamento">E-mail*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 mt-2">
                                                        <div class="form-floating">
                                                            <select v-model="dadosFormOrcamento.tipoIdentificacao" id="tipoIdentificacao" name="tipoIdentificacao" class="form-select form-control" aria-label="Default select example">
                                                                <option value="0" selected>Tipo</option>
                                                                <option value="1">CPF</option>
                                                                <option value="2">CNPJ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mt-2">
                                                        <div v-if="dadosFormOrcamento.tipoIdentificacao != 0" class="form-floating">
                                                            <input v-if="dadosFormOrcamento.tipoIdentificacao == 1" name="cpf" class="form-control" id="cpfOrcamento" placeholder="Seu CPF">
                                                            <input v-if="dadosFormOrcamento.tipoIdentificacao == 2" name="cnpj" class="form-control" id="cnpjOrcamento" placeholder="Seu CNPJ">
                                                            <label v-if="dadosFormOrcamento.tipoIdentificacao == 1" for="cpfOrcamento">CPF*</label>
                                                            <label v-if="dadosFormOrcamento.tipoIdentificacao == 2" for="cnpjOrcamento">CNPJ*</label>
                                                        </div>
                                                        <div v-else class="form-floating">
                                                            <input disabled class="form-control" placeholder="Seu código de identificação">
                                                            <label for="cellOrcamento">Identificação*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-2">
                                                        <div class="form-floating">
                                                            <input type="tel" name="celular" class="form-control" id="cellOrcamento" placeholder="Seu Telefone/Celular">
                                                            <label for="cellOrcamento">(DDD) /Celular*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-2">
                                                        <div class="form-floating">
                                                            <input @keyup="buscarCep" type="text" name="cep" class="form-control" id="cepOrcamento" placeholder="Seu Cep">
                                                            <label for="cepOrcamento">Cep*</label>
                                                            <div id="cepHelp" class="form-text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-2">
                                                        <div class="form-floating">
                                                            <input v-model="dadosFormOrcamento.bairro" type="text" class="form-control" id="bairroOrcamento" placeholder="Seu Bairro">
                                                            <label for="sobrenomeOrcamento">Bairro</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-2">
                                                        <div class="form-floating">
                                                            <input v-model="dadosFormOrcamento.logradouro" type="text" class="form-control" id="logradouroOrcamento" placeholder="Seu Logradouro">
                                                            <label for="sobrenomeOrcamento">Logradouro</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-2">
                                                        <div class="form-floating">
                                                            <input v-model="dadosFormOrcamento.estado" type="text" class="form-control" id="estadoOrcamento" placeholder="Seu Estado">
                                                            <label for="sobrenomeOrcamento">Estado</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-2">
                                                        <div class="form-floating">
                                                            <input v-model="dadosFormOrcamento.cidade" type="text" class="form-control" id="cidadeOrcamento" placeholder="Sua Cidade">
                                                            <label for="sobrenomeOrcamento">Cidade</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mt-2">
                                        <h2 class="accordion-header " id="dadosEmpresa-headingTwo">
                                            <button disabled class="accordion-button" type="button" data-bs-toggle="collapse" :data-bs-target="dadosFormOrcamento.tipoIdentificacao == 2 ? '#dadosEmpresa-collapseTwo' : ''" aria-expanded="true" aria-controls="dadosEmpresa-collapseTwo">
                                                Dados da Empresa <i class="fa-duotone fa-lock"></i>
                                            </button>
                                        </h2>
                                        <div id="dadosEmpresa-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="dadosEmpresa-headingTwo">
                                            <div class="accordion-body">

                                                <form class="row">
                                                    <div class="col-6 mt-2">
                                                        <div class="form-floating">
                                                            <input type="text" name="first_name" class="form-control" id="nomeOrcamento" placeholder="Seu Nome">
                                                            <label for="nomeOrcamento">Nome*</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- Orçamento -->
            </div>
        </main>

        <div id="preloader">
            <preloader></preloader>
        </div>
    </div>

</body>
<script src="frameworks/jQuery-3.6/jquery-3.6.0.min.js"></script>
<script src="frameworks/jQueryMask/dist/jquery.mask.min.js"></script>
<script src="frameworks/Bootstrap-5.0/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</script>
<script src="frameworks/fontawesome/fontawesome.js" crossorigin="anonymous">
</script>
<script src="frameworks/vue-js/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="js/gooeyTextMorphSnippet.js"></script>
<script src="js/script.js"></script>
<script src="js/components/vue-componenst.js"></script>
<script src="js/home/script-vue-home.js"></script>

</html>