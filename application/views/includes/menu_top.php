<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar"
                aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= base_url() ?>main">CMGP Web</a>
    </div>
    <div class="collapse navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">Arquivo <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Conectar Plataforma</a></li>
                    <li><a href="#">Desconectar Plataforma</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?= base_url() ?>login?action=logout">Logout</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="<?= base_url() ?>usuario">Usuários</a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">Monitorar Portas <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Iniciar Monitoramento</a></li>
                    <li><a href="#">Registro de Entradas</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">Controle Remoto <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url() ?>main/remote?action=view">Iniciar Controle</a></li>
                    <li><a href="#">Registro de Ações</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="<?= base_url() ?>access">Log do Sistema</a></li>

        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">Agenda de Salas/Labs <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Fazer Agendamento</a></li>
                    <li><a href="#">Gerenciar Agendamentos</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">Controle de Acessos <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Cadastrar Cartão de Acesso</a></li>
                    <li><a href="#">Gerenciar Cartões de Acesso</a></li>
                    <li><a href="#">Gravar Cartão de Acesso</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">Ajuda <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url() ?>main/status">Status do Sistema</a></li>
                    <li><a href="#">Ajuda</a></li>
                    <li><a href="<?= base_url() ?>main/sobre">Sobre o Sistema</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
