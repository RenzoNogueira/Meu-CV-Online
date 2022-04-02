$(function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    $("input[name='cep']").mask('00000-000');
    $("input[name='celular']").mask('(00) 0000-0000');
    $("input[name='cpf']").mask('000.000.000-00');
    $("input[name='cnpj']").mask('00.000.000/0000-00');
})
