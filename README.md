# .htaccess
RewriteEngine On
RewriteBase /

# Redireciona todas as requisições para o index.php
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [QSA,L]
