<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

### **Crypto Accounting Software in Laravel**

This **Crypto Accounting Software** is built using the Laravel framework and includes features for managing cryptocurrency transactions. It allows users to:

- **Authenticate** using secure JWT tokens.
- **Perform CRUD operations** on cryptocurrency transactions.
- Manage real-time cryptocurrency prices.

---

### **Steps to Run the Crypto Accounting Software**

Follow these simple steps to set up and run the Laravel project for the Crypto Accounting Software:

---

#### **1. Prerequisites**
Ensure the following tools are installed on your machine:
- PHP (`>= 8.0`)
- Composer
- MySQL
- Node.js (for frontend assets, optional)
- A web server (e.g., XAMPP, WAMP, or Laravel Valet)

---

#### **2. Clone the Repository**
If the code is in a Git repository:
```bash
git clone <repository_url>
cd <repository_folder>
```

---

#### **3. Install Dependencies**
Run the following commands to install PHP and Node.js dependencies:

```bash
composer install
npm install
```

---

#### **4. Set Environment Variables**
Copy the `.env.example` file to create a `.env` file:
```bash
cp .env.example .env
```

Edit the `.env` file to configure your database and other settings:
```env
APP_NAME=CryptoAccounting
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crypto_accounting
DB_USERNAME=root
DB_PASSWORD=
```

---

#### **5. Generate the Application Key**
Run this command to generate the `APP_KEY` required for Laravel:
```bash
php artisan key:generate
```

---

#### **6. Configure JWT Authentication**
Generate the `JWT_SECRET` key for secure token authentication:
```bash
php artisan jwt:secret
```

---

#### **7. Run Database Migrations and Seed Data**
Run the migrations to create database tables:
```bash
php artisan migrate
```

(Optional) Seed the database with sample data:
```bash
php artisan db:seed
```

---

#### **8. Start the Laravel Development Server**
Run the server locally:
```bash
php artisan serve
```

The application will now be accessible at:
```
http://127.0.0.1:8000
```

---

### **Using the Application**

1. **Register and Login**:
   - Register a new user via the `/api/v1/register` endpoint.
   - Log in via the `/api/v1/login` endpoint to get a JWT token.

2. **Perform Transactions**:
   - Use the token in the `Authorization: Bearer <token>` header to access protected endpoints:
     - Add a transaction: `/api/v1/transactions` (POST)
     - View transactions: `/api/v1/transactions` (GET)
     - View a single transaction: `/api/v1/transactions/{id}` (GET)

---

### **Common Laravel Commands**

1. **Run the Application Locally**:
   ```bash
   php artisan serve
   ```

2. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

3. **Seed the Database**:
   ```bash
   php artisan db:seed
   ```

4. **Clear Cache**:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   ```

5. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

---

