<?php

namespace App\Controllers;

use App\Actions\SessionStart;
use App\Models\Users;

class UsersController
{
    /**
     * Método responsável por criar um novo usuário
     *
     * @param array $postVars 
     *
     * @return void
     */
    public static function create($postVars)
    {
        /* verifica se já existe um usuário criado com as credenciais informadas */
        $data = Users::select($postVars['inputEmail']);

        /* usuário já cadastrado */
        if (isset($data[0]['id'])) {
            /* inicia uma sessão */
            session_start();

            /* retorna uma mensagem para o usuário */
            $_SESSION['flash_message'] = "Usuário já cadastrado!!";

            /* redireciona o usuário para realizar o login */
            return header('location: login');
        }

        /* envia os parâmetros para a modelo realizar a inserção dos dados */
        $user = Users::insert($postVars);

        /* redireciona para a página de criação de usuário */
        if (!isset($user)) {
            return header('location: register');
        }

        /* redireciona o usário criado para criar a sessão de entrada */
        return SessionStart::start($user);
    }
}
