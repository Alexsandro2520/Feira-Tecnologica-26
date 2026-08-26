<?php

// Pegando o conteúdo da página inicial
$home = file_get_contents("html/home.html");

// Navbar
include "pgs/header.php";

// CSS
include "style.php";

//Pegando a página de agora
$codigo = $home;

// Conteúdo
echo $home;

?>