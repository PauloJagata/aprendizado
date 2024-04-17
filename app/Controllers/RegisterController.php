<?php

class RegisterController {
    public function showForm() {
        include_once __DIR__ . '/../../resources/views/guest/register.php';
    }

    public function registerUser() {
        // Lógica de registro do usuário aqui
        echo "Registro do usuário";
    }
}

?>
