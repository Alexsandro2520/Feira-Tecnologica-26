<?php

$pagina = $_GET['pagina'] ?? 'home';

switch ($pagina) {

    case 'historia':
        $arquivo = "html/historia.html";
        break;

    case 'noticias':
        $arquivo = "html/noticias.html";
        break;

    case 'eventos':
        $arquivo = "html/eventos.html";
        break;

    case 'turismo':
        $arquivo = "html/turismo.html";
        break;

    case 'login':
        $arquivo = "html/login.html";
        break;

    case 'cadastro':
        $arquivo = "html/cadastro.html";
        break;

    case 'nova-noticia':
        $arquivo = "html/nova-noticia.html";
        break;

    case 'painel':
        $arquivo = "html/painel.html";
        break;

    case 'nova-publicacao':
        $arquivo = "html/nova-publicacao.html";
        break;

    case 'publicacao':
        $arquivo = "html/publicacao.html";
        break;

    case 'login-usuario':
        $arquivo = "html/login-usuario.html";
        break;

    case 'cadastro-usuario':
        $arquivo = "html/cadastro-usuario.html";
        break;

    case 'conta-usuario':
        $arquivo = "html/conta-usuario.html";
        break;

    case 'home':
    default:
        $arquivo = "html/home.html";
        break;
}

$codigo = file_get_contents($arquivo);

include "pgs/header.php";

include "style.php";

echo $codigo;

?>

<footer class="rodape">

    <div class="rodape-conteudo">

        <!-- Coluna 1: Sobre -->
        <div class="rodape-coluna">
            <h3>Feira Tecnológica</h3>
            <p>Conectando inovação, empresas e projetos tecnológicos em um só lugar.</p>
        </div>

        <!-- Coluna 2: Navegação rápida -->
        <div class="rodape-coluna">
            <h4>Navegação</h4>
            <ul>
                <li><a href="index.php?pagina=home">Início</a></li>
                <li><a href="index.php?pagina=historia">História</a></li>
                <li><a href="index.php?pagina=noticias">Notícias</a></li>
                <li><a href="index.php?pagina=eventos">Eventos</a></li>
                <li><a href="index.php?pagina=turismo">Turismo</a></li>
            </ul>
        </div>

        <!-- Coluna 3: Contato -->
        <div class="rodape-coluna">
            <h4>Contato</h4>
            <p><strong>Telefone:</strong> (11) 4002-8922</p>
            <p><strong>E-mail:</strong> contato@feiratecnologica.com.br</p>
            <p><strong>Atendimento:</strong> Seg a Sex, das 8h às 18h</p>
        </div>

        <!-- Coluna 4: Acesso Empresarial -->
        <div class="rodape-coluna">
            <h4>Empresas</h4>
            <a href="index.php?pagina=login" class="btn-rodape-empresa">
                Área Empresarial
            </a>
        </div>

    </div>

    <div class="rodape-copyright">
        <p>&copy; 2026 Feira Tecnológica. Todos os direitos reservados.</p>
    </div>

</footer>

<style>

.rodape {
    width: 100%;
    background: #181818;
    color: #cccccc;
    padding: 40px 20px 20px 20px;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
    border-top: 4px solid #b51218;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.rodape-conteudo {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 30px;
    padding-bottom: 30px;
    border-bottom: 1px solid #333333;
}

.rodape-coluna {
    flex: 1;
    min-width: 200px;
}

.rodape-coluna h3 {
    color: #ffffff;
    font-size: 18px;
    margin-top: 0;
    margin-bottom: 12px;
}

.rodape-coluna h4 {
    color: #ffffff;
    font-size: 15px;
    margin-top: 0;
    margin-bottom: 12px;
}

.rodape-coluna p {
    font-size: 13px;
    line-height: 1.6;
    margin: 0 0 8px 0;
}

.rodape-coluna ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.rodape-coluna ul li {
    margin-bottom: 8px;
}

.rodape-coluna ul li a {
    color: #aaaaaa;
    text-decoration: none;
    font-size: 13px;
    transition: color 0.2s ease;
}

.rodape-coluna ul li a:hover {
    color: #ffffff;
    text-decoration: underline;
}

.btn-rodape-empresa {
    display: inline-block;
    background: #b51218;
    color: #ffffff !important;
    text-decoration: none;
    padding: 10px 16px;
    font-size: 13px;
    font-weight: bold;
    border-radius: 4px;
    transition: background-color 0.2s ease;
}

.btn-rodape-empresa:hover {
    background: #941016;
}

.rodape-copyright {
    max-width: 1200px;
    margin: 20px auto 0 auto;
    text-align: center;
}

.rodape-copyright p {
    margin: 0;
    font-size: 12px;
    color: #777777;
}

/* Integração com o Tema Escuro/Noturno da sua página */
body.tema-noturno .rodape,
body.dark-mode .rodape {
    background: #0f0f0f !important;
    border-top-color: #ff4d4d !important;
}

body.tema-noturno .btn-rodape-empresa,
body.dark-mode .btn-rodape-empresa {
    background: #ff4d4d !important;
}

body.tema-noturno .btn-rodape-empresa:hover,
body.dark-mode .btn-rodape-empresa:hover {
    background: #d43f3f !important;
}

@media (max-width: 768px) {

    .rodape-conteudo {
        flex-direction: column;
        gap: 25px;
    }

    .rodape-coluna {
        width: 100%;
    }

}

</style>