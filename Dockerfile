FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

# Copy composer.json first to have it on a separate cache layer
COPY composer.json ./
RUN composer install --no-scripts --no-interaction --optimize-autoloader

# Copy the rest of the application
COPY . .

# Ensures writable folders and config/app_local.php before continuing
RUN composer run-script post-install-cmd --no-interaction

# Run the post-update scripts
RUN composer run-script post-update-cmd --no-interaction

# Environment variables for start.sh below
ENV WEBROOT /var/www/html/webroot
ENV REAL_IP_HEADER 1
ENV RUN_SCRIPTS 0
ENV PHP_ERRORS_STDERR 1
# Tell start.sh to skip composer because we handle it ourselves
ENV SKIP_COMPOSER 1

# Source: github.com/richarvey/nginx-php-fpm/blob/main/scripts/start.sh
# To debug: CMD ["/bin/bash", "-x", "/start.sh"]
CMD ["/start.sh"]
