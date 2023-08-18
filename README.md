<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



1. **Instalar as dependências do Laravel:** instale as dependências do Composer:

   ```
   composer install
   ```

2. **Configurar o arquivo .env:** Renomeie o arquivo `.env.example` para `.env` e defina as configurações de banco de dados e outras configurações necessárias para o Laravel funcionar corretamente:

3. **Gerar a chave de criptografia:** Execute o comando php artisan key:generate para gerar a chave de criptografia do Laravel:

    ```
    php artisan key:generate
    ```

4. **Migrar o banco de dados:** Execute as migrações para criar as tabelas do banco de dados:

   ```
   php artisan migrate
   ```
    5.**Rode as duas querys no banco de dados

        ```
        INSERT INTO tipo_logradouro (nome) VALUES
        ('Rua'), ('Avenida'), ('Praça');
    
        INSERT INTO cidade (nome) VALUES
        ('Belo Horizonte'), ('Betim'), ('Contagem');
        ```

6. **Iniciar o servidor do Laravel:** Execute o servidor do Laravel para que o back-end esteja em execução:

   ```
   php artisan serve
   ```

7. **Acessar o projeto:** Agora, você pode acessar o projeto em seu navegador digitando o endereço fornecido pelo servidor do Laravel (geralmente http://localhost:8000/).

