<?php
require __DIR__ . '/vendor/autoload.php';

use App\Validation\CPF;

//https://www.4devs.com.br/gerador_de_cpf
$resultado = CPF::validar($_POST['cpf']);

//php validar.php
if($resultado){
    header('location: index.php?status=true');
}
else{
    header('location: index.php?status=false');
}

