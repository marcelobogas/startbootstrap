<?php

namespace App\Core;

use Exception;
use PDO;
use PDOException;

class Conexao
{
    /**
     * Método construtor da classe
     *
     * @return void
     */
    private function __construct()
    {
        //..
    }

    /**
     * Método responsável por retornar uma conexão com o banco de dados
     *
     * @return Connection
     */
    public static function getConnection()
    {
        /* credenciais de acesso ao banco de dados */
        $pdoConfig  = trim(getenv('DB_CONNECTION'));
        $pdoConfig .= ":host=" . trim(getenv('DB_HOST'));
        $pdoConfig .= ";dbname=" . trim(getenv('DB_DATABASE'));

        try {
            /* verifica se não existe uma conexão existente */
            if (!isset($connection)) {
                $connection =  new PDO($pdoConfig, trim(getenv('DB_USERNAME')), trim(getenv('DB_PASSWORD')));
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            /* retorna uma string de conexão com o banco de dados */
            return $connection;
        } catch (PDOException $e) {
            /* retorna uma mensagem apresentando o erro ocorrido */
            throw new Exception($e->getMessage());
        }
    }
}
