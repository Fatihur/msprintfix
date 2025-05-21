# MS Print Fix - Point of Sale & Inventory Management System

A comprehensive point of sale (POS) and inventory management system built with Laravel. This application helps businesses manage their products, sales, inventory, and suppliers efficiently.

## Features

### Product Management
- Create and manage products with details like title, description, price, and stock
- Upload product images
- Organize products by categories
- Track product inventory levels

### Sales Management
- Record sales transactions
- Store customer information
- Generate detailed sales reports
- Track sales by date and customer

### Inventory Management
- Track incoming stock (Barang Masuk)
- Record purchase prices and quantities
- Automatically update product stock levels
- Monitor stock movements

### Supplier Management
- Maintain supplier database
- Record supplier contact information
- Track purchases by supplier
- Manage supplier relationships

### Categories
- Organize products into categories
- Flexible category management
- Easy product categorization

## Technical Stack

- **Framework**: Laravel
- **Database**: MySQL
- **Frontend**: Blade templates with Livewire
- **Authentication**: Laravel built-in auth
- **File Storage**: Laravel storage system
- **API**: RESTful API endpoints available

## Installation

1. Clone the repository
2. Install dependencies:
```bash
composer install
npm install
```

3. Copy `.env.example` to `.env` and configure your database

4. Generate application key:
```bash
php artisan key:generate
```

5. Run migrations:
```bash
php artisan migrate
```

6. Seed the database (optional):
```bash
php artisan db:seed
```

7. Link storage:
```bash
php artisan storage:link
```

8. Start the development server:
```bash
php artisan serve
```

## Usage

1. Login to the system using your credentials
2. Navigate through the menu to access different modules:
   - Products
   - Categories
   - Sales
   - Inventory
   - Suppliers
3. Use the dashboard to get an overview of your business metrics

## API Documentation

The system provides REST API endpoints for:
- Products management
- Sales transactions
- Inventory management
- Supplier management
- Category management

Each API endpoint is properly authenticated and follows RESTful conventions.

## License

This application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
