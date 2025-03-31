@servers(['web' => 'vps'])

@story('deploy')
maintenance-mode-on
update-code
install-dev-dependencies
migrate-database
build-assets
build-docs
install-prod-dependencies
optimize
reload-php-fpm
maintenance-mode-off
@endstory

@task('update-code')
cd /home/forge/www.dasun.dev
git pull origin main
@endtask

@task('install-dev-dependencies')
cd /home/forge/www.dasun.dev
composer install
npm install
@endtask

@task('install-prod-dependencies')
cd /home/forge/www.dasun.dev
composer install --optimize-autoloader --no-dev
@endtask

@task('maintenance-mode-on')
cd /home/forge/www.dasun.dev
php artisan down --secret=c2fBxu9p8o
@endtask

@task('optimize')
cd /home/forge/www.dasun.dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
@endtask

@task('build-assets')
cd /home/forge/www.dasun.dev
npm run build
@endtask

@task('migrate-database')
cd /home/forge/www.dasun.dev
php artisan migrate --force
@endtask

@task('maintenance-mode-off')
cd /home/forge/www.dasun.dev
php artisan up
@endtask

@task('reload-php-fpm')
sudo service php8.2-fpm reload
@endtask

@task('build-docs')
cd /home/forge/www.dasun.dev/docs
npm run docs:build
@endtask
