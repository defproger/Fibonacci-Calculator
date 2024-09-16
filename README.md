# Fibonacci Calculator

### Description

## Quick start

### .env Configuration

rename the `.env.example` to `.env` and set the values

### Running container

```sh
docker-compose up --build -d
```

### Opening the container console

```sh
docker exec -it calculator-web zsh
```

### Database migration

if you need database migration - the sql file located is `db/migration.sql`

### Installing npm dependencies

After the container is running, you can install the npm dependencies if its not installed yet automatically:

```sh
docker exec -it calculator-web npm install
docker exec -it calculator-web composer install
```

### Building assets with Webpack

Once dependencies are installed, build the assets using Webpack:

```sh
docker exec -it calculator-web npx webpack --mode production
```
or 

```sh
docker exec -it calculator-web npx webpack --watch --mode development
```