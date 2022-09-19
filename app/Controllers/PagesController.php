<?php

namespace App\Controllers;

use App\Models\Pages;

class PagesController
{    
    /**
     * Method getPage
     *
     * @return array
     */
    public static function getPages()
    {
        return Pages::select();
    }
}
