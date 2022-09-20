<?php

namespace App\Http;

class Request
{
    /**
     * Método HTTP da requisição
     *
     * @var string
     */
    private $httpMethod;

    /**
     * URI da página
     *
     * @var string
     */
    private $uri;

    /**
     * Parâmetros da URL ($_GET)
     *
     * @var array
     */
    private $queryParams = [];

    /**
     * Variáveis recebidas no POST da página
     *
     * @var array
     */
    private $postVars = [];

    /**
     * Cabeçalho da requisição
     *
     * @var array
     */
    private $headers = [];

    public function __construct()
    {
        $this->queryParams = $_GET ?? [];
        $this->postVars    = $_POST ?? [];
        $this->headers     = getallheaders();
        $this->httpMethod  = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->setUri();
    }

    /**
     * Método responsável por definir a URI
     */
    private function setUri()
    {
        /* URI completa (com GETs) */
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';

        /* remove GETs da URI */
        $xUri = explode('?', $this->uri);
        $this->uri = $xUri[0];
    }

    /**
     * Método responsável por retornar o método HTTP da requisição
     *
     * @return string
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * Método responsável por retornar a URI da requisição
     *
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Método responsável por retornar as headers da requisição
     *
     * @return string
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Método responsável por retornar os parâmetros da requisição
     *
     * @return string
     */
    public function getQueryParams()
    {
        return $this->queryParams;
    }

    /**
     * Método responsável por retornar as variáveis da requisição
     *
     * @return string
     */
    public function getPostVars()
    {
        return $this->postVars;
    }

}
