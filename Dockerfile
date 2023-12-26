# Use the official PHP 8.1 Alpine image as the base image
FROM php:8.1-alpine

# Set maintainer label
LABEL Maintainer="Yash Patel <yashp@infopercept.com>"

# Install necessary packages and extensions
RUN apk --no-cache --repository https://dl-cdn.alpinelinux.org/alpine/edge/main add \
    icu-libs \
&& apk --no-cache --repository https://dl-cdn.alpinelinux.org/alpine/edge/community add \
    libavif \
&& apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/testing/ --allow-untrusted gnu-libiconv \
    zlib-dev libzip-dev libpng-dev php81 php81-common php81-cli php81-gd php81-fileinfo php81-ctype php81-curl php81-zip php81-xml php81-mbstring php81-fpm php81-mysqli php81-pdo php81-session php81-simplexml php81-xmlwriter php81-pdo_mysql curl nginx && docker-php-ext-install pdo_mysql gd bcmath
RUN docker-php-ext-install zip

# Remove default Nginx configuration and copy your own configuration
RUN rm -f /etc/nginx/conf.d/default.conf
COPY nginx.conf /etc/nginx/nginx.conf

# Add SSL configuration
COPY ssl/gsosdemo.infopercept.com.crt /etc/nginx/ssl/gsosdemo.infopercept.com.crt
COPY ssl/gsosdemo.infopercept.com.key /etc/nginx/ssl/gsosdemo.infopercept.com.key

# Install Composer
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Copy the application code into the container and set the working directory
COPY . /var/www/html/
WORKDIR /var/www/html

# Set appropriate ownership and permissions
RUN chown -R nobody:nobody /var/www/html && chmod -R 755 /var/www/html
RUN chmod 777 /var/www/html/include /var/www/html/user_import /var/www/html/quiz_import /var/www/html/quiz_certificate /var/www/html/photos
RUN apk --no-cache add dcron
RUN echo "*/3 * * * * sh /var/www/html/cron-job.sh >> /var/log/cron.log 2>&1" > /etc/crontabs/root
RUN touch /var/log/cron.log
RUN chmod 777 /usr/bin/crontab /var/www/html/cron-job.sh /var/www/html/cron_job
RUN chmod +x /var/www/html/cron-job.sh

# Install dependencies using Composer
RUN composer update --no-dev --ignore-platform-req=ext-zip
RUN composer install --no-dev --ignore-platform-req=ext-zip

# Expose port 443 for HTTPS
EXPOSE 443

# Start PHP-FPM and Nginx with SSL
CMD ["/bin/sh", "-c", "crond && php-fpm81 && nginx -g 'daemon off;'"]
