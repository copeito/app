# Inicia servicios
/etc/init.d/apache2 start;
/etc/init.d/mysql start;

mysql -e "create database app"
mysql -e "grant all on app.* to copeito@127.0.0.1 identified by 'secreto'";

# Lanza una shell bash
/bin/bash;

# Evita la parada del contenedor
sleep infinity;
