<?php

namespace App\Validation;

class CPF{
    //função estática não precisa da instância
    //Verifica se o Cpf é válido
    public static function validar($cpf){
        //obtém apenas os números.
        $cpf = preg_replace('/\D/','',$cpf); //substitui tudo que não for númerico para VÁZIO

        //verifica a quantidade de dígitos.
        if(strlen($cpf) != 11){
            return false;
        }

        //Dígito verificador
        $cpfValidacao = substr($cpf,0,9); //pega as nove primeiras posições do CPF
        $cpfValidacao .= self::calcularDigitoVerificador($cpfValidacao); //adiciona o dígito verificador ao CPF
        $cpfValidacao .= self::calcularDigitoVerificador($cpfValidacao); //Faz o mesmo processo, mas com o dígito verificador

        //compara o cpf calculado com o enviado
        //iguais = true, diferentes = false
        return $cpfValidacao == $cpf;

    }

    //calcula o dígito verificador
    public static function calcularDigitoVerificador($base){
        /*
          1. multiplica o primeiro núm por 10 e decaí até 2: 123456789 = 1x10 2x9 3x8 4x7 5x6 6x5 7x4 8x3 9x2
          2. soma-se os resultados
          3. o dígito verificador será o resto da multiplicação
          4. se for 0 ou 1, verificador = 0, se for outro, subtraí o resto de 11
          5. O mesmo processo é feito novamente, mas utilizando o dígito verificador
        */
        //Auxiliares
        $tamanho = strlen($base);
        $multiplicador = $tamanho + 1;

        $soma = 0;

        for($i = 0; $i < $tamanho; $i++){
            $soma += $base[$i] * $multiplicador;
            $multiplicador--; //cai de um em um
        }

        //resto da divisão
        $resto = $soma % 11; //pega o resto da soma

        //retorna dígito verificador
        return $resto > 1 ? 11 - $resto : 0;



    }
}