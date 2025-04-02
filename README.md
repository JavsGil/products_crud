# RESTful API for Products with Laravel

This project implements a RESTful API to manage products using Laravel 10, following SOLID principles and documented with Swagger.

## 🚀 Installation.

1. Clone the repository:
   ```sh
   git clone https://github.com/tu-repositorio/api-productos.git
   cd api-products
   ```
2. Install dependencies:
   ````sh
   composer install
   ```
3. Set environment variables:
   ````sh
   cp .env.example .env
   ```
4. Raise the database with Docker:
   ````sh
   docker-compose up -d
   ```
5. Generate the application key:
   ````sh
   php artisan key:generate
   ```
6. Execute migrations
   ````sh
   php artisan migrate --path=database/migrations/2025_04_01_220000_create_currencies_table.php
   php artisan migrate --path=database/migrations/2025_04_01_225438_create_products_table.php
   php artisan migrate --path=database/migrations/2025_04_01_225459_create_product_prices_table.php

   php artisan migrate (rest of tables)

   ```
7. Generate Swagger documentation:

   ````sh
   php artisan l5-swagger:generate
   ```

8. Generate user seed:
   ````sh
   php artisan db:seed --class=UserSeeder
   ```

8. Start the development server:
   ````sh
   php artisan serve
   ```

## 🛠 Technologies used

- Laravel 12
- PHP ^8.2
- MySQL 8 (Docker)
- Laravel Sanctum (Authentication)
- Eloquent ORM
- Swagger (API Documentation)
- SOLID Principles
## 🔐 Authentication.
This API uses Laravel Sanctum for authentication. To get a token:
````sh
POST /api/login
```

With the following data:
```json
{
   "email": "testuser@example.com",
   "password": "password123"
}
```

The received token must be sent in the `Authorization` header in each request:
```sh
Authorization: Bearer {TOKEN}
```

## 📌 Main Endpoints

### Currencies
- `POST /api/currencies` - Create Currencies

### Products
- `GET /api/products` - List Products
- `POST /api/products` - Create Product
- `GET /api/products/{id}` - Get Product by Product ID
- `PUT /api/products/{id}` - Update product
- `DELETE /api/products/{id}` - Delete Product

### Product Pricing
- `GET /api/products/{id}/prices` - Get prices per product
- `POST /api/products/{id}/prices` - Add price to a product

## 📝 Swagger documentation

The documentation generated with Swagger is available at:
```
http://localhost:8000/api/documentation
```
## 📄 Licencia
This project is licensed to Javier Gil.