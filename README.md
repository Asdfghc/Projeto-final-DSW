# Projeto final de Desenvolvimento de Sistemas Web

(Descrição)


### SETUP Passo a passo
Clone Repositório
```sh
git clone -b Producao https://github.com/Asdfghc/Projeto-final-DSW.git app-laravel
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
APP_NAME=EspecializaTi
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
