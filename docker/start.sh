# Inicia servicios
/etc/init.d/apache2 start;
/etc/init.d/mysql start;

mysql -e "create database app"
mysql -e "grant all on app.* to copeito@localhost identified by 'secreto'";

mysql app < /app.sql

# Lanza una shell bash
/bin/bash;

# Evita la parada del contenedor
sleep infinity;
