FROM debian:10.1
MAINTAINER copeito@gmail.com
LABEL Description="App"

RUN apt-get update
RUN apt-get update --fix-missing
RUN apt-get upgrade -y

# Instalación de herramientas auxiliares
RUN apt-get install -y nano

# PRUEBA (eliminar)
RUN apt-get install -y telnet

# PHP
RUN apt-get install -y php php-mysql

RUN apt-get install -y telnet gpm

# Apache2
# Instalación
RUN apt-get install -y apache2 libapache2-mod-php

# Carga el módulo rewrite que permite el uso de friendly urls
RUN a2enmod rewrite

# Activa la lectura de los .htaccess por Apache2
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Crea la ruta donde se va a ubicar el framework
# Establece "/var/www/app/public" como directorio público de apache
RUN /usr/bin/find /etc/apache2/ -type f -exec grep -l "/var/www/html" {} \; | xargs -i sed -i "s/\/var\/www\/html/\/var\/www\/app\/public/g" {}

# Mysql
RUN apt-get install -y mariadb-common mariadb-server mariadb-client

# Permite el acceso a mysql desde equipos remotos (solo desarrollo)
RUN find /etc/mysql -type f -exec grep -El "^bind-address" {} \; | xargs -i sed -i "s/^bind-address/#bind-address/g" {}

RUN sed -i "s/;extension=pdo_mysql/extension=pdo_mysql/" /etc/php/7.3/apache2/php.ini

# Instala composer (aunque de momento no se utiliza en este proyecto)
RUN apt-get install -y composer

# Crea el usuario copeito (útil para ejecutar composer, puesto que no se permite el uso de root)
RUN useradd copeito -m -G www-data

ADD /db/app.sql /app.sql
ADD /docker/start.sh /start.sh

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

EXPOSE 80
EXPOSE 3306

CMD "/start.sh"
