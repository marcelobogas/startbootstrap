<?php

namespace App\Models;

use App\Core\Conexao;

class Pages
{
    public static function select()
    {
        /* obtém uma instância de conexão com o banco de dados */
        $conn = Conexao::getConnection();

        /* prepara e executa a query no banco */
        $query = "SELECT * FROM pages";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $response = $stmt->fetchAll();

        /* fecha a conexão com o banco de dados */
        unset($stmt);

        /* definição de páginas permitidas */
        $pages = [];
        foreach ($response as $value) {
            array_push($pages, $value['slug']);
        }

        /* retorna as informações em formato de array */
        return $pages;
    }
}
