<!DOCTYPE html>
<html lang="pt-br">
<?php
require "../php/constantes.php";
require "../php/host/verifica_login.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jquery themes -->
    <link rel="stylesheet" href="../frameworks/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../frameworks/Bootstrap-5.0/Lux-Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../frameworks/jquery-confirm-v3.3.4/jquery-confirm.min.css">
    <link rel="stylesheet" href="../css/fonts/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/style-adm.css">
    <title><?php echo HOME; ?></title>
</head>

<body>
    <div id="app">
        <nav class="navbar position-fixed w-100">
            <!-- Importa a nav-bar -->
            <?php require "../pages/admimPage/nav-bar.html"; ?>
        </nav>
        <main>
            <div class="row">
                <div class="col-1 position-fixed">
                    <!-- Importa a menu-lateral -->
                    <?php require "../pages/admimPage/menu-lateral.html"; ?>
                </div>
                <div class="dashbody px-5 col-11 pt-5">
                    <!-- Montar grid de cards -->
                    <div class="row">
                        <div class="col-sm-12 col-12 col-lg-6 col-xl-4 col-xxl-4 mt-4">
                            <div style="z-index: 10!important;" class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <!-- icone de carregamento -->
                                            <h5 class="card-title">Total de visitas <span v-if="loadingChart" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></h5>
                                        </div>
                                        <!-- Dropdown para ocultar os demais períodos -->
                                        <div style="transform: translateY(-15px)!important;" class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle bg-transparent" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a @click="periodoEscolhido = 'week'" class="dropdown-item" href="#">Essa Semana</a>
                                                <a @click="periodoEscolhido = 'month'" class="dropdown-item" href="#">Este mês</a>
                                                <a @click="periodoEscolhido = 'months'" class="dropdown-item" href="#">Este ano</a>
                                                <a @click="periodoEscolhido = 'years'" class="dropdown-item" href="#">Ultimos dez anos</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Cadastrar novo produto</h5>
                                    <p class="card-text">Cadastre um novo produto para acessar o sistema.</p>
                                    <a href="cadastrar-produto.php" class="btn btn-primary">Cadastrar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Cadastrar novo pedido</h5>
                                    <p class="card-text">Cadastre um novo pedido para acessar o sistema.</p>
                                    <a href="cadastrar-pedido.php" class="btn btn-primary">Cadastrar</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Cria uma bolha flutuante de chatbot -->
            <?php require "../pages/admimPage/chatbot.html"; ?>
        </main>
    </div>

    <script src="js/confirm-exit.js"></script>
    <script src="../frameworks/jQuery-3.6/jquery-3.6.0.min.js"></script>
    <script src="../frameworks/jquery-ui/jquery-ui.min.js"></script>
    <script src="../frameworks/jQueryMask/dist/jquery.mask.min.js"></script>
    <script src="../frameworks/jquery-confirm-v3.3.4/jquery-confirm.min.js"></script>
    <!-- jquery ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/draggable/1.0.0-beta.12/draggable.bundle.js"></script>
    <script src="../frameworks/Bootstrap-5.0/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/274af9ab8f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <!-- importar jquery-draggable cdn  -->

    <!-- modulo -->
    <script src="js/animate.js" type="text/javascript"></script>
    <script>
        // vue js
        var app = new Vue({
            el: '#app',
            data: {
                loadingChart: false,
                totalVisitas: {
                    allViews: [],
                    week: 0,
                    month: 0,
                    months: 0,
                    years: 0
                },
                chartViewsIntance: null, // instancia do grafico de views
                periodoEscolhido: "week", // Predefinido como esta semana.
                viewsPeriodoEscolhido: 0
            },
            watch: {
                periodoEscolhido: function() {
                    SELF = this
                    switch (SELF.periodoEscolhido) {
                        case "week":
                            SELF.viewsPeriodoEscolhido = SELF.totalVisitas.week
                            break;
                        case "month":
                            SELF.viewsPeriodoEscolhido = SELF.totalVisitas.month
                            break;
                        case "months":
                            SELF.viewsPeriodoEscolhido = SELF.totalVisitas.months
                            break;
                        case "years":
                            SELF.viewsPeriodoEscolhido = SELF.totalVisitas.years
                            break;
                    }
                    SELF.initializeChartViews()
                }
            },
            methods: {
                // Pegar total de visualizações do dia com post
                getTotalVisitas: function() {
                    SELF = this
                    SELF.loadingChart = true
                    // Envia o periodo para o servidor
                    $.post("../php/views/get-total-views.php", {}).done(function(data) {
                        data = JSON.parse(data);
                        // console.log(data)
                        SELF.totalVisitas.allViews = data
                        SELF.totalVisitas.week = Object.values(data.semana).reduce((a, b) => a + b, 0)
                        SELF.totalVisitas.month = Object.values(data.mes).reduce((a, b) => a + b, 0)
                        SELF.totalVisitas.months = Object.values(data.meses).reduce((a, b) => a + b, 0)
                        SELF.totalVisitas.years = Object.values(data.anos).reduce((a, b) => a + b, 0)
                        // Atualiza o gráfico
                        // Inicializa o gráficp a cada 20 segundos
                        SELF.initializeChartViews()
                    });
                },

                // Gráficos
                initializeChartViews: function() {
                    SELF = this
                    if (SELF.chartViewsIntance) {
                        SELF.chartViewsIntance.destroy()
                    }
                    const LABELS = []
                    let periodo = null
                    let countViews = []
                    switch (SELF.periodoEscolhido) {
                        case "week":
                            periodo = SELF.totalVisitas.allViews.semana
                            break;
                        case "month":
                            periodo = SELF.totalVisitas.allViews.mes
                            break;
                        case "months":
                            periodo = SELF.totalVisitas.allViews.meses
                            break;
                        case "years":
                            periodo = SELF.totalVisitas.allViews.anos
                            break;
                    }
                    // Inicializa os label com os valores da variável
                    Object.keys(periodo).forEach(function(key) {
                        LABELS.push(key)
                        countViews.push(periodo[key])
                    });
                    // Cria o gráfico de views
                    var ctx = document.getElementById('myChart').getContext('2d');
                    SELF.chartViewsIntance = new Chart(ctx, {
                        type: 'line',
                        data: {
                            // Todos os meses
                            labels: LABELS,
                            datasets: [{
                                label: 'Visualizações',
                                data: countViews,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(138, 129, 124)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            animations: {
                                tension: {
                                    duration: 2000,
                                    easeInOutBounce: 'linear',
                                    from: 1,
                                    to: 0,
                                    loop: true
                                }
                            },
                            plugins: {
                                title: {
                                    display: true,
                                    text: SELF.periodoEscolhido
                                }
                            }
                        }
                    });
                    SELF.loadingChart = false
                }
            },

            beforeMount: function() {
                SELF = this
                // Pega total de visitas
                this.getTotalVisitas();
                setInterval(function() {
                    SELF.getTotalVisitas();
                }, 20000)
            },
            mounted: function() {
                animate() // Função externa
            }
        })
    </script>
</body>

</html>