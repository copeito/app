
# Command to build the container where the project will be executed

# With the "../" path we can estsablish the context in the parent directory,
# which allows us to ADD files in the Dockerfile which are out of the docker
# directory (bd/app.sql, for instance) 
sudo docker build ../ -f Dockerfile -t "app"
