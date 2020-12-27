#!/bin/bash

# first create the network:
docker network create yank_here_net
# then run the container from image tagged as mysql:5.7
docker run -d \
    --network yank_here_net --network-alias yank \
    -v tralala-db:/var/lib/mysql \
    -e MYSQL_ROOT_PASSWORD=secret \
    -e MYSQL_DATABASE=ijdb \
    mysql:5.7