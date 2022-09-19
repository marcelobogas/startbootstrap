<?php

namespace App\Core;

class Enviroments
{
    /**
     * Método responsável por carregar as variáveis de ambiente do projeto
     *
     * @param string $dir [caminho absoluto onde encontra-se o arquivo .env]
     *
     */
    public static function load($dir)
    {
        /* verifica se o arquivo existe */
        if (!file_exists($dir . DIRECTORY_SEPARATOR . '.env')) {
            return false;
        }

        $lines = file($dir . DIRECTORY_SEPARATOR . '.env');
        foreach ($lines as $line) {
            putenv(trim($line, '\n'));
        }
    }
}
