@servers(['web' => 'dasundev'])

@story('deploy')
maintenance-mode-on
update-code
install-dev-dependencies
migrate-database
fetch-fonts
build-assets
install-prod-dependencies
optimize
reload-octane-server
restart-queue-workers
maintenance-mode-off
@endstory

@task('update-code')
cd /home/laravel/dasun.dev
git pull origin main
@endtask

@task('install-dev-dependencies')
cd /home/laravel/dasun.dev
composer install
npm install
@endtask

@task('install-prod-dependencies')
cd /home/laravel/dasun.dev
composer install --optimize-autoloader --no-dev
@endtask

@task('maintenance-mode-on')
cd /home/laravel/dasun.dev
php artisan down --secret=c2fBxu9p8o
@endtask

@task('optimize')
cd /home/laravel/dasun.dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
@endtask

@task('fetch-fonts')
cd /home/laravel/dasun.dev
php artisan google-fonts:fetch
@endtask

@task('build-assets')
cd /home/laravel/dasun.dev
npm run build
@endtask

@task('migrate-database')
cd /home/laravel/dasun.dev
php artisan migrate --force
@endtask

@task('reload-octane-server')
cd /home/laravel/dasun.dev
php artisan octane:reload
@endtask

@task('restart-queue-workers')
cd /home/laravel/dasun.dev
php artisan queue:restart
@endtask

@task('maintenance-mode-off')
cd /home/laravel/dasun.dev
php artisan up
@endtask
