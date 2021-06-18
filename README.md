# teste-desenvolvedor-web-spintec
Teste desenvolvedor Web 

Os detalhes do teste, que serão avaliados foram salvos no notion.so

https://www.notion.so/Teste-Desenvolvedor-Web-fca6b6bf0ae54d339201318c9de0bd12

Tecnologias utilizadas:

- PHP 8+
- MariaDb ( Open Source)
- Bootstrap 5
- HMTML
- CSS
- Javascript
- Laravel

A modelagem e demais informações do projeto, serão adicionadas conforme for gerando os artefatos.
https://www.notion.so/Resolu-es-3746fc29639c45259b2883d433889962

## Antes de executar

Copiar .env.exemple para .env

E Alterar as variaveis de ambiente:

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=loja
DB_USERNAME=root
DB_PASSWORD=loja

## Executando o projeto

Contrução dos servicos:

- Api
- MariaDB
- SGDB - Adminer para Mysql

`docker compose up -d`
## gera chave de configração

Após a construção dos serviços:

Executar geração da key pra questões de segurança

`docker exec -it loja-vendas php artisan key:generate`

Reinicia o servico para reconhecer novamente as variaveis de ambiente

`docker compose restart`

Executar migrações do banco de dados Mysql, e tabelas do Passaport

`docker exec -it loja-vendas php artisan migrate`

Configurando passaport, gera dois clientes com um token secret

`docker exec -it loja-vendas php artisan passport:install`

Acompanhar logs gerados pelo Laravel

`docker exec -it loja-vendas tail -f storage/logs/laravel.log`
