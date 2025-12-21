# Deployment Checklist

This checklist helps deploy the application to a production server.

## 1. Server prerequisites
- PHP 8.1+ (8.2 recommended)
- Composer
- Database server (MySQL/Postgres)
- Web server (Nginx or Apache)
- Redis or Memcached (optional but recommended for cache/session)

## 2. Prepare repository
- Pull latest code from `main` branch.
- Ensure `.env` is configured (see **.env setup**).

## 3. Environment (`.env`)
- Copy `.env.example` to `.env` and set values: `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL`, DB credentials, mailer, queue, cache, session drivers.
- Set strong `APP_KEY` (run `php artisan key:generate`).

## 4. Install dependencies
```bash
composer install --no-dev --optimize-autoloader
npm ci && npm run build  # if frontend assets used
```

## 5. Storage & permissions
- Create storage symlink: `php artisan storage:link`.
- Set writable permissions for `storage/` and `bootstrap/cache/`.

## 6. Database
- Run migrations and seeders:
```bash
php artisan migrate --force
php artisan db:seed --force   # optional
```

## 7. Optimize
- Cache config, routes and views:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache   # optional
```

## 8. Queues & Supervisor
- If using queues, configure `queue` driver and run a worker supervisor (e.g., SupervisorD).
- Example Supervisor config should run `php artisan queue:work --sleep=3 --tries=3`.

## 9. Scheduler (cron)
- Add to crontab (run `crontab -e`):
```cron
* * * * * cd /path/to/app && php artisan schedule:run >> /dev/null 2>&1
```

## 10. SSL & webserver
- Configure HTTPS (Let's Encrypt or provisioned certs).
- Configure Nginx/Apache to point to `public/` directory and set proper headers.

## 11. Monitoring & backups
- Setup logs rotation and central log management.
- Configure backups for database and uploaded files.
- Add application monitoring (Sentry, NewRelic, etc.).

## 12. Post-deploy checks
- Visit `APP_URL` and verify pages load.
- Test authentication flows (login, register, reset password).
- Verify mail, queues, and scheduled tasks run correctly.

## 13. Rollback plan
- Have DB backups and a way to revert to previous code (tagged releases or releases directory).

## Additional notes
- Keep secrets out of the repo; use environment variables or secret manager.
- Consider CI/CD for automated deploys (GitHub Actions, GitLab CI, or other).

---
Follow these steps for a reliable production deploy. Adjust as needed for your infrastructure.
