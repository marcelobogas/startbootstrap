<?php

namespace App\Actions;

class Logout
{    
    /**
     * Método responsável por redirecionar o usuário
     * a tela de login após realizar o logout da aplicação
     *
     * @return void
     */
    public static function exit()
    {
        return header('location: login');
    }    
}
