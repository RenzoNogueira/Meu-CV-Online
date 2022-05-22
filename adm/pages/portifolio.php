<!DOCTYPE html>
<html lang="pt-br">
<?php
require "../../php/constantes.php";
require "../../php/host/verifica_login.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jquery themes -->
    <link rel="stylesheet" href="../../frameworks/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../../frameworks/Bootstrap-5.0/Lux-Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../frameworks/jquery-confirm-v3.3.4/jquery-confirm.min.css">
    <link rel="stylesheet" href="../../css/fonts/fonts.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../css/style-adm.css">
    <title><?php echo HOME; ?></title>
</head>

<body>
    <div id="app">
        <nav class="navbar position-fixed w-100">
            <!-- Importa a nav-bar -->
            <?php require "../../pages/admimPage/nav-bar.html"; ?>
        </nav>
        <main>
            <div class="row">
                <div class="col-1 position-fixed">
                    <!-- Importa a menu-lateral -->
                    <?php require "../../pages/admimPage/menu-lateral.html"; ?>
                </div>
                <div class="dashbody px-5 col-11 pt-5">
                    <div class="row">
                        <div class="col-8">
                            <button class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#modal-cadastrar-portifolio">
                                <i class="fas fa-plus"></i>
                                Cadastrar novo portifólio
                            </button>
                        </div>
                        <div class="col-4">
                            <h3 class="text-center">Quantidade de portifólios: {{portifolios.length}}</h3>
                        </div>
                    </div>

                    <!-- Galeria de portifólios -->
                    <div class="row mt-5">
                        <!-- card com images dos portifólios em v-for portifolios -->
                        <!-- se não existir imagem criar uma div simulando a imagem -->
                        <div class="col-4" v-for="portifolio in portifolios">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <!-- imagem. se não existir: uma div -->
                                    <div  v-if="portifolio.srcImg" class="position-relative">
                                        <img @click="openDetalhes(portifolio)" :src="'../../' + portifolio.srcImg" class="card-img-top rounded" :alt="portifolio.title    ">
                                        <div class="position-absolute p-2" style="top: 0; left: 0;">
                                            <h5 class="text-white">{{portifolio.title}}</h5>
                                        </div>
                                        <div class="position-absolute p-2" style="top: 0; right: 0;">
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-portifolio" @click="editarPortifolio(portifolio)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" @click="excluirPortifolio(portifolio)">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div v-else>
                                        <div class="card-img-top position-relative rounded" style="height: 200px; background: radial-gradient(circle, rgba(255,255,255,0.5) 0%, rgba(0,0,0,0.5) 100%);">
                                            <div @click="openDetalhes(portifolio)" class="d-flex justify-content-center align-items-center" style="height: 100%;">
                                                <i class="fas fa-image fa-2x"></i>
                                            </div>
                                            <div class="position-absolute p-2" style="top: 0; left: 0;">
                                                <h5 class="text-white">{{portifolio.title}}</h5>
                                            </div>
                                            <div class="position-absolute p-2" style="top: 0; right: 0;">
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-portifolio" @click="editarPortifolio(portifolio)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm" @click="excluirPortifolio(portifolio)">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal cadastrar do portifólio -->
                <div class="modal fade" id="modal-cadastrar-portifolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo portifólio</h5>
                                <button type="button" class="close btn tbn-link" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fs-4 fa-times"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="titulo">Título</label>
                                            <input type="text" class="form-control" id="titulo" v-model="portifolio.title">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="form-group">
                                            <label for="descricao">Descrição</label>
                                            <textarea class="form-control" id="descricao" v-model="portifolio.description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="form-group">
                                            <label for="imagem">Imagem</label>
                                            <input type="file" class="form-control-file" id="imagem" @change="onFileChange">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mt-4">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" @click="salvarPortifolio">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detalhes do portifólio selecionado -->
                <div class="modal fade" id="modal-detalhes-portifolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detalhes do portifólio</h5>
                                <button type="button" class="close btn tbn-link" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fs-4 fa-times"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- visulaizar delatlhes do portifolio -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="titulo">Título</label>
                                            <input type="text" class="form-control" id="titulo" v-model="portifolioSelecionado.title" disabled>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="descricao">Descrição</label>
                                            <textarea class="form-control" id="descricao" v-model="portifolioSelecionado.description" disabled></textarea>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="imagem">Imagem</label>
                                            <div v-if="portifolioSelecionado.srcImg" class="card">
                                                <div class="card-body">
                                                    <img :src="'../../' + portifolioSelecionado.srcImg" :alt="portifolioSelecionado.title" class="card-img-top img-fluid">
                                                </div>
                                            </div>
                                            <div v-else class="d-flex justify-content-center flex-column align-items-center" style="height: 100%;">
                                                <i class="fas fa-image fa-2x"></i>
                                                <p class="text-muted">Nenhuma imagem</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mt-4">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Editar o portifólio -->
                <div class="modal fade" id="modal-editar-portifolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar portifólio</h5>
                                <button type="button" class="close btn tbn-link" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fs-4 fa-times"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="titulo">Título</label>
                                            <input type="text" class="form-control" id="titulo" v-model="portifolioEditar.title">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="form-group">
                                            <label for="descricao">Descrição</label>
                                            <textarea class="form-control" id="descricao" v-model="portifolioEditar.description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="form-group">
                                            <label for="imagem">Imagem</label>
                                            <input type="file" class="form-control-file" id="imagem" @change="onFileChange">
                                        </div>
                                        <img :src="'../../' + portifolioEditar.srcImg" :alt="portifolioEditar.title" class="card-img-top img-fluid mt-4" v-if="portifolioEditar.srcImg">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mt-4">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary" @click="editarPortifolio">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Cria uma bolha flutuante de chatbot -->
                    <?php require "../../pages/admimPage/chatbot.html"; ?>
        </main>
    </div>

    
    <script src="../js/confirm-exit.js"></script>
    <script src="../../frameworks/jQuery-3.6/jquery-3.6.0.min.js"></script>
    <script src="../../frameworks/jquery-ui/jquery-ui.min.js"></script>
    <script src="../../frameworks/jQueryMask/dist/jquery.mask.min.js"></script>
    <script src="../../frameworks/jquery-confirm-v3.3.4/jquery-confirm.min.js"></script>
    <!-- jquery ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/draggable/1.0.0-beta.12/draggable.bundle.js"></script>
    <script src="../../frameworks/Bootstrap-5.0/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/274af9ab8f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <!-- importar jquery-draggable cdn  -->

    <!-- modulo -->
    <script src="../js/animate.js" type="text/javascript"></script>
    <script>
        // vue js
        var app = new Vue({
            el: '#app',
            data: {
                portifolio: [],
                portifolioSelecionado: [],
                portifolioEditar: [],
                portifolios: [{
                        titulo: 'teste',
                        descricao: 'teste',
                        imagem: ''
                    },
                    {
                        titulo: 'teste',
                        descricao: 'teste',
                        imagem: ''
                    },
                    {
                        titulo: 'teste',
                        descricao: 'teste',
                        imagem: ''
                    },
                ],
            },
            watch: {
                //    
            },
            methods: {
                salvarPortifolio: function() {
                    var formData = new FormData();
                    formData.append('titulo', this.portifolio.title);
                    formData.append('descricao', this.portifolio.description);
                    formData.append('imagem', this.portifolio.srcImg);
                    $.ajax({
                        url: '../../controller/portifolio/cadastrar.php',
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            console.log(data);
                            $('#modal-cadastrar-portifolio').modal('hide');
                            location.reload();
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                },
                onFileChange: function(e) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    this.createImage(files[0]);
                },
                openDetalhes: function(portifolio) {
                    this.portifolioSelecionado = portifolio;
                    $('#modal-detalhes-portifolio').modal('show');
                },
                editarPortifolio: function(portifolio) {
                    this.portifolioEditar = portifolio;
                    $('#modal-editar-portifolio').modal('show');
                },
                excluirPortifolio: function(portifolio) {
                    $.confirm({
                        title: 'Excluir Portifolio',
                        content: 'Deseja realmente excluir o portifolio?',
                        buttons: {
                            confirmar: {
                                text: 'Sim',
                                btnClass: 'btn-blue',
                                action: function() {
                                    $.ajax({
                                        url: '../../controller/portifolio/excluir.php',
                                        type: 'POST',
                                        data: {
                                            id: portifolio.id
                                        },
                                        success: function(data) {
                                            console.log(data);
                                            location.reload();
                                        },
                                        error: function(data) {
                                            console.log(data);
                                        }
                                    });
                                }
                            },
                            cancelar: {
                                text: 'Não',
                                btnClass: 'btn-red',
                                action: function() {
                                    $.alert('Cancelado!');
                                }
                            }
                        }
                    });
                },
                loadPortifolios: function() {
                    SELF = this
                    $.post("../../php/load-portifolio.php", {
                            // data: {
                            //     positionAfterItem: this.portifolio.positionAfterItem
                            // }
                        })
                        .done(function(data) {
                            data = JSON.parse(data)
                            console.log(data);
                            SELF.portifolios = data;
                        });
                },
            },

            beforeMount: function() {
                // 
            },
            mounted: function() {
                this.loadPortifolios()
                animate() // Função externa
            }
        })
    </script>
</body>

</html>