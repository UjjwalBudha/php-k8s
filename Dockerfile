FROM php:8.0-apache
RUN mkdir /var/www/html -p
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY ./register.php /var/www/html
COPY ./logout.php /var/www/html
COPY ./login.php /var/www/html
COPY ./index.html /var/www/html
COPY ./dashboard.php /var/www/html
