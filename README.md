# API RESTful de Productos con Laravel

Este proyecto implementa una API RESTful para gestionar productos utilizando Laravel 10, siguiendo principios SOLID y documentado con Swagger.

## 🚀 Instalación

1. Clonar el repositorio:
   ```sh
   git clone https://github.com/JavsGil/products_crud.git
   cd api-productos
   ```
2. Instalar dependencias:
   ```sh
   composer install
   ```
3. Configurar variables de entorno:
   ```sh
   cp .env.example .env
   ```
4. Levantar la base de datos con Docker:
   ```sh
   docker-compose up -d
   ```
5. Generar la clave de la aplicación:
   ```sh
   php artisan key:generate
   ```
6. Ejecutar migraciones
   ```sh
   php artisan migrate --path=database/migrations/2025_04_01_220000_create_currencies_table.php
   php artisan migrate --path=database/migrations/2025_04_01_225438_create_products_table.php
   php artisan migrate --path=database/migrations/2025_04_01_225459_create_product_prices_table.php

   php artisan migrate (resto de tablas)

   ```
7. Generar documentación Swagger:

   ```sh
   php artisan l5-swagger:generate
   ```

8. Generar user seed:
   ```sh
   php artisan db:seed --class=UserSeeder
   ```

9. Iniciar el servidor de desarrollo:
   ```sh
   php artisan serve
   ```

10. Ejecutar los test:
   ```sh
  php artisan test
   ```

## 🛠 Tecnologías utilizadas

- Laravel 12
- MySQL 8 (Docker)
- Laravel Sanctum (Autenticación)
- Eloquent ORM
- Swagger (Documentación API)
- SOLID Principles

## 🔐 Autenticación
Esta API usa Laravel Sanctum para la autenticación. Para obtener un token:

```sh
POST /api/login
```

Con los siguientes datos:
```json
{
   "email": "testuser@example.com",
   "password": "password123"
}
```

El token recibido debe ser enviado en la cabecera `Authorization` en cada petición:
```sh
Authorization: Bearer {TOKEN}
```

## 📌 Endpoints Principales

### Divisas
- `POST /api/currencies` - Crear divisas

### Productos
- `GET /api/products` - Listar productos
- `POST /api/products` - Crear producto
- `GET /api/products/{id}` - Obtener producto por ID
- `PUT /api/products/{id}` - Actualizar producto
- `DELETE /api/products/{id}` - Eliminar producto

### Precios de Productos
- `GET /api/products/{id}/prices` - Obtener precios por producto
- `POST /api/products/{id}/prices` - Agregar precio a un producto

## 📝 Documentación Swagger

La documentación generada con Swagger está disponible en:
```
http://localhost:8000/api/documentation
```

## 📄 Licencia
Este proyecto está bajo la licencia de Javier Gil.

