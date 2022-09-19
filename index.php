<?php

use App\Actions\PagesValidate;
use App\Core\Enviroments;

require __DIR__ . '/vendor/autoload.php';

/* carrega as variáveis de ambiente para o projeto */
Enviroments::load(__DIR__);

/* inclui a página inicial */
$url = (isset($_GET['url'])) ? $_GET['url'] : 'login';

/* retorna a página solicitada */
$page = PagesValidate::validate($url);

/* exibe a página solicitada */
require("{$page}");
