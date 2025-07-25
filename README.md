````markdown
# Laravel Invoice App

A Laravel-based Invoice Generator  with email notifications.

## 🚀 Features

- Create invoices, and  small invoice Generator with event-Based email notification and queue Handling
- Email notifications upon invoice creation
- Laravel Events and Listeners support
- I was used mail service  for testing  Mailtrap sandox 

---

## 🛠️ Requirements

- PHP >= 8.1
- Composer
- MySQL
- Laravel >= 10.x

---

## 📦 Installation & Local Setup

Follow these steps to run the project locally:

### 1. Clone the Repository

```bash
git clone https://github.com/saravana-rs/laravel-invoice-app.git
cd laravel-invoice-app
````

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Set Up Environment

Copy the example `.env` file and generate an app key:

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database

Update your `.env` file with your local database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db_name
DB_USERNAME=root
DB_PASSWORD=
```

Then run migrations:

```bash
php artisan migrate
```

### 5. Configure Mail (Optional)

For local testing, you can use [Mailtrap](https://mailtrap.io) or Mailpit.

#### Example for Mailtrap:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=no-reply@example.com
MAIL_FROM_NAME="Laravel Invoice App"
```

### 6. Run the Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

---

