<?php

namespace Ijdb;

class IjdbActions
{
    public function callAction($route)
    {
        include __DIR__ . '/../../includes/DatabaseConnection.php';

        $jokesTable = new \Ninja\DatabaseTable($pdo, 'joke', 'id');
        $authorsTable = new \Ninja\DatabaseTable($pdo, 'author', 'id');

        if ($route === 'joke/list') {
            $jokeController = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
            $page = $jokeController->list();
        } else if ($route === 'joke/edit') {
            $jokeController = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
            $page = $jokeController->edit(); // jokeid was set in url (called from anchor in jokes.html.php)
        } else if ($route === 'joke/home' || $route === '/') {
            $jokeController = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
            $page = $jokeController->home();
        } else if ($route === 'joke/delete') {
            $jokeController = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
            $page = $jokeController->delete();
        } else if ($route === 'register') {
            $registerController = new \Ijdb\Controllers\Register($authorsTable);
            $page = $registerController->show();
        } else {
            $jokeController = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);
            $page = $jokeController->home();
        }

        return $page;
    }
}
