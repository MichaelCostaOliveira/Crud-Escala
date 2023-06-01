# Escala de colaborador

Esta aplicação foi desenvolvida utilizando o Laravel 10.
Laravel Passport 11

## Requisitos

Certifique-se de ter os seguintes requisitos instalados em seu ambiente de desenvolvimento:

- PHP 8.1 ou superior
- Composer
- MySQL ou outro banco de dados compatível
- Redis

## Instalação

Siga as etapas abaixo para configurar e executar a aplicação:

1. Clone este repositório para sua máquina local.
2. Navegue até o diretório da aplicação no terminal.
3. Execute o comando `composer install` para instalar as dependências.
4. Faça uma cópia do arquivo `.env.example` e renomeie-o para `.env`.
5. Configure as informações de conexão com o banco de dados no arquivo `.env`.
6. Execute o comando `php artisan key:generate` para gerar uma chave única para a aplicação.
7. Execute o comando `php artisan migrate` para migrar o esquema do banco de dados.
8. Execute o comando `php artisan db:seed` para executar os seeders e popular o banco de dados com dados iniciais.

## Executando a Aplicação

Para executar a aplicação ,você pode usar essa configuração para seu Nginx no docker
 `
    server {
        listen 80;
        listen [::]:80;
        # For https
        # listen 443 ssl default_server;
        # listen [::]:443 ssl default_server ipv6only=on;
        # ssl_certificate /etc/nginx/ssl/default.crt;
        # ssl_certificate_key /etc/nginx/ssl/default.key;

    server_name escala-colaborador.local;
    root /var/www/escala-colaborador/public;
    index index.php index.html index.htm;
    location / {
         try_files $uri $uri/ /index.php$is_args$args;
    }
    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_pass php8-fpm:9000;
        fastcgi_index index.php;
        fastcgi_buffers 16 16k;
        fastcgi_buffer_size 32k;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #fixes timeouts
        fastcgi_read_timeout 600;
        include fastcgi_params;
        # # CORS settings
        # # http://enable-cors.org/server_nginx.html
        # add_header 'Access-Control-Allow-Origin' '*';
        # add_header 'Access-Control-Allow-Credentials' 'true';
        # add_header 'Access-Control-Allow-Methods' 'GET, POST, DELETE, PUT';
        # add_header 'Access-Control-Allow-Headers' 'Version,Accept,Accept-Encoding,Accept-Language,Connection,Coockie,Authorization,DNT,X-CustomHeader,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type';
    }
    location ~ /\.ht {
        deny all;
    }
    location /.well-known/acme-challenge/ {
        root /var/www/letsencrypt/;
        log_not_found off;
    }

## Testes

A aplicação possui testes automatizados para garantir a qualidade do código. Para executar os testes, utilize o comando `php artisan test`.

## Documentação das rotas
A aplicação possui documentação de rotas da api. Para acessar basta utilizar o usuário gerado no seeder
