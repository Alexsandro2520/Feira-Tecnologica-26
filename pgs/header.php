<?php

include "config.php";

$paginaAtual = $_GET['pagina'] ?? 'home';

// Lista de rotas que pertencem à navegação do botão "Conta"
$paginasConta = ['conta-usuario', 'login-usuario', 'cadastro-usuario', 'painel'];

// Verifica se a página atual é alguma das rotas de conta
$isConta = in_array($paginaAtual, $paginasConta);

?>

<nav class="navbar">

    <div class="navbar-logo">

        <a href="index.php">

            <img
                src="imgs/bandeira_ribpires.png"
                alt="Bandeira de Ribeirão Pires"
            >

            <span>Ribeirão Pires</span>

        </a>

    </div>


    <div class="navbar-direita">

        <div class="navbar-menu">

            <a
                href="index.php"
                class="<?= $paginaAtual == 'home' ? 'ativo' : '' ?>"
            >
                Início
            </a>


            <a
                href="index.php?pagina=noticias"
                class="<?= $paginaAtual == 'noticias' ? 'ativo' : '' ?>"
            >
                Notícias
            </a>


            <a
                href="index.php?pagina=eventos"
                class="<?= $paginaAtual == 'eventos' ? 'ativo' : '' ?>"
            >
                Eventos
            </a>


            <a
                href="index.php?pagina=turismo"
                class="<?= $paginaAtual == 'turismo' ? 'ativo' : '' ?>"
            >
                Turismo
            </a>


            <a
                href="index.php?pagina=historia"
                class="<?= $paginaAtual == 'historia' ? 'ativo' : '' ?>"
            >
                História
            </a>


            <!-- Adicionada a verificação dinâmica da classe 'ativo' -->
            <a
                href="index.php?pagina=conta-usuario"
                id="linkConta"
                class="<?= $isConta ? 'ativo' : '' ?>"
            >
                Conta
            </a>

        </div>


        <button
            class="botao-tema"
            id="botaoTema"
            onclick="trocarTema()"
            aria-label="Trocar tema"
        >
            
        </button>

    </div>

</nav>


<style>

body {

    margin: 0;

    background-color: #f2f2f2;

    color: #222;

    transition:
        background-color 0.3s,
        color 0.3s;

}


.navbar {

    width: 100%;

    height: 80px;

    padding: 0 30px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    background-color: white;

    box-sizing: border-box;

    box-shadow:
        0 3px 12px
        rgba(0, 0, 0, 0.12);

    transition:
        background-color 0.3s;

}


.navbar-logo a {

    display: flex;

    align-items: center;

    gap: 15px;

    text-decoration: none;

    color: #222;

}


.navbar-logo img {

    width: 105px;

    height: auto;

    padding: 8px;

    border-radius: 10px;

}


.navbar-logo span {

    font-size: 24px;

    font-weight: bold;

}


.navbar-direita {

    display: flex;

    align-items: center;

    gap: 12px;

}


.navbar-menu {

    display: flex;

    align-items: center;

    gap: 5px;

    padding: 6px;

    background-color: #eeeeee;

    border-radius: 14px;

    transition:
        background-color 0.3s;

}


.navbar-menu a {

    padding: 12px 18px;

    border-radius: 10px;

    text-decoration: none;

    color: #333;

    font-size: 16px;

    font-weight: 500;

    transition: 0.2s;

}


.navbar-menu a:hover {

    background-color: #dddddd;

}


.navbar-menu a.ativo {

    background-color:
        <?= $cores["claro"]["btnav_ativo"] ?>;

    color:
        <?= $cores["claro"]["texto"] ?>;

    color: #222;

    font-weight: bold;

}


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




body.tema-noturno,
body.dark-mode {

    background-color: #121212 !important;

    color: #eeeeee !important;

}


body.tema-noturno .navbar,
body.dark-mode .navbar {

    background-color: #1e1e1e;

}


body.tema-noturno .navbar-logo a,
body.dark-mode .navbar-logo a {

    color: white;

}


body.tema-noturno .navbar-menu,
body.dark-mode .navbar-menu {

    background-color: #2b2b2b;

}


body.tema-noturno .navbar-menu a,
body.dark-mode .navbar-menu a {

    color: #eeeeee;

}


body.tema-noturno .navbar-menu a:hover,
body.dark-mode .navbar-menu a:hover {

    background-color: #3a3a3a;

}


body.tema-noturno .botao-tema,
body.dark-mode .botao-tema {

    background-color: #2b2b2b;

    color: white;

}


body.tema-noturno .botao-tema:hover,
body.dark-mode .botao-tema:hover {

    background-color: #3a3a3a;

}

</style>


<script>

function trocarTema() {

    
    document.body.classList.toggle("tema-noturno");
    document.body.classList.toggle("dark-mode");

    const eEscuro = document.body.classList.contains("tema-noturno");

    
    localStorage.setItem("tema", eEscuro ? "noturno" : "claro");

    atualizarBotaoTema();

}


function atualizarBotaoTema() {

    const botao = document.getElementById("botaoTema");

    if (!botao) return;

    const eEscuro = document.body.classList.contains("tema-noturno") || document.body.classList.contains("dark-mode");

    if (eEscuro) {

        botao.innerHTML = "☀︎";

    } else {

        botao.innerHTML = "⏾";

    }

}


async function verificarConta() {

    const link = document.getElementById("linkConta");

    if (!link) return;

    const empresaSalva = localStorage.getItem("empresa");

    if (empresaSalva) {

        try {

            const empresa = JSON.parse(empresaSalva);

            if (empresa && empresa.nome) {

                link.textContent = empresa.nome;

                link.href = "index.php?pagina=painel";

                return;

            }

        } catch (erro) {

            localStorage.removeItem("empresa");

        }

    }


    try {

        const resposta = await fetch(
            "http://localhost:3000/api/auth/usuario/me",
            {
                credentials: "include"
            }
        );

        if (!resposta.ok) return;

        const dados = await resposta.json();

        if (dados && dados.usuario) {

            link.textContent = dados.usuario.nome;

        }

    } catch (erro) {

        console.log("Usuário não está logado.");

    }

}



document.addEventListener("DOMContentLoaded", () => {

    const temaSalvo = localStorage.getItem("tema");

    if (temaSalvo === "noturno" || temaSalvo === "dark") {

        document.body.classList.add("tema-noturno", "dark-mode");

    }

    atualizarBotaoTema();

    verificarConta();

});

</script>