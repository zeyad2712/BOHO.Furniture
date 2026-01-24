---
description: Steps to deploy the BOHO Furniture Laravel application to production
---

# Deployment Workflow

Follow these steps to deploy your application to your production server.

## 1. Prepare Environment
Ensure your `.env` file on the production server has the correct production values:
- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=https://bohofurniture.net`
- Production `DB_*` credentials
- Production `MAIL_*` credentials

## 2. Pull Latest Code
On your production server, pull the latest changes from your repository:
```bash
git pull origin main
```

## 3. Install Dependencies
Run composer to install production dependencies (no dev tools):
// turbo
```bash
composer install --no-dev --optimize-autoloader
```

## 4. Run Migrations
Update your database schema:
// turbo
```bash
php artisan migrate --force
```

## 5. Build Frontend Assets
Compile assets for production (if not building locally):
// turbo
```bash
npm install
npm run build
```

## 6. Optimization
Cache configuration and routes for maximum performance:
// turbo
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

## 7. Storage Link
Ensure the public storage link exists:
// turbo
```bash
php artisan storage:link
```

## 8. Restart Queues (If applicable)
If you use queues, restart the workers:
// turbo
```bash
php artisan queue:restart
```
