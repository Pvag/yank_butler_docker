# PHP and MySQL - (studying the book written by Yank and Butler)

Running in 2 separate Docker Containers !

## Instructions

-   ./setup.sh (generates .css file from sass file)
-   ./run_mysql.sh (runs the mysql container)
-   ./run_php.sh (runs the php apache container)
-   point the browser to 127.0.0.1:500
-   if you modify the code, just refresh the page to see the results

This project uses php and nodejs and npm inside a Docker container. The website uses fontawesome, installed on the container using npm.
It also uses mysql, running in another container.
The two containers communicate over a network called yank_here_net.

A bind volume was used for the php apache container, so modifications to the code are reflected on the website after a simple refresh of the page.

## Implementation Details

-   If the _sass_ file in 'scss' is modified, then ./setup.sh must be executed again and then the web page must be refreshed, in order to see the result of the modifications.
-   You need a database called _ijdb_, with a proper structure (I can send you the dump, if you ask [me](mailto:paolondon@gmail.com)) and a user called 'coder', with password 'coder'.
