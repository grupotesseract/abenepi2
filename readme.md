# Site do Simpósio Transtornos Neuropsiquiátricos da Infância e Adolescência - ABENEPI

## Instalando o Projeto

1. **Clone do projeto**

```
git clone --recurse-submodules https://github.com/Acquati/abenepi2
```

2. **Criando o .env do Laravel**

- **Áreas que precisam ser configuradas:**
```
APP_URL=http://localhost:8080
```
```
DB_CONNECTION=pgsql
DB_HOST=172.17.0.1
DB_PORT=5432
DB_DATABASE=abenepi2
DB_USERNAME=default
DB_PASSWORD=secret
```

3. **Criando o .env do Laradock**

- **Áreas que precisam ser configuradas:**
```
# Data Path
Choose storage path on your machine. For all storage systems.
DATA_SAVE_PATH=~/.laradock/abenepi2
```
```
# PHP_FPM
PHP_FPM_INSTALL_PGSQL=true
```
```
# NGINX
NGINX_HOST_HTTP_PORT=8080
```
```
# POSTGRES
POSTGRES_DB=abenepi2
POSTGRES_USER=default
POSTGRES_PASSWORD=secret
POSTGRES_PORT=5432
```

4. **Comandos pasta Laradock**

```
cd laradock
docker-compose up -d nginx php-fpm postgres
docker-compose exec --user=laradock workspace composer install
docker-compose exec --user=laradock workspace php artisan key:generate
```

5. **Migrate do DB**

```
docker-compose exec --user=laradock workspace php artisan migrate
```
- Caso o Laradock não crie o DB automaticamente, crie manualmente:
```
docker-compose exec postgres createdb -U default postagem
docker-compose exec --user=laradock workspace php artisan migrate
```

6. **NPM**

```
npm install
```
- Caso de erro no pngquant
```
sudo apt-get install libpng-dev
npm install -g pngquant-bin
```
```
npm run dev
```
- Compilando os assets automaticamente
```
npm run watch
```


## Passos da criação do projeto Laravel com Laradock

1. **Clonando a o repositório após cria-lo no GitHub**

```
cd Documents
git clone https://github.com/grupotesseract/abenepi2.git
cd abenepi2
```

2. **Adicionando o Laravel**

```
cd ..
git clone https://github.com/laravel/laravel.git
cd laravel
rm -rf .git
cp -r ./ ~/Documents/abenepi2
git add .
git commit -m "Adicionando o Laravel"
ggpush
```

3. **Criando o read.me com passos da instalação do projeto**

```
git add .
git commit -m "Criando o read.me com passos da instalação do projeto"
ggpush
```

4. **Criando o .gitignore pelo gitignor.io**

- https://www.gitignore.io/api/node,laravel

```
git add .
git commit -m "Criando o .gitignore pelo gitignor.io"
ggpush
```

5. **Adicionando o Laradock como sub-módulo**

```
git submodule add https://github.com/laradock/laradock.git
git add .
git commit -m "Adicionando o Laradock como sub-módulo"
ggpush
```
