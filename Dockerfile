FROM php:8.0-apache

# install nodejs and npm
RUN apt-get update && apt-get install -y nodejs npm

COPY . /var/www/html

## NOTE This can be a different way to allow LoadModule
# uncomment the 'LoadModule' line in httpd.conf (needed to set rules in 000-default.conf)
# RUN sed -i '/LoadModule rewrite_module/s/^#//g' /usr/local/apache2/conf/httpd.conf

# Allow LoadModule rewrite
RUN a2enmod php
RUN a2enmod rewrite

# Install pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql

# set the DocumentRoot for the website
# and also the RewriteRule (for the single entry point implementation to work)
COPY 000-default.conf /etc/apache2/sites-available

RUN npm install --production

# set the working directory (npm will run from within WORKDIR!)
WORKDIR /var/www/html/public
RUN npm install --production

EXPOSE 80