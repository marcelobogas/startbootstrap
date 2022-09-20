<?php

namespace App\Http;

class Response
{    
    /**
     * Código do Status HTTP
     *
     * @var integer
     */
    private $httpCode = 200;
    
    /**
     * Cabeçalho do Response
     *
     * @var array
     */
    private $headers = [];
    
    /**
     * Tipo do conteúdo que está sendo retornado
     *
     * @var string
     */
    private $contentType = 'text/html';
    
    /**
     * Conteúdo do Response
     *
     * @var mixed
     */
    private $content;
    
    /**
     * Método responsável por iniciar a classe e definir os valores
     *
     * @param integer $httpCode
     * @param mixed $content
     * @param string $contentType
     *
     * @return void
     */
    public function __construct($httpCode, $content, $contentType = 'text/html')
    {
        $this->httpCode    = $httpCode;
        $this->content     = $content;
        $this->setContentType($contentType);
    }
    
    /**
     * Método responsável por alterar o content do Response
     *
     * @param $contentType $contentType
     *
     * @return string
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }
    
    /**
     * Método responsável por adicionar um registro no cabeçalho de Response
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }
    
    /**
     * Método responsável por enviar os header para o navegador
     *
     */
    private function sendHeaders()
    {
        /* Status */
        http_response_code($this->httpCode);

        /* Enviar Headers */
        foreach ($this->headers as $key => $value)
        {
            header($key . ': ' . $value);
        }
    }
    
    /**
     * Método responsável por enviar a resposta para o usuário
     *
     */
    public function sendResponse()
    {
        /* Envia os Headers */
        $this->sendHeaders();

        /* Envia o conteúdo */
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }        
    }
}
