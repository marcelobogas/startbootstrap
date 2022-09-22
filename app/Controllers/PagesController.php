<?php

namespace App\Controllers;

use App\Models\Pages;

class PagesController
{    
    /**
     * Método respo´nsável por obter as páginas cadastradas
     *
     * @return array
     */
    public static function getPages()
    {
        return Pages::select();
    }
}
