# Fibonacci Calculator

### Description

- PHP MVC
- Docker
- MySQL
- jQuery (AJAX)
- Bootstrap

## Quick start

### .env Configuration

rename the `.env.example` to `.env` and set the values

### Running container

```sh
docker-compose up --build -d
```

Now you can access the application at [http://localhost:8080](http://localhost:8080)

### Opening the container console

```sh
docker exec -it calculator-web zsh
```

### Database migration

When container starts its auto-install database, but if you need database migration - the sql file located is `db/migration.sql`
