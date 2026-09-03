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

    --cartao-turismo: <?= $cores["claro"]["cartao_turismo"] ?>;
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

    --cartao-turismo: <?= $cores["noturno"]["cartao_turismo"] ?>;
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

    border-radius: 25px 25px 0 0;
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


```css
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

    gap: 80px;

    padding: 60px 10%;
}


/* ========================================
   CONTEÚDO DO CARD
======================================== */

.card-conteudo {
    flex: 1;

    max-width: 600px;
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
   ÁREA DA IMAGEM
======================================== */

.card-imagem {
    flex: 1;

    display: flex;

    justify-content: center;
    align-items: center;
}


/* ========================================
   QUADRADO DA IMAGEM
======================================== */

.imagem-quadrado {

    width: 400px;
    height: 400px;

    padding: 20px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 15px;
}


/* ========================================
   IMAGEM DENTRO DO QUADRADO
======================================== */

.imagem-quadrado img {

    width: 100%;
    height: 100%;

    object-fit: cover;

    border-radius: 8px;

    display: block;
}


/* ========================================
   CARD 1
   FUNDO CINZA
   QUADRADO BRANCO
======================================== */

.card-1 {

    background-color: var(--cinza);
}

.card-1 .imagem-quadrado {

    background-color: var(--branco);
}


/* ========================================
   CARD 2
   FUNDO BRANCO
   QUADRADO CINZA
======================================== */

.card-2 {

    background-color: var(--branco);
}

.card-2 .imagem-quadrado {

    background-color: var(--cinza);
}

.card-2 .card-conteudo {
    text-align: right;
}

/* ========================================
   BOTÕES DOS CARDS
======================================== */

.btn-card {
    display: inline-block;

    margin-top: 25px;

    padding: 14px 30px;

    background-color: var(--botao);
    color: var(--branco);

    text-decoration: none;

    font-size: 16px;
    font-weight: bold;

    border-radius: 8px;

    transition: 0.3s;
}

.btn-card:hover {
    background-color: var(--botao-hover);
}

/* =========================
   TURISMO
   ========================= */

.turismo {
    width: 100%;
    padding: 60px 5%;
    box-sizing: border-box;
}

/* TÍTULO FORA DO QUADRADO */

.turismo > h1 {
    max-width: 1200px;
    margin: 0 auto 30px;

    text-align: center;

    color: var(--texto);
    font-size: 36px;
}


/* QUADRADO ENVOLVENDO OS CARDS */

.turismo-container {
    width: 100%;
    max-width: 1200px;

    margin: 0 auto;
    padding: 35px;

    background-color: var(--cartao-turismo);

    border-radius: 30px;

    box-sizing: border-box;
}


/* CARDS DENTRO DO QUADRADO */

.turismo-cards {
    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 30px;
}


/* CARD INDIVIDUAL */

.turismo-card {
    overflow: hidden;

    background-color: var(--branco);

    border-radius: 25px;

    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.10);

    transition: transform 0.2s ease;
}

.turismo-card:hover {
    transform: translateY(-5px);
}


/* IMAGEM */

.turismo-card-imagem {
    width: 100%;
    height: 220px;

    overflow: hidden;
}


.turismo-card-imagem img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;
}


/* CONTEÚDO */

.turismo-card-conteudo {
    padding: 25px;
}


.turismo-card-conteudo h2 {
    margin: 0 0 10px;

    color: var(--texto);

    font-size: 25px;
}


.turismo-card-conteudo p {
    margin: 0 0 20px;

    color: var(--texto-secundario);

    line-height: 1.6;
}


/* BOTÃO */

.turismo-card-conteudo button {
    padding: 10px 20px;

    border: none;
    border-radius: 10px;

    background-color: var(--botao);
    color: var(--branco);

    font-weight: bold;

    cursor: pointer;

    transition: 0.2s;
}


.turismo-card-conteudo button:hover {
    background-color: var(--botao-hover);
    color: var(--texto);
}


/* RESPONSIVIDADE */

@media (max-width: 768px) {

    .turismo {
        padding: 30px 4%;
    }

    .turismo > h1 {
        font-size: 28px;
    }

    .turismo-cards {
        grid-template-columns: 1fr;

        padding: 25px;
    }

}



/* ========================================
   RESPONSIVIDADE
======================================== */

@media (max-width: 800px) {

    .card {

        flex-direction: column;

        gap: 40px;

        padding: 60px 8%;
    }


    .card-conteudo {

        text-align: center;
    }


    .imagem-quadrado {

        width: 300px;
        height: 300px;
    }

}



</style>