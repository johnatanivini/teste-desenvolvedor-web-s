# teste-desenvolvedor-web
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

## Documentação da API
https://documenter.getpostman.com/view/3123251/TzeXkT84

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

## Gera chave de configuração

Após a construção dos serviços:

    php artisan key:generate
    php artisan db:wipe 
    php artisan migrate 
    php artisan migrate:auth
    php artisan passport:install 
    php artisan passport:install --uuids 
    php artisan vendor:publish --tag=passport-config
    php artisan vendor:publish --tag=passport-migrations

Executa geração da key pra questões de segurança

`php artisan key:generate`

Executa o drop do banco em desenvolvimento ( Cuidado )

`php artisan migrate db:wipe`

Executa migrações do banco de dados Mysql, e tabelas do Passaport

`php artisan migrate`

Configurando passaport, gera dois clientes com um token secret

`php artisan passport:install`

Publicar configuração Passaport para as variaveis de ambiente

`php artisan vendor:publish --tag=passport-config`

Depois adicionar as chaves publicas e privadas, localizadas no diretorio storage, no arquivo .env

as chaves encriptadas como variaveis de ambiente.

PASSPORT_PRIVATE_KEY="-----BEGIN RSA PRIVATE KEY-----
<private key here>
-----END RSA PRIVATE KEY-----"

PASSPORT_PUBLIC_KEY="-----BEGIN PUBLIC KEY-----
<public key here>
-----END PUBLIC KEY-----"

A documentação do Passaport está localizada no link abaixo:

https://laravel.com/docs/8.x/passport#passport-or-sanctum

Acompanhar logs gerados pelo Laravel pelo docker em algum terminal

`docker exec -it loja-vendas tail -f storage/logs/laravel.log`

# Frontend Bootstrap 5

Versão do NodeJs 14.*
Versão do npm 6.*

`php artisan ui bootstrap`

 Gerar telas de login

 `php artisan ui bootstrap --auth`

 Instalando dependencias e executando server

 `npm install && npm run dev`

 Rodar Laravel MIX

 `npx mix`
