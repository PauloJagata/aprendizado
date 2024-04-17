<?php

// Inclui o arquivo de configuração (opcional)
require_once __DIR__ . '/../config/config.php';

// Inclui o arquivo de roteamento
require_once __DIR__ . '/../routes/web.php';

// Manipula a requisição
Router::handleRequest();

?>
