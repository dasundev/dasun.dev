# The source code of dasun.dev

<a href="https://github.com/dasundev/dasun.dev/actions"><img src="https://img.shields.io/github/actions/workflow/status/dasundev/dasun.dev/tests.yml?label=tests" alt="Build Status"></a>

## ✨ Introduction

Welcome to the source code repository for [Dasun's website](https://www.dasun.dev). Feel free to explore, learn new things, and contribute to this codebase.

## 📦 Installation

This is a Laravel application, built on Laravel 10 and uses Livewire and TailwindCSS for the frontend. If you're familiar with Laravel, you'll feel right at home.

In terms of local development, you can use the following requirements:

- PHP 8.1 - with SQLite, GD, and other common extensions.
- Node.js 16 or more recent.

If you have these requirements, you can start by cloning the repository and installing the dependencies:
```bash
git clone https://github.com/dasundev/dasun.dev.git

cd dasun.dev

git checkout -b feat/your-feature # or fix/your-fix
```

> [!IMPORTANT]
> Don't push directly to the main branch. Instead, create a new branch and push it to your branch.

Install PHP and Node.js dependencies:
```bash
composer install

npm install
```

Set up your environment file and generate the application key:
```bash
cp .env.example .env

php artisan key:generate
```

Prepare your database and run the migrations:
```bash
touch database/database.sqlite

php artisan migrate
```

Link the storage to the public folder:
```bash
php artisan storage:link
```

In a separate terminal, build the assets in watch mode:
```bash
npm run dev
```

Run the database migrations.
```bash
php artisan queue:work
```

Finally, start the development server:
```bash
php artisan serve
```

That's it! You're now ready to start local development on dasun.dev. If you have any questions or run into issues, don't hesitate to reach out or create an issue on the repository.


