<?php

// ==========================================
// CONFIGURAÇÕES
// ==========================================

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
         MENU
         ====================================== -->

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

</nav>


<style>

/* ==========================================
   NAVBAR
   ========================================== */


.navbar {

    width: calc(100% - 40px);
    height: 80px;

    margin: 20px;

    padding: 0 30px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    /* Quadrado branco */
    background-color: white;

    /* Bordas arredondadas */
    border-radius: 16px;

    /* Sombra */
    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.12);

    box-sizing: border-box;
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
    width: 90px;
    height: auto;

}

.navbar-logo span {
    font-size: 24px;
    font-weight: bold;

    display: flex;
    align-items: center;
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
   MOUSE
   ========================================== */

.navbar-menu a:hover {

    background-color: #dddddd;
}


/* ==========================================
   PÁGINA ATUAL
   ========================================== */

.navbar-menu a.ativo {

    background-color: <?= $corAtiva ?>;

    color: #222;

    font-weight: bold;
}

</style>