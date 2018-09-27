#!/bin/bash

cd "$(dirname "$0")"

docker-compose kill && docker-compose rm -f

if [[ "$(docker images -q rescue-api-image 2> /dev/null)" != "" ]]; then
  docker rmi rescue-api-image
fi

docker-compose build && docker-compose up -d
