<?php

namespace App\Actions;

use App\Models\Users;

class SessionStart
{
    /**
     * Método responsável por criar uma sessão e obter 
     * as permissões para o usuário
     *
     * @param integer $id 
     *
     * @return mixed
     */
    public static function start($id)
    {
        /* valida as credenciais de acesso informada pelo usuário */
        $user = Users::select(null, $id);

        /* inicia uma sessão para a conexão do usuário */
        session_start();

        /* cria um id para a sessão */
        $_SESSION['sessionId'] = session_id();
        $_SESSION['userId']    = $user[0]['id'];
        $_SESSION['userName']  = $user[0]['first_name'];
        $_SESSION['userEmail'] = $user[0]['email'];

        /* redireciona para o painel do usuário */
        return header('location: dashboard');
    }

    /**
     * Método responsável por validar os dados informados pelo usuário
     *
     * @param string $email 
     * @param string $senha 
     *
     * @return mixed
     */
    public static function validate($postVars)
    {
        /* obtém os dados do usuario */
        $user = Users::select($postVars['inputEmail']);

        /* valida as credenciais de acesso fornecidas pelo usuário */
        if (($postVars['inputEmail'] == $user[0]['email']) && ($postVars['inputPassword'] == base64_decode($user[0]['password']))) {

            return self::start($user[0]['id']);
        }

        /* inicia uma sessão para a conexão do usuário */
        session_start();

        if (!$user[0]['id']) {

            $_SESSION['flash_message'] = "Usuário não encontrado!!!";

            return header('location: login');
        }

        /**
         * retorna uma mensagem para o usuário
         * caso a ação seja a inserção de um novo usuário
        */
        $_SESSION['flash_message'] = "Usuário já cadastrado!!";

        /* redireciona o usuário para realizar o login */
        return header('location: login');
    }
}
