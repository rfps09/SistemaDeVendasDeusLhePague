# [SistemaDeVendasDeusLhePague](https://github.com/rfps09/SistemaDeVendasDeusLhePague)
Site de vendas para disciplina da faculdade

Linguagem de Programção: PHP (versão 8.1.6)

FrameWork: [Laravel](https://laravel.com/) (versão 9.23.0)

Banco de dados: MySQL (MariaDB)

Instruções para rodar o projeto localmente:
- Instalar o [Composer](https://www.apachefriends.org/pt_br/index.html)
- Instalar o [Laravel](https://laravel.com/)
- Instalar o [Xampp](https://www.apachefriends.org/pt_br/index.html)
- abrir o projeto no terminal
- rodar o comando cp .env.example .env
- rodar o comando php artisan key:generate
- Iniciar o Apache e o MySQL
- acessar o localhost/phpmyadmin
- criar o banco de dados sysSales
- rodar o comando php artisan migrate no terminal
- Importar o backup do banco de dados
- rodar o comando php artisan serve
- acessar o localhost:8000/
