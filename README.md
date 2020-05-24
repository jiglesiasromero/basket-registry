# Basket players registry

In order to run the app, you need to have installed docker and docker-compose.

## Installation

It includes a bash script to facilitate the use of the app for linux users. you can find in docker folder as app.sh

First of all, we need to generate docker images and create containers.

> ./docker/app.sh build
>
> ./docker/app.sh start

You can do the same executing these commands:

> docker-compose build
>
> docker-compose up

Install composer bundles.

> ./docker/app.sh composer install

Or you can also run the command within the php container.

> docker exec -it pepe1-php composer install

Now we have to execute migrations in order to create the database.

> ./docker/app.sh migrations

As above, you can do it without using the app.sh bash script.

> docker exec -it pepe1-php php bin/console doctrine:migrations:migrate

At this point we already have our application up and running.

## Usage

**Create player**

> ./docker/app.sh create-player id name role rate

Example:

> ./docker/app.sh create-player 23 Jordan base 100

Or running the command though the container.

> docker exec -it pepe1-php php bin/console app:create-player id name role rate

**Remove player**

> ./docker/app.sh remove-player id

** Find players**

Retrieve the player list

> ./docker/app.sh find-players [orderBy orderType]

Examples:

> ./docker/app.sh find-players id desc
