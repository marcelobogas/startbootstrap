<?php

namespace App\Models;

use App\Core\Conexao;
use Exception;
use PDO;

class Users
{    
    /**
     * Método responsável por retornar todos os usuários ou
     * retornar o usuário com base no e-mail informado ou
     * retornar o usuário com base no id informado
     *
     * @param string $email 
     * @param integer $id 
     *
     * @return array
     */
    public static function select($email = null, $id = null)
    {
        /* obtém uma instância de conexão com o banco de dados */
        $conn = Conexao::getConnection();

        /* query de consulta */
        if (is_null($email) && is_null($id)) { 
            $sql = "SELECT * FROM users";
        }
        
        if (!is_null($email) && is_null($id)) {
            $sql = "SELECT * FROM users WHERE email LIKE '%{$email}%'";
        } 
        
        if (!is_null($id) && is_null($email)) {
            $sql = "SELECT * FROM users WHERE id = {$id}";
        }

        /* prepara e executa a query no banco */
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        /* armazena as informações obtidas pela query */
        $response = $stmt->fetchAll();

        /* fecha a conexão com o banco */
        unset($stmt);

        /* retorna um array as informações obtidas pela query */
        return $response;
    }

    /**
     * Method insert
     *
     * @param array $postVars 
     *
     * @return void
     */
    public static function insert($postVars)
    {
        /* obtém uma instância de conexão com o banco de dados */
        $conn = Conexao::getConnection();

        /* query de inserção */
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";

        /* prepara e executa a ação no banco */
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':first_name', $postVars['inputFirstName'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $postVars['inputLastName'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $postVars['inputEmail'], PDO::PARAM_STR);
        $stmt->bindValue(':password', base64_encode($postVars['inputPassword']), PDO::PARAM_STR);
        $stmt->execute();

        /* fecha a conexão com o banco */
        unset($stmt);

        /* retorna o id criado para o usuário */
        return $conn->lastInsertId();
    }
}
