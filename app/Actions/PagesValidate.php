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
        /* valida a página solicitada */
        $pg = self::validateUrl($url);

        /* define título da página */
        define('APP_TITLE', strtoupper($pg));

        /* retorna o diretório da página solicitada */
        return self::validatePage($pg);
    }

    /**
     * Método responsável por retornar o diretório padrão para as views do sistema
     *
     * @return void
     */
    private static function getDirectory()
    {
        /* define o diretório para verificação de url */
        $diretorio = __DIR__ . "/../../resource/views";

        return $diretorio;
    }

    /**
     * Método responsável por validar a url enviada 
     * e retornar a página solicitada
     *
     * @param string $url 
     *
     * @return string
     */
    private static function validateUrl($url)
    {
        /* define o diretório para verificação de url */
        $diretorio = self::getDirectory();

        /* retorna a página solicitada ou a página de erro */
        if (substr_count($url, '/') > 0) {

            /* converte a url em array */
            $url = explode('/', $url);

            /* verifica se a página requisitada existe */
            $pg = (!file_exists("{$diretorio}/" . $url[0] . '.php')) ? $url[0] : '404';

            return $pg;
        } else {

            /* verifica se a página requisitada existe */
            $pg = (file_exists("{$diretorio}/" . $url . '.php')) ? $url : '404';

            return $pg;
        }
    }

    /**
     * Method validatePage
     *
     * @param string $page 
     *
     * @return string
     */
    private static function validatePage($pg)
    {
        /* obtém uma lista das páginas do sistema */
        $pages = PagesController::getPages();

        $pagesInactivies = self::pagesInactivies($pages);
        $pagesMaintenance = self::pagesMaintenance($pages);

        if (in_array($pg, $pagesInactivies)) {

            /* retorna uma página para a view */
            return self::getDirectory() . '/inative-page.php';
        }

        if (in_array($pg, $pagesMaintenance)) {

            /* retorna uma página para a view */
            return self::getDirectory() . '/maintenance-page.php';
        }

        return self::getDirectory() . '/' . $pg . '.php';
    }

    /**
     * Método responsável por obter as páginas inativas
     *
     * @param array $pages 
     *
     * @return array
     */
    private static function pagesInactivies($pages)
    {
        /* armazena a resposta do método */
        $response = [];

        /* itera os dados para obter as páginas desativadas */
        foreach ($pages as $value) {

            switch ($value['active']) {
                case 0:
                    $response[] = $value['slug'];
                    break;
            }
        }

        /* retorna uma lista em formato de array */
        return $response;
    }

    /**
     * Método responsável por obter as páginas em manutenção
     *
     * @param array $pages 
     *
     * @return array
     */
    private static function pagesMaintenance($pages)
    {
        /* armazena a resposta do método */
        $response = [];

        /* itera os dados para obter as páginas em manutenção */
        foreach ($pages as $value) {

            switch ($value['maintenance']) {
                case 1:
                    $response[] = $value['slug'];
                    break;
            }
        }

        /* retorna uma lista em formato de array */
        return $response;
    }
}
