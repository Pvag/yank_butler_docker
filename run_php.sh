#!/bin/bash

docker build -t yank_here .
docker run \
    -dp 500:80 \
    -v "$(pwd):/var/www/html" \
    --network yank_here_net \
    -e MYSQL_HOST=yank \
    -e MYSQL_USER=coder \
    -e MYSQL_PASSWORD=coder \
    -e MYSQL_ROOT_PASSWORD=secret \
    -e MYSQL_DB=ijdb \
    yank_here