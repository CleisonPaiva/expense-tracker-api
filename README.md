# 📊 Expense Tracker API

A RESTful Laravel API for managing personal expenses with authentication using Laravel Sanctum, Swagger documentation, and support for filtering by category and month.

---

## 🚀 Technologies Used

- PHP 8.x
- Laravel 10.x
- Laravel Sanctum (API Authentication)
- PostgreSQL
- Swagger/OpenAPI (API Documentation)


---

## 📦 Features

- User registration and login
- Authentication with Laravel Sanctum (Bearer Token)
- Full CRUD for personal expenses
- Filtering by month and category
- Soft Deletes for expenses
- Swagger UI for exploring the API

---

## ⚙️ Installation

### 1. Clone the repository

```bash
git clone https://github.com/CleisonPaiva/expense-tracker-api.git
cd expense-tracker-api
```

#### Configure your .env to use PostgreSQL:
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=expense_tracker
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
#### Run migrations:
```bash
php artisan migrate
php artisan serve
```

### 2. 🔐 Authentication
#### Register and login using:
- `POST /api/register`
- `POST /api/login`

#### Use the returned token to authenticate further requests by setting the `Authorization` header:
```bash
Bearer YOUR_TOKEN
```

### 3. API Endpoints
#### Protected:

| Method | Endpoint           | Description          |
| ------ | ------------------ | -------------------- |
| GET    | /api/expenses      | List all expenses    |
| POST   | /api/expenses      | Create new expense   |
| GET    | /api/expenses/{id} | Get specific expense |
| PUT    | /api/expenses/{id} | Update expense       |
| DELETE | /api/expenses/{id} | Delete expense       |

### 4. 📘 Swagger Documentation
#### Swagger UI is available at:
```bash
http://localhost:8000/api/documentation
```
#### To regenerate Swagger docs manually:
```bash
php artisan l5-swagger:generate
```

### 5. 📁 Project Structure
- `app/Models/Expense.php` — Expense model
- `app/Http/Controllers/AuthController.php` — Handles user registration and login
- `app/Http/Controllers/ExpenseController.php` — Manages user expenses
- `routes/api.php` — API route definitions

### 6. 🧪 Testing
> ##### Not implemented yet. PHPUnit support coming soon.

### 7. 🔮 Future Improvements
- Add automated tests
- Add dashboard with charts and summaries
- Receipt file uploads
- Currency support
  
### 8. ✉️ Contact
##### Built with ❤️ by  [Cleison Paiva](https://www.linkedin.com/in/paiva-cleison/)


