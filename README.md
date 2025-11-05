## Installation

```bash
npm install
composer install
```

## Running the Application

```bash
composer run dev
```

## Creating Dummy Data

Run these commands in tinker:

```bash
php artisan tinker
```

Then execute:

```php
App\Models\User::factory()->count(1)->create()
App\Models\Post::factory()->count(1)->create()
App\Models\Project::factory()->count(1)->create()
```
