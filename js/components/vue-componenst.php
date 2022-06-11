// Component item-list-hystory
Vue.component('item-list-hystory', {
props: ['modelo', 'periodo', 'local', 'descricao'],
template: `
<div class="item-list-hystory mb-4">
    <div class="row">
        <span class="col-12 text-uppercase">{{ modelo }}</span>
        <span class="col-12 fw-light">{{ periodo }}</span>
    </div>
    <div class="mt-3 fw-bold">
        <span>{{ local }}</span>
    </div>
    <div class="mt-1 fs-7">
        <p>{{ descricao }}</p>
    </div>
</div>
`
})

// Component item-list-ability
Vue.component('ability', {
props: ['prop', 'ability'],
template: `
<div class="col hab-icon flex-column d-flex align-items-center justify-content-center">
    <i v-bind:class="prop"></i>
    <div class="mt-2">
        <span>{{ability}}</span>
    </div>
</div>
`
})

// Component links menu
Vue.component('links-menu', {
template: `
<div>
    <a onClick="app.togleMobileMenu()" class="text-sm-center nav-link text-light" aria-current="page" href="#section-hi">Olá</a>
    <a onClick="app.togleMobileMenu()" class="text-sm-center nav-link text-light" href="#section-education">Educação</a>
    <a onClick="app.togleMobileMenu()" class="text-sm-center nav-link text-light" href="#section-trabalho">Experiência</a>
    <a onClick="app.togleMobileMenu()" class="text-sm-center nav-link text-light" href="#section-habilidades-gerais">Conhecimentos</a>
    <a onClick="app.togleMobileMenu()" class="text-sm-center nav-link text-light" href="#section-portifolio">Portifólio</a>
    <div class="dropdown">
        <span class="cursor text-sm-center nav-link text-light dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">Mais</span>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
            <li><a onClick="app.togleMobileMenu()" class="text-sm-center nav-link text-light" href="#section-blog">Blog</a></li>
            <li><a onClick="app.togleMobileMenu()" class="text-sm-center nav-link text-light" href="#header-home">Contato</a></li>
            <li><a onClick="app.togleMobileMenu()" class="text-sm-center nav-link text-light" href="#section-orcamento">*Orçamento</a></li>
            <li><a onClick="app.togleMobileMenu()" class="text-sm-center nav-link text-light" href="adm/login/">Administração</a></li>
        </ul>
    </div>
</div>
`
})

// Component Preloader
Vue.component('preloader', {
template: `
<div>
    <div>
        <div class="position-absolute top-50 start-50 translate-middle" id="circle-preloader"></div>
    </div>
</div>
`
})