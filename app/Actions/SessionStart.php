<?php

namespace App\Actions;

class SessionStart
{    
    /**
     * Método responsável por criar uma sessão e obter 
     * as permissões para o usuário
     *
     * @param integer $id [explicite description]
     *
     * @return mixed
     */
    public static function start($id)
    {
        /* inicia uma sessão para a conexão do usuário */
        session_start();

        /* cria um id para a sessão */
        $_SESSION['sessionId'] = session_id();

        /* redireciona para o painel do usuário */
        return header('location: dashboard');
    }
}
