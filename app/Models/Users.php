<?php

namespace App\Models;

use App\Core\Conexao;
use Exception;
use PDO;

class Users
{
    /**
     * Method insert
     *
     * @param $postVars $postVars [explicite description]
     *
     * @return void
     */
    public static function insert($postVars)
    {
        /* obtém uma instância de conexão com o banco de dados */
        $conn = Conexao::getConnection();

        /* query de inserção */
        $sql = "INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";

        /* prepara e executa a ação no banco */
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':first_name', $postVars['inputFirstName'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $postVars['inputLastName'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $postVars['inputEmail'], PDO::PARAM_STR);
        $stmt->execute();

        /* fecha a conexão com o banco */
        unset($stmt);

        /* retorna o id criado para o usuário */
        return $conn->lastInsertId();
    }
}
