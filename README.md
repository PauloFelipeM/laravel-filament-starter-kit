# Laravel 12 + Livewire 3 + Filament 4 Starter Kit

A production-ready starter kit for building modern SaaS applications with Laravel 12, Livewire 3, and Filament 4. Comes with authentication, social login, Stripe billing, a digital wallet system, and a fully configured admin panel out of the box.

## Requirements

- PHP 8.2+
- Composer
- Node.js & NPM

## Quick Start

```bash
# Clone the repository
git clone https://github.com/PauloFelipeM/laravel-livewire-filament-skeleton.git
cd laravel-livewire-filament-skeleton

# Install dependencies, generate key, and run migrations
composer run setup

# Start the development server (app, queue, logs, and Vite)
composer run dev
```

The application will be available at `http://localhost:8000` and the admin panel at `/admin`.

## Features

### Authentication & Security
- User registration and login
- Email verification
- Two-factor authentication (app-based with recovery codes)
- Social login via Google, Facebook, GitHub, and Twitter
- Password reset
- Profile management
- API token authentication (Sanctum)

### Payments & Wallet
- Stripe checkout integration (Laravel Cashier)
- Subscription management
- Digital wallet with balance tracking (Laravel Wallet)
- Transaction and transfer history

### Admin Panel (Filament 4)
- SPA mode for fast navigation
- Dashboard
- General settings management (site name, logo, registration toggle, social login toggle)
- Database notifications
- Unsaved changes alerts
- Responsive layout with collapsible sidebar

### Localization
- English and Brazilian Portuguese included
- Ready for additional languages

## Tech Stack

| Layer     | Technology                            |
|-----------|---------------------------------------|
| Framework | Laravel 12                            |
| Frontend  | Livewire 3, Flux, Tailwind CSS 4      |
| Admin     | Filament 4                            |
| Payments  | Stripe via Laravel Cashier            |
| Wallet    | Bavix Laravel Wallet                  |
| Auth      | Sanctum, Filament Socialite           |
| Settings  | Spatie Laravel Settings               |
| Build     | Vite 7                                |
| Testing   | PestPHP                               |
| Database  | SQLite (default), MySQL/PostgreSQL    |

## Project Structure

```
app/
├── Filament/Pages/        # Admin panel pages (Dashboard, Settings)
├── Models/                # Eloquent models
├── Providers/             # Service & Filament panel providers
└── Settings/              # Spatie settings classes

routes/
├── web.php                # Checkout routes
├── api.php                # Token-based API endpoints
└── console.php            # Artisan commands

resources/views/
├── checkout/              # Stripe success/cancel pages
├── components/            # Reusable Blade components
└── livewire/              # Livewire component views

database/migrations/       # 20 migrations (users, wallet, subscriptions, etc.)
lang/                      # en + pt_BR translations
```

## Environment Configuration

Copy `.env.example` to `.env` and configure the following:

```env
# Stripe
STRIPE_KEY=your_stripe_key
STRIPE_SECRET=your_stripe_secret

# Social Login (Google example)
GOOGLE_CLIENT_ID=your_client_id
GOOGLE_CLIENT_SECRET=your_client_secret
GOOGLE_REDIRECT_URI=your_redirect_uri

# Mail
MAIL_HOST=your_mail_host
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

## API Endpoints

| Method | Endpoint              | Description               | Auth     |
|--------|-----------------------|---------------------------|----------|
| GET    | `/api/user`           | Get authenticated user    | Token    |
| POST   | `/api/wallets/tests`  | Test wallet deposit       | Token    |

## Testing

```bash
php artisan test
```

Tests cover authentication flows, profile settings, two-factor authentication, email verification, and dashboard access.

## Scripts

| Command              | Description                                          |
|----------------------|------------------------------------------------------|
| `composer run setup` | Install dependencies, generate app key, run migrations |
| `composer run dev`   | Start dev server, queue worker, log watcher, and Vite  |

## Wallet Documentation

The wallet system is powered by Bavix Laravel Wallet. See the full documentation at [bavix.github.io/laravel-wallet](https://bavix.github.io/laravel-wallet/).

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
