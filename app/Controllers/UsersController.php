<?php

namespace App\Controllers;

use App\Actions\SessionStart;
use App\Models\Users;

class UsersController
{
    /**
     * Método responsável por criar um novo usuário
     *
     * @param array $postVars [explicite description]
     *
     * @return void
     */
    public static function create($postVars)
    {
        /* envia os parâmetros para a modelo realizar a inserção dos dados */
        $user = Users::insert($postVars);

        if (isset($user)) {
            /* redireciona o usário criado para criar a sessão de entrada */
            return SessionStart::start($user);
        } else {
            /* redireciona para a página de criação de usuário */
            return header('location: register');
        }
    }
}
