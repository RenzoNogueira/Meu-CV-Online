// Animação de entrada
const animate = function() {
    // animar os cards com efeito de giro na entrada

    if ($('.card').length > 0) { // Veridica se existe cards
        $(".card").addClass("animated bounceInDown");
        // Animar o titulo com efeito de giro na entrada
        $(".card-title").addClass("animated bounceInDown");
    }
    // Anima o menu lateral
    $(".menu-lateral").addClass("animated bounceInLeft");
    $(".menu-lateral").hover(function() {
        $("main .dashbody .row").animate({
            paddingLeft: "180px"
        }, 500);
    }, function() {
        // se o mouse não estiver em cima do elemento
        if (!$(this).is(":hover")) {
            // deslizar para a direira para abrir espaço
            $("main .dashbody .row").animate({
                paddingLeft: paddindDashLeft
            }, 500);
        }
    });

    const paddindDashLeft = $("main .dashbody .row").css("padding-left");
    const texts = $(".btn-text-lt")
    $(".btn-link-lt").each(function() {
        $(this).hover(function() {
            // pega o index do elemento
            var index = $(this).index();
            // Mostra o texto equivalente
            texts.eq(index).removeClass("d-none");
        }, function() {
            // pega o index do elemento
            var index = $(this).index();
            // Esconde o texto equivalente
            setTimeout(function() {
            }, 500);
            texts.eq(index).addClass("d-none");
        });
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
    if ($('.chatbot').length > 0) {
        $(".chat-bubble").draggable({
            handle: ".chat-bubble-header"
        });
    }
}