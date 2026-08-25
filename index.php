<?php

//Pegando o home do site
$home = file_get_contents("html/home.html");


include "pgs/header.php";

//O código do site
$codigo = $home;

//Mostrando o que precisa ser mostrado
echo $codigo;

?>