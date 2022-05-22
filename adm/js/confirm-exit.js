const confirExit = function() {
    // jquery confirm portugues
    $.confirm({
        title: 'Atenção!',
        content: 'Tem certeza que deseja sair?',
        buttons: {
            confirm: {
                text: 'Sim',
                btnClass: 'btn-blue',
                action: function() {
                    // pega o nome do dominio
                    var url = window.location.hostname;
                    // pega pasta atual dentro do dominio
                    var path = window.location.pathname;
                    if (path.indexOf('/') >= 0) {
                        path = path.split("/")[1];
                        // redireciona para url/path/php/host/sair.php dentro do dominio
                        window.location.href = 'http://' + url + '/' + path + '/php/host/sair.php';
                        // console.log(url + '/' + path + '/php/host/sair.php');
                    } else {
                        // redireciona para url/php/host/sair.php dentro do dominio
                        window.location.href = 'http://' + url + '/php/host/sair.php';
                    }
                }
            },
            cancel: {
                text: 'Não',
                btnClass: 'btn-red',
                action: function() {
                    return false;
                }
            }
        }
    });
};