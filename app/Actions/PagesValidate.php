<?php

namespace App\Actions;

use App\Controllers\PagesController;

class PagesValidate
{
    /**
     * Método responsável por retornar o diretório da página solicitada
     * com base na página informada
     *
     * @param string $url 
     *
     * @return string
     */
    public static function validate($url)
    {
        /* define o diretório para verificação de url */
        /* $diretorio = "/resource/views"; */

        $diretorio = __DIR__ . "/../../resource/views";

        $paginasPermitidas = PagesController::getPages();

        if (substr_count($url, '/') > 0) {

            /* converte a url em array */
            $url = explode('/', $url);

            /* verifica se a página requisitada existe */
            $pg = (!file_exists("{$diretorio}/" . $url[0] . '.php')) && in_array($url[0], $paginasPermitidas) ? $url[0] : '404';

            /* retorna o diretório da página solicitada */
            return $diretorio . '/' . $pg . '.php';
        } else {

            /* define título da página */
            define('APP_TITLE', strtoupper($url));

            /* verifica se a página requisitada existe */
            $pg = (file_exists("{$diretorio}/" . $url . '.php')) && in_array($url, $paginasPermitidas) ? $url : '404';

            /* retorna o diretório da página solicitada */
            return $diretorio . '/' . $pg . '.php';
        }
    }
}
