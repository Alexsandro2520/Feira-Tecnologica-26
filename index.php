<?php

// ==========================================
// IDENTIFICANDO A PÁGINA
// ==========================================

$pagina = $_GET['pagina'] ?? 'home';


// ==========================================
// DEFININDO O ARQUIVO
// ==========================================

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

    case 'home':
    default:
        $arquivo = "html/home.html";
        break;
}


// ==========================================
// PEGANDO O CONTEÚDO
// ==========================================

$codigo = file_get_contents($arquivo);


// ==========================================
// NAVBAR
// ==========================================

include "pgs/header.php";


// ==========================================
// STYLE
// ==========================================

include "style.php";


// ==========================================
// MOSTRANDO A PÁGINA
// ==========================================

echo $codigo;

?>