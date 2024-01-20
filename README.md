# PHP/Symfony Docker-Compose Setup

This repository provides a Docker-compose setup for PHP/Symfony projects, streamlining the development environment setup for Symfony applications.

## What is Docker?

Docker is an open-source platform that enables developers to build, ship, and run applications in isolated environments called containers. Containers package up code and all its dependencies so the application runs quickly and reliably from one computing environment to another. 

## What is Docker-Compose?

Docker-Compose is a tool for defining and running multi-container Docker applications. With Compose, you use a YAML file to configure your application's services. Then, with a single command, you create and start all the services from your configuration. This is particularly useful in complex applications where multiple interconnected services (like web servers, databases, etc.) need to run in tandem.

## Prerequisites

Before you can use this setup, you must have Docker installed on your machine.

### Installing Docker

1. **Download Docker**: Go to the [Docker website](https://www.docker.com/products/docker-desktop) and download Docker Desktop for your operating system.

2. **Install Docker**: Open the downloaded file and follow the installation instructions.

3. **Verify Installation**: Open a terminal or command prompt and type `docker --version` and `docker-compose --version` to verify that Docker and Docker-Compose are correctly installed.

## Using This Repository

To use this repository for setting up your PHP/Symfony project, follow these steps:

1. **Clone the Repository**: 
```git clone https://github.com/NickyLind/Docker-compose-symfony.git```


2. **Navigate to the Repository Directory**: 
```cd Docker-compose-symfony``` (or whatever you named the repository directory)


3. **Start Docker Containers**:
```docker-compose up```

This command will start all the services defined in your `docker-compose.yml` file.

5. **Accessing Your Application**: 

Once the containers are up and running, you can access your Symfony application in the web browser at `http://localhost:8080` (or another specified port).

You will need to also change the values of 
```
DocumentRoot /var/www/html/web
<Directory /var/www/html/web>
```
to the root of your project

5. **Stopping Containers**:
```docker-compose down```

Use this command to stop and remove the containers, networks, and volumes created by `up`.

To simply stop the containers without removing any of the docker setup created, simply run ```docker-compose stop``` to stop the containers or ctrl + c in the terminal with the container logs

## Customizing The Setup

Feel free to modify the `docker-compose.yml` and Dockerfile to suit your specific requirements.

## Need Help?

If you encounter any issues or have questions, please file an issue in this repository.


