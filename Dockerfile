FROM php:7.3-fpm-alpine

RUN apk add git
RUN docker-php-ext-install pdo pdo_mysql bcmath mbstring

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#copy ./run.sh /tmp
#ENTRYPOINT ["/tmp/run.sh"]
