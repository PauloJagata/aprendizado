<?php

class Router {
    private static $routes = [];

    // Método para registrar uma rota
    public static function route($method, $pattern, $controllerMethod) {
        self::$routes[] = [
            'method' => $method,
            'pattern' => $pattern,
            'controllerMethod' => $controllerMethod
        ];
    }

    // Método para manipular as rotas
    public static function handleRequest() {
        $requestedMethod = $_SERVER['REQUEST_METHOD'];
        $requestedUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach (self::$routes as $route) {
            if ($route['method'] === $requestedMethod && preg_match($route['pattern'], $requestedUri, $matches)) {
                // Remove o primeiro elemento, pois é a correspondência completa
                array_shift($matches);

                // Chama o método do controlador passando parâmetros da URL
                $controllerMethod = explode('@', $route['controllerMethod']);
                $controllerName = $controllerMethod[0];
                $methodName = $controllerMethod[1];

                require_once __DIR__ . "/Controllers/{$controllerName}.php";
                $controllerInstance = new $controllerName();
                call_user_func_array([$controllerInstance, $methodName], $matches);
                return; // Interrompe o loop após a primeira correspondência
            }
        }

        // Se nenhuma rota correspondente for encontrada, mostra erro 404
        http_response_code(404);
        include_once __DIR__ . '/../resources/views/errors/404.php';
    }
}

?>
