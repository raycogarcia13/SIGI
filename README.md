# CROMA CUPET

Proyecto de gestión del flujo interno y de toda la actividad empresarial de la empresa CUPET, de la Isla de la Juventud

---

## Instalación

1. Instalar composer en la pc

2. Descargar el proyecto, ya sea por git o directamente, aconsejo por git `(si es por git, tienes que instalar git.)`

    ```git
    git clone https://github.com/raycogarcia13/sigi
    ```

3. Instalar PHP, version 7.2

4. Instalar los modulos de php

    ```php
    cd sigi
    composer update
    ```

## Base de datos

configurar el .env

Si tiene una las tablas viejas, y desea limpiarla y correr la nueva migración:
```php
php artisan migrate:fresh
```

Crear la BD y las Tablas:

```php
php artisan migrate
```

Rellenar con los datos de prueba:

```php
php artisan db:seed
```

Generar una llave:

```php
php artisan key:generate
```

`Nota: Revisa primero en database/migrations/seeds/UsersTableConfigUser la contraseña del usuario, si el que yo cree, el usuario es root/kronosk13`

Casi todo.
