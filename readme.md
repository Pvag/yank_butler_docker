# PHP and MySQL - (studying the book written by Yank and Butler)

Running in 2 separate Docker Containers !

## Instructions (hand-made solution)

-   ./setup.sh (generates .css file from sass file)
-   ./run_mysql.sh (runs the mysql container)
-   ./run_php.sh (runs the php apache container)
-   point the browser to 127.0.0.1:500
-   if you modify the code, just refresh the page to see the results

This project uses php and nodejs and npm inside a Docker container. The website uses fontawesome, installed on the container using npm.
It also uses mysql, running in another container.
The two containers communicate over a network called yank_here_net.

A bind volume was used for the php apache container, so modifications to the code are reflected on the website after a simple refresh of the page.

## Instructions (docker-compose solution)

## Implementation Details

-   If the _sass_ file in 'scss' is modified, then ./setup.sh must be executed again and then the web page must be refreshed, in order to see the result of the modifications.
-   You need a database called _ijdb_, with a proper structure (I can send you the dump, if you ask [me](mailto:paolondon@gmail.com)) and a user called 'coder', with password 'coder'.

## Tear everything down (hand-made solution)

-   find the id of the containers that are currently running for our project, among those listed by:

          docker ps

-   remove the container with php and the other one with mysql:

          docker rm -f [php_container_id] [mysql_container_id]

-   remove the image for the php container:

          docker rmi yank_here

-   remove the network:

          docker network rm yank_here_net

-   remove the Named Volume:

          docker volume rm tralala-db

## Advanced

### Copy the dump of a db to a Named Volume

#### Method #1

-   Create a temporary dummy container:

          docker container create --name dummy -v persistent_db:/data hello-world

    -   note: this automatically creates a volume named 'persistent_db', if not existing

-   Copy the data into the container:

          docker cp [path_on_host/filename] dummy:/data/[filename]

-   Remove the container:

          docker rm dummy

Now the data that was copied will be available inside any other container that will use the 'persistent_db' volume. No need to target the directory manually! The named volume will point to the right directory with the data.

The named volume, with the db data, will then be reached by the mysql vm through something like:

    -v persistent_db:/var/lib/mysql

specified with the 'run' command.

Method #2 (one-liner)

    docker --rm -v [path_on_host]:/source -v persistent_db:/dest -w source alpine cp filename /dest

#### How to inspect the content of a named volume

Instead of roaming around in the vm looking for the right directory, it is best to connect to a bash container mounting the volume and then looking around from there:

    docker run -v persistent_db:/data_will_be_here -it bash
    > ls data_will_be_here

It is clear now that `:/data_will_be_here` mounts the named volume at 'data_will_be_here' directory.
