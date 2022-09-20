<?php

use App\Actions\Logout;

/* inicia uma sessão */
session_start();

/* libera todas as variáveis de sessão */
session_unset();

/* destri a sessão */
session_destroy();

Logout::exit();