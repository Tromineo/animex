# Anime CRUD API

API RESTful criada com Lumen que permite gerenciar um banco de dados de animes. 

## Requisitos

- PHP >= 7.3
- Composer

## Instalação

1. Clone o repositório:
   ```sh
   git clone https://github.com/seu-usuario/anime-crud-api.git
   cd anime-crud-api
2.Instale as dependências do projeto:
  ```sh
  composer install
```
3.Configure o arquivo .env. Você pode copiar o arquivo de exemplo:
```sh
cp .env.example .env
```
4. Configure o banco de dados no arquivo .env.
5. Execute as migrações do banco de dados:
```sh
php artisan migrate
```

## Executando o Servidor
Para iniciar o servidor, use o seguinte comando:
```sh
php -S localhost:5001 -t public
```

## Estrutura do Projeto

- `/app` - Contém o código da aplicação
- `/routes` - Contém as definições de rotas da API
- `/database` - Contém as migrações e seeders do banco de dados
- `/public` - Contém o ponto de entrada público para a aplicação

  


