#/bin/bash

# Checks if conteiner app_container exists and, if not, creates it
if [[ "$(sudo docker ps -a | grep -Po "^\K[a-z0-9]+(?=.+app_container$)")" = "" ]]; then
	sudo docker run --name app_container -t -d -v /home/copeito/Projects/app/:/var/www/app -p 80:80 -p 3306:3306 app > /dev/null
fi

# Starts container
sudo docker start app_container

# If parameter "-t" is specified, launches bash console to the container
if [[ "$1" = "-t" ]]; then
	sudo docker exec -it app_container bash
fi

