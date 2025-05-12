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
git clone https://github.com/yourusername/expense-tracker-api.git
cd expense-tracker-api

Authentication
Register and login using:

POST /api/register

POST /api/login

Use the returned token to authenticate further requests by setting the Authorization header:
