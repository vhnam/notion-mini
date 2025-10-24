# Notion Mini

A Laravel application with Livewire, Fortify authentication, and modern frontend tooling.

## Features

- **Laravel 12** - Latest Laravel framework
- **Livewire 3** - Full-stack framework for Laravel
- **Livewire Flux** - Beautiful UI components
- **Laravel Fortify** - Authentication scaffolding
- **PostgreSQL** - Database with Docker
- **Laravel Sail** - Docker development environment
- **pnpm** - Fast, disk space efficient package manager
- **Vite** - Next generation frontend tooling
- **Tailwind CSS** - Utility-first CSS framework

## Development Setup

This project uses Laravel Sail for Docker-based development. Make sure you have Docker installed on your system.

### Prerequisites

- Docker and Docker Compose
- Git

### Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd notion-mini
    ```

2. **Create environment file**

    ```bash
    cp .env.example .env
    ```

3. **Start the development environment**

    ```bash
    ./vendor/bin/sail up -d
    ```

4. **Install PHP dependencies**

    ```bash
    ./vendor/bin/sail composer install
    ```

5. **Generate application key**

    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

6. **Install Node.js dependencies**

    ```bash
    ./vendor/bin/sail pnpm install
    ```

7. **Run database migrations**

    ```bash
    ./vendor/bin/sail artisan migrate
    ```

8. **Build frontend assets**
    ```bash
    ./vendor/bin/sail pnpm run build
    ```

### Development Commands

- **Start development server**: `./vendor/bin/sail up -d`
- **Stop development server**: `./vendor/bin/sail down`
- **Run tests**: `./vendor/bin/sail test`
- **Run migrations**: `./vendor/bin/sail artisan migrate`
- **Install packages**: `./vendor/bin/sail pnpm install`
- **Build assets**: `./vendor/bin/sail pnpm run build`
- **Watch assets**: `./vendor/bin/sail pnpm run dev`

### Accessing the Application

- **Web Application**: http://localhost
- **Database**: localhost:5432 (PostgreSQL)
- **Vite Dev Server**: http://localhost:5173

### Package Management

This project uses pnpm for Node.js package management. All npm commands should be run through Sail:

```bash
# Install packages
./vendor/bin/sail pnpm install

# Add new package
./vendor/bin/sail pnpm add <package-name>

# Remove package
./vendor/bin/sail pnpm remove <package-name>

# Run scripts
./vendor/bin/sail pnpm run <script-name>
```
