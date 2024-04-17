<?php

// Importa a classe Router
require_once __DIR__ . '/../../app/Router.php';

// Define as rotas

// Rota para a página inicial
Router::route('GET', '~^/$~', 'HomeController@index');

// Rota para a página de registro
Router::route('GET', '~^/register$~', 'RegisterController@showForm');
Router::route('POST', '~^/register$~', 'RegisterController@registerUser');

?>
