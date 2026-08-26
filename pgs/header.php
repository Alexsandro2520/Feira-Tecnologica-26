<?php

// ==========================================
// CONFIGURAÇÕES
// ==========================================

// Página atual
$paginaAtual = basename($_SERVER['PHP_SELF']);

// Cor da opção ativa
$corAtiva = "#FFD700";

?>

<nav class="navbar">

    <!-- ======================================
         LADO ESQUERDO
         ====================================== -->

    <div class="navbar-logo">

        <a href="index.php">

            <img
                src="imgs/bandeira_ribpires.png"
                alt="Bandeira de Ribeirão Pires"
            >

            <span>Ribeirão Pires</span>

        </a>

    </div>


    <!-- ======================================
         LADO DIREITO
         ====================================== -->

    <div class="navbar-direita">

        <!-- ==================================
             MENU
             ================================== -->

        <div class="navbar-menu">

            <a
                href="index.php"
                class="<?= $paginaAtual == 'index.php' ? 'ativo' : '' ?>"
            >
                Início
            </a>

            <a
                href="noticias.php"
                class="<?= $paginaAtual == 'noticias.php' ? 'ativo' : '' ?>"
            >
                Notícias
            </a>

            <a
                href="eventos.php"
                class="<?= $paginaAtual == 'eventos.php' ? 'ativo' : '' ?>"
            >
                Eventos
            </a>

            <a
                href="turismo.php"
                class="<?= $paginaAtual == 'turismo.php' ? 'ativo' : '' ?>"
            >
                Turismo
            </a>

            <a
                href="historia.php"
                class="<?= $paginaAtual == 'historia.php' ? 'ativo' : '' ?>"
            >
                História
            </a>

        </div>


        <!-- ==================================
             BOTÃO DE TEMA
             ================================== -->

        <button
            class="botao-tema"
            id="botaoTema"
            onclick="trocarTema()"
            aria-label="Trocar tema"
        >
            🌙
        </button>

    </div>

</nav>


<!-- ==========================================
     CSS
     ========================================== -->

<style>

/* ==========================================
   CONFIGURAÇÃO GERAL
   ========================================== */

body {

    margin: 0;

    background-color: #f2f2f2;

    color: #222;

    transition: background-color 0.3s, color 0.3s;
}


/* ==========================================
   NAVBAR
   ========================================== */

.navbar {

    width: 100%;
    height: 80px;

    padding: 0 30px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    background-color: white;

    box-sizing: border-box;

    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.12);

    transition: background-color 0.3s;
}


/* ==========================================
   LOGO
   ========================================== */

.navbar-logo a {

    display: flex;
    align-items: center;

    gap: 15px;

    text-decoration: none;

    color: #222;
}


.navbar-logo img {

    width: 125px;
    height: auto;

    border-radius: 8px;
}


.navbar-logo span {

    font-size: 24px;
    font-weight: bold;
}


/* ==========================================
   LADO DIREITO
   ========================================== */

.navbar-direita {

    display: flex;
    align-items: center;

    gap: 12px;
}


/* ==========================================
   MENU
   ========================================== */

.navbar-menu {

    display: flex;
    align-items: center;

    gap: 5px;

    padding: 6px;

    background-color: #eeeeee;

    border-radius: 14px;

    transition: background-color 0.3s;
}


/* ==========================================
   LINKS
   ========================================== */

.navbar-menu a {

    padding: 12px 18px;

    border-radius: 10px;

    text-decoration: none;

    color: #333;

    font-size: 16px;
    font-weight: 500;

    transition: 0.2s;
}


/* ==========================================
   HOVER
   ========================================== */

.navbar-menu a:hover {

    background-color: #dddddd;
}


/* ==========================================
   PÁGINA ATUAL
   ========================================== */

.navbar-menu a.ativo {

    background-color: <?= $cores["claro"]["btnav_ativo"] ?>;
    color: <?= $cores["claro"]["texto"] ?>;

    color: #222;

    font-weight: bold;
}


/* ==========================================
   BOTÃO DO TEMA
   ========================================== */

.botao-tema {

    width: 48px;
    height: 48px;

    border: none;

    border-radius: 12px;

    background-color: #eeeeee;

    font-size: 22px;

    cursor: pointer;

    transition: 0.2s;

    display: flex;
    align-items: center;
    justify-content: center;
}


.botao-tema:hover {

    background-color: #dddddd;

    transform: scale(1.05);
}


/* ==========================================
   ==========================================
   TEMA NOTURNO
   ==========================================
   ========================================== */

body.tema-noturno {

    background-color: #121212;

    color: #eeeeee;
}


/* Navbar */

body.tema-noturno .navbar {

    background-color: #1e1e1e;
}


/* Nome Ribeirão Pires */

body.tema-noturno .navbar-logo a {

    color: white;
}


/* Fundo das opções */

body.tema-noturno .navbar-menu {

    background-color: #2b2b2b;
}


/* Links */

body.tema-noturno .navbar-menu a {

    color: #eeeeee;
}


/* Hover */

body.tema-noturno .navbar-menu a:hover {

    background-color: #3a3a3a;
}


/* Botão */

body.tema-noturno .botao-tema {

    background-color: #2b2b2b;

    color: white;
}


/* Hover do botão */

body.tema-noturno .botao-tema:hover {

    background-color: #3a3a3a;
}

</style>


<!-- ==========================================
     JAVASCRIPT
     ========================================== -->

<script>

function trocarTema() {

    // Adiciona/remove o tema noturno
    document.body.classList.toggle("tema-noturno");


    // Verifica qual tema está ativo
    const temaNoturno =
        document.body.classList.contains("tema-noturno");


    // Salva a escolha no navegador
    localStorage.setItem(
        "tema",
        temaNoturno ? "noturno" : "claro"
    );


    // Troca o ícone
    atualizarBotaoTema();
}


function atualizarBotaoTema() {

    const botao = document.getElementById("botaoTema");

    const temaNoturno =
        document.body.classList.contains("tema-noturno");


    if (temaNoturno) {

        botao.innerHTML = "☀️";

    } else {

        botao.innerHTML = "🌙";

    }
}


/* ==========================================
   CARREGA O TEMA SALVO
   ========================================== */

const temaSalvo = localStorage.getItem("tema");


if (temaSalvo === "noturno") {

    document.body.classList.add("tema-noturno");

}


/* Atualiza o botão */

atualizarBotaoTema();

</script>