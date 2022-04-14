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
    <!-- jquery themes -->
    <link rel="stylesheet" href="../frameworks/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../frameworks/Bootstrap-5.0/Lux-Bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/style-adm.css">
    <title><?php echo HOME; ?></title>
</head>

<body class="overflow-hidden">
    <div id="app">
        <nav class="navbar">
            <!-- Importa a nav-bar -->
            <?php require "../pages/admimPage/nav-bar.html"; ?>
        </nav>
        <main>
            <div class="row">
                <div class="col-1">
                    <!-- Importa a menu-lateral -->
                    <?php require "../pages/admimPage/menu-lateral.html"; ?>
                </div>
                <div class="dashbody px-5 col-11 pt-5">
                    <!-- Montar grid de cards -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total de visitas</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="card-subtitle mt-2 text-muted">{{periodoEscolhido}}</h6>
                                            <p class="card-text">{{viewsPeriodoEscolhido}} <span class="text-muted fs-5 fw-bold text-bold">views</span></p>
                                        </div>
                                        <!-- Dropdown para ocultar os demais períodos -->
                                        <div class="col-md-6">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Período
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a @click="periodoEscolhido = 'today'" class="dropdown-item" href="#">Hoje</a>
                                                    <a @click="periodoEscolhido = 'yesterday'" class="dropdown-item" href="#">Ontem</a>
                                                    <a @click="periodoEscolhido = 'week'" class="dropdown-item" href="#">Semana</a>
                                                    <a @click="periodoEscolhido = 'month'" class="dropdown-item" href="#">Mês</a>
                                                    <a @click="periodoEscolhido = 'year'" class="dropdown-item" href="#">Ano</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Cadastrar novo produto</h5>
                                    <p class="card-text">Cadastre um novo produto para acessar o sistema.</p>
                                    <a href="cadastrar-produto.php" class="btn btn-primary">Cadastrar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Cadastrar novo pedido</h5>
                                    <p class="card-text">Cadastre um novo pedido para acessar o sistema.</p>
                                    <a href="cadastrar-pedido.php" class="btn btn-primary">Cadastrar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total de visitas</h5>
                                    <div>
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cria uma bolha flutuante de chatbot -->
            <?php require "../pages/admimPage/chatbot.html"; ?>
        </main>
    </div>

    <script src="../frameworks/jQuery-3.6/jquery-3.6.0.min.js"></script>
    <script src="../frameworks/jquery-ui/jquery-ui.min.js"></script>
    <script src="../frameworks/jQueryMask/dist/jquery.mask.min.js"></script>
    <!-- jquery ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/draggable/1.0.0-beta.12/draggable.bundle.js"></script>
    <script src="../frameworks/Bootstrap-5.0/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/274af9ab8f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <!-- importar jquery-draggable cdn  -->

    <script>
        // vue js
        var app = new Vue({
            el: '#app',
            data: {
                totalVisitas: {
                    today: 0,
                    yesterday: 0,
                    lastWeek: 0,
                    lastMonth: 0,
                    lastYear: 0
                },
                periodoEscolhido: "today", // Predefinido como hoje
                viewsPeriodoEscolhido: 0
            },
            watch: {
                periodoEscolhido: function() {
                    SELF = this
                    switch (SELF.periodoEscolhido) {
                        case "today":
                            SELF.viewsPeriodoEscolhido = SELF.totalVisitas.today
                            break;
                        case "yesterday":
                            SELF.viewsPeriodoEscolhido = SELF.totalVisitas.yesterday
                            break;
                        case "week":
                            SELF.viewsPeriodoEscolhido = SELF.totalVisitas.lastWeek
                            break;
                        case "month":
                            SELF.viewsPeriodoEscolhido = SELF.totalVisitas.lastMonth
                            break;
                        case "year":
                            SELF.viewsPeriodoEscolhido = SELF.totalVisitas.lastYear
                            break;
                    }
                }
            },
            methods: {
                // Pegar total de visualizações do dia com post
                getTotalVisitas: function() {
                    SELF = this
                    // Envia o periodo para o servidor
                    $.post("../php/views/get-total-views.php", {
                        periodo: {
                            // today: "today",
                            // yesterday: "yesterday",
                            // lastWeek: "lastWeek",
                            // lastMonth: "lastMonth",
                            lastYear: "lastYear"
                        }
                    }).done(function(data) {
                        data = JSON.parse(data);
                        // Atualiza todos os intervalos
                        SELF.totalVisitas = []
                        // procura o mes atual dentro do array
                        Object.keys(data).forEach(function(key) {
                            if (key == new Date().getMonth()) {
                                SELF.totalVisitas = data[key]
                                // console.log(SELF.totalVisitas)
                                return true
                            }
                            // SELF.totalVisitas[key] = data[key]
                        })
                        console.log(data)
                        SELF.totalVisitas.push(data["January"].length)
                        SELF.totalVisitas.push(data["February"].length)
                        SELF.totalVisitas.push(data["March"].length)
                        SELF.totalVisitas.push(data["April"].length)
                        SELF.totalVisitas.push(data["May"].length)
                        SELF.totalVisitas.push(data["June"].length)
                        SELF.totalVisitas.push(data["July"].length)
                        SELF.totalVisitas.push(data["August"].length)
                        SELF.totalVisitas.push(data["September"].length)
                        SELF.totalVisitas.push(data["October"].length)
                        SELF.totalVisitas.push(data["November"].length)
                        SELF.totalVisitas.push(data["December"].length)

                        // Atualiza o gráfico
                        // SELF.viewsPeriodoEscolhido = SELF.totalVisitas[SELF.totalVisitas.length - 1]
                        // POPULA O ARRAY DE VISUALIZAÇÕES
                        SELF.initializeChartViews(SELF.totalVisitas)

                    });
                },
                animate: function() {
                    SELF = this
                    // Animação de entrada
                    // animar os cards com efeito de giro na entrada
                    $(".card").addClass("animated bounceInDown");
                    // Animar o titulo com efeito de giro na entrada
                    $(".card-title").addClass("animated bounceInDown");
                    // Anima o menu lateral
                    $(".menu-lateral").addClass("animated bounceInLeft");

                    $(".menu-lateral").hover(function() {
                        $(".dashbody").addClass("dashboard-body-escurecido");
                    }, function() {
                        $(".dashbody").removeClass("dashboard-body-escurecido");
                    });
                    // Ao efetuar focar na barra de pesquisa type search, o dashbody irá escurecer. Quando tirar o focus o dashbody voltará ao normal
                    $("#search-bar").focus(function() {
                        $(".dashbody").addClass("dashboard-body-escurecido");
                    });
                    //  Quando search-bar perder o foco
                    $("#search-bar").blur(function() {
                        $(".dashbody").removeClass("dashboard-body-escurecido");
                    });
                    // Poder arrastar o chatbot com o mouse
                    $(".chat-bubble").draggable({
                        handle: ".chat-bubble-header"
                    });
                },
                initializeChartViews: function(data) {
                    SELF = this
                    const LABELS = []
                    legthMont = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate()
                    // Popula o array de labels
                    for (let index = 1; index <= legthMont; index++) {
                        LABELS.push(index)
                    }
                    console.log(LABELS)
                    // Cria o gráfico de views
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            // Todos os meses
                            labels:LABELS,
                            datasets: [{
                                label: 'Visualizações',
                                data: data,
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
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                }

            },
            beforeMount: function() {
                // Pega total de visitas
                this.getTotalVisitas();
            },
            mounted: function() {
                SELF = this;
                // Pega total de visitas
                // SELF.getTotalVisitas();
                // console.log("teste")
                // Ao efetuar hover no menu-lateral, o dashbody irá escurecer
                SELF.animate();
                // this.initializeChartViews();
            }
        })
    </script>
</body>

</html>