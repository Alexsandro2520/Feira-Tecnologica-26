<?php
include "config.php";
?>

<style>

:root {

    /* ==============================
       CORES DO TEMA CLARO
       ============================== */

    --fundo: <?= $cores["claro"]["fundo"] ?>;
    --branco: <?= $cores["claro"]["branco"] ?>;
    --cinza: <?= $cores["claro"]["cinza"] ?>;

    --texto: <?= $cores["claro"]["texto"] ?>;
    --texto-secundario: <?= $cores["claro"]["texto_secundario"] ?>;

    --botao: <?= $cores["claro"]["botao"] ?>;
    --botao-hover: <?= $cores["claro"]["botao_hover"] ?>;
}


/* ========================================
   TEMA NOTURNO
======================================== */

body.tema-noturno {

    --fundo: <?= $cores["noturno"]["fundo"] ?>;
    --branco: <?= $cores["noturno"]["branco"] ?>;
    --cinza: <?= $cores["noturno"]["cinza"] ?>;

    --texto: <?= $cores["noturno"]["texto"] ?>;
    --texto-secundario: <?= $cores["noturno"]["texto_secundario"] ?>;

    --botao: <?= $cores["noturno"]["botao"] ?>;
    --botao-hover: <?= $cores["noturno"]["botao_hover"] ?>;
}


/* ========================================
   CONFIGURAÇÕES GERAIS
======================================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;

    color: var(--texto);
    background-color: var(--fundo);

    transition: background-color 0.3s, color 0.3s;
}


/* ========================================
   IMAGEM PRINCIPAL
======================================== */

.hero {
    width: 100%;
    overflow: hidden;
}

.hero-image {
    width: 100%;
    height: 550px;

    object-fit: cover;

    display: block;
}


/* ========================================
   APRESENTAÇÃO
======================================== */

.apresentacao {
    width: 100%;

    padding: 50px 20px;

    text-align: center;

    background-color: var(--branco);
}

.apresentacao h1 {
    font-size: 45px;
    margin-bottom: 20px;
}

.apresentacao p {
    font-size: 20px;
    margin-bottom: 8px;
}


/* ========================================
   BOTÃO CONHECER MAIS
======================================== */

.btn-conhecer {
    display: inline-block;

    margin-top: 25px;

    padding: 15px 35px;

    background-color: var(--botao);
    color: var(--branco);

    text-decoration: none;

    font-size: 18px;
    font-weight: bold;

    border-radius: 8px;

    transition: 0.3s;
}

.btn-conhecer:hover {
    background-color: var(--botao-hover);
}


/* ========================================
   ÁREA DOS CARDS
======================================== */

.cards {
    width: 100%;
}


/* ========================================
   CONFIGURAÇÃO GERAL DOS CARDS
======================================== */

.card {
    width: 100%;
    min-height: 550px;

    display: flex;
    align-items: center;
    justify-content: center;

    padding: 60px 10%;
}

.card-conteudo {
    width: 100%;
    max-width: 1100px;
}

.card h2 {
    font-size: 40px;
    margin-bottom: 20px;
}

.card p {
    font-size: 20px;
    line-height: 1.6;
}


/* ========================================
   CARD 1
======================================== */

.card-1 {
    background-color: var(--cinza);
}


/* ========================================
   CARD 2
======================================== */

.card-2 {
    background-color: var(--branco);
}

</style>