#!/bin/bash
set -u

run_in_docker="docker exec -it pepe1-php"
run_in_composer="docker-compose"

function usage {
    cat <<EOF
Usage: $0 [OPTIONS] <COMMAND> [ARGUMENTS]

Options:
  -h            Print this help message and exit

Commands:
  build            Build the docker container
  composer-install Install dependencies
  create-player    Add new player
  migrations       Run database migrations
  find-players     Get list of players. You can add criteria and order by values
  remove-players   Remove player using id
  start            Start the application services
  stop             Stop the running application services
EOF
}

COMMAND=${1:-}
shift

case "$COMMAND" in
  build)
  ${run_in_composer} build
  ;;
  create-player)
  ${run_in_docker} php bin/console app:create-player $@
  ;;
  composer-install)
  ${run_in_docker} composer install
  ;;
  migrations)
  ${run_in_docker} php bin/console doctrine:migrations:migrate
  ;;
  find-players)
  ${run_in_docker} php bin/console app:find-players $@
  ;;
  remove-player)
  ${run_in_docker} php bin/console app:remove-player $@
  ;;
  start)
  ${run_in_composer} up
  ;;
  stop)
  ${run_in_composer} down
  ;;
  -h)
  usage
  ;;
esac