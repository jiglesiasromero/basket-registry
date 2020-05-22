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
  build        Build the docker container
  migrations   Run database migrations
  find-players Get list of players. You can add criteria and orber by values
  start        Start the application services
  stop         Stop the running application services
EOF
}

COMMAND=${1:-}
shift

case "$COMMAND" in
  build)
  ${run_in_composer} build
  ;;
  migrations)
  ${run_in_docker} php bin/console doctrine:migrations:migrate
  ;;
  find-players)
  ${run_in_docker} php bin/console app:find-players $@
  ;;
  start)
  ${run_in_composer} up
  ;;
  stop)
  ${run_in_composer} down
  ;;
esac