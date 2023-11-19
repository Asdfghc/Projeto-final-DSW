# Projeto final de Desenvolvimento de Sistemas Web

Integrantes:
-Felipe Pires Leonardi 23013506
-Lucas Camargo Teixeira 23011315
-Lucas Henrique Meng 23003677
-Vitor Dourado Pinheiro 23012787
-Rafael Monezi Prado 23005030

Links úteis:
-Docs com a documentação dos commits: https://docs.google.com/document/d/1HaD3h8IGkjj9hyNrZJrH8HB6fVgW_5B9nL1udtAIgUs/edit?usp=sharing
-Trello: https://trello.com/b/cGSYYFAj/pi-web
-Canva: https://www.canva.com/design/DAFwxNQ1L9g/3ybT6Qj5iSQMurFolQ6z_g/view?utm_content=DAFwxNQ1L9g&utm_campaign=designshare&utm_medium=link&utm_source=publishsharelink

Projeto final para o curso PI: Desenvolvimento de Sistemas Web da PUC-Campinas 2023

Este repositório se trata de um sistema web que simula um site público de um buffet infantil de festas.
O site é capaz de fazer o registro de usuários, cadastro de reservas de horário, cadastro de convidados, etc.


### SETUP Passo a passo
Clone Repositório
```sh
git clone -b main https://github.com/Asdfghc/Proj-final-DSW.git app-laravel
```

```sh
cd app-laravel
```

Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=Laravel
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container app
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```

Instale o pacote de cargos
```sh
composer require spatie/laravel-permission
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Faça as migrações e seeding
```sh
php artisan migrate --seed
```

Acesse o projeto
[http://localhost:8989](http://localhost:8989)


###Informações adicionais

Por padrão, são criadas 3 tipos de contas, além das contas criadas por usuários. Essas contas são:

-Administrativa

    Email:admin@staff.com
    Senha:admin
    
-Operacional

    Email:ope@staff.com
    Senha:ope
    
-Comercial

    Email:comerc@staff.com
    Senha:comerc
    
