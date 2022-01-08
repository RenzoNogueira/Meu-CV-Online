// Vue Js
var app = new Vue({
    el: '#app',
    data: {
        moreDataPort: {
            portifolio: true,
            blog: true
        },
        portifolio: {
            positionAfterItem: 0,
            data: []
        },
        blog: {
            positionAfterItem: 0,
            data: [],
            selectedPost: null
        },
        education: [{
            modelo: "Conclusão do Ensino médio.",
            periodo: "2017 - 2018",
            local: "CED 01 do Riacho Fundo II, Brasília / DF",
            descricao: "Conclusão do ensino médio."
        },
        {
            modelo: "Técnico em informática.",
            periodo: "2017 - Cursando",
            local: "Escola Técnica de Brasília, Brasília / DF",
            descricao: "4° Semestre terminado, procurando estágio em técnico em informática, ou qualquer área que envolva informática."
        }
        ],
        trabalho: [{
            modelo: "Octopag tecnologias e intermediações de negócios.",
            periodo: "2019 - 2020",
            local: "Brasília / DF",
            descricao: "Atuou como desenvolvedor WEB. Contribuiu no desenvolvimento de um aplicativo de pagamento digital denominado “Octo pag” (disponível na play store e app store), e seus respectivos dashboards para administração. Usando as seguintes tecnologias de desenvolvimento: Html, CSS, Javascript, PHP, Banco de dados Mariadb, Framework Cordova, Framework 7, Framework Vue JS, Node JS, NPM, Git, Laragon, Github."
        },
        {
            modelo: "Trídia criação.",
            periodo: "2020 - 2020",
            local: "Brasília / DF",
            descricao: "Atuou como desenvolvedor de sites web em linguagem PHP com o framework Joomla."
        }
        ],
        dadosFormOrcamento: {
            tipoIdentificacao: 0,
            cep: "",
            estado: "",
            cidade: "",
            bairro: "",
            logradouro: ""
        }
    },
    methods: {
        buscarCep: async function (input) {
            const SELF = this
            const CEP = input.target.value
            if (CEP.length == 9) {
                $.get(`https://viacep.com.br/ws/${CEP}/json/`, function (dataCep) {
                    $.get(`https://servicodados.ibge.gov.br/api/v1/localidades/municipios/${dataCep.ibge}`, function (dataMun) {
                        console.log(dataCep)
                        console.log(dataMun)
                        SELF.dadosFormOrcamento.estado = dataMun["regiao-imediata"]["regiao-intermediaria"].nome
                        SELF.dadosFormOrcamento.cidade = dataMun.nome
                        SELF.dadosFormOrcamento.bairro = dataCep.bairro
                        SELF.dadosFormOrcamento.logradouro = dataCep.logradouro
                    })
                })

            }
        },
        bloquearScroll: function () {
            var scrollPosition = [
                self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            ];
            var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
            html.data('scroll-position', scrollPosition);
            html.data('previous-overflow', html.css('overflow'));
            html.css('overflow', 'hidden');
            window.scrollTo(scrollPosition[0], scrollPosition[1]);
        },
        desbloquearScroll: function () {
            var html = jQuery('html');
            var scrollPosition = html.data('scroll-position');
            html.css('overflow', html.data('previous-overflow'));
            window.scrollTo(scrollPosition[0], scrollPosition[1])
        },
        // Nav Menu
        togleMobileMenu: function () {
            navigator.vibrate(100);
            const menu = document.querySelector('.mobile-menu')
            const links = document.querySelector('.mobile-menu-links')
            menu.classList.toggle('open')
            if (menu.classList.contains('open')) {
                menu.classList.toggle('d-none')
                links.classList.toggle('d-none')
                $('.mobile-menu').animate({
                    left: 0
                }, 250, function () { })
                $('.mobile-menu-links').animate({
                    left: 0
                }, 350, function () { })
            } else {
                $('.mobile-menu').animate({
                    left: '-100vh'
                }, 250, function () { })
                $('.mobile-menu-links').animate({
                    left: '-100vh'
                }, 250, function () { })
                setTimeout(function () {
                    menu.classList.toggle('d-none')
                    links.classList.toggle('d-none')
                }, 250)
            }
        },

        onScroll: function () {
            const menu = document.querySelector('.nav-menu')
            if (window.scrollY > 50) {
                $('nav').css({
                    backgroundColor: 'white',
                    boxShadow: '#531cb3 0px 2px 12px -10px'
                })
                $('nav').addClass('scrollOn')
                $('#links-menu').children().children().removeClass('text-light').addClass('text-dark')
                $('nav').children().removeClass('text-light').addClass('text-dark')
                $('nav').children().removeClass('text-light').addClass('text-dark')
                $('#links-menu').children().css({
                    top: -15
                })
                $('nav').children('i').css({
                    top: -22
                })
            } else {
                $('nav').removeClass('scrollOn')
                $('#links-menu').children().children().removeClass('text-dark').addClass('text-light')
                $('nav').children().removeClass('text-dark').addClass('text-light')
                $('nav').css({
                    backgroundColor: 'transparent',
                    boxShadow: 'none'
                })
                $('#links-menu').children().css({
                    top: 0
                })
                $('nav').children('i').css({
                    top: 0
                })
            }
        },
        // Nav Menu

        // Portifolio
        loadPortifolio: function (clear) {
            if (clear == true) {
                app.portifolio.data = []
                app.moreDataPort.portifolio = true
                app.portifolio.positionAfterItem = 1
            }
            if (this.moreDataPort.portifolio) {
                $.post("php/load-portifolio.php", {
                    data: {
                        positionAfterItem: this.portifolio.positionAfterItem
                    }
                })
                    .done(function (data) {
                        data = JSON.parse(data)
                        if (data.length > 0) {
                            for (let i = 0; i < data.length; i++) {
                                app.portifolio.data.push(data[i])
                            }
                            app.portifolio.positionAfterItem += 2
                        } else if (app.portifolio.positionAfterItem > 0) {
                            app.moreDataPort.portifolio = false
                        }
                    });
            }
        },
        // Portifolio
        // Blog
        scrollbarPostsBlogBack: function () {
            const el = $('#blog-publications')
            const elValue = el.scrollLeft()
            el.animate({
                scrollLeft: (elValue - 400)
            })
        },
        scrollbarPostsBlogMore: function () {
            const el = $('#blog-publications')
            const elValue = el.scrollLeft()
            el.animate({
                scrollLeft: (elValue + 400)
            })
        },
        closeViewPostBlog: function (el) {
            $('.viewPostBlog').toggleClass('d-none')
            $('.containerViewPostBlog').toggleClass('d-none')
        },
        openViewPostBlog: function (el) {
            this.blog.selectedPost = el
            setTimeout(function () {
                $('.containerViewPostBlog').removeClass('d-none')
                $('.viewPostBlog').removeClass('d-none')
            }, 100)
        },
        loadBlog: function (clear) {
            if (clear == true) {
                app.blog.data = []
                app.moreDataPort.blog = true
                app.blog.positionAfterItem = 0
            }
            if (this.moreDataPort.portifolio) {
                $.post("php/load-content-blog.php", {
                    data: {
                        positionAfterItem: this.blog.positionAfterItem
                    }
                })
                    .done(function (data) {
                        data = JSON.parse(data)
                        if (data.length > 0) {
                            for (let i = 0; i < data.length; i++) {
                                app.blog.data.push(data[i])
                            }
                            app.blog.positionAfterItem += 2
                        } else if (app.blog.positionAfterItem > 0) {
                            app.moreDataPort.blog = false
                        }
                    });
            }
        },
        // Blog
        // Orçamento
        closeViewOrcamento: function () {
            $('.containerOrcamento').toggleClass('d-none')
            $('.viewOrcamento').toggleClass('d-none')
            try {
                this.desbloquearScroll()
            } catch (error) {
                // ...
            }
        },
        openViewOrcamento: function (el) {
            const SELF = this
            SELF.blog.selectedPost = el
            setTimeout(function () {
                $('.containerOrcamento').removeClass('d-none')
                $('.viewOrcamento').removeClass('d-none')
                SELF.bloquearScroll()
            }, 100)
            $('.tooltip').not(this).remove() // Oculta tooltips
        },
        // Orçamento
    },
    watch: {
        'dadosFormOrcamento.tipoIdentificacao': function () { // atualiza as mascaras dos campos CPF/CNPJ
            setTimeout(() => {
                $("input[name='cpf']").mask('000.000.000-00');
                $("input[name='cnpj']").mask('00.000.000/0000-00');
            }, 200)
        }
    },
    mounted: function () {
        window.addEventListener('scroll', () => {
            this.onScroll()
        })
        window.onload = function () {
            $('#preloader').addClass('d-none')
            var scrollSpy = new bootstrap.ScrollSpy(document.body, {
                target: '#menu-desktop'
            })
            $(document).ready(function () { // Pausa carousel
                $('#carouselorcamento').carousel('pause');
            });
        }
    },
    beforeMount: function () {
        this.loadPortifolio()
        this.loadBlog()
    },
    beforeDestroy: function () {
        window.removeEventListener('scroll', this.onScroll)
    },
})