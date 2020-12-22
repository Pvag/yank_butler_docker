<?php

namespace Ijdb;

class IjdbActions
{
    public function callAction($route)
    {
        include __DIR__ . '/../../includes/DatabaseConnection.php';

        $jokesTable = new \Ninja\DatabaseTable($pdo, 'joke', 'id');
        $authorsTable = new \Ninja\DatabaseTable($pdo, 'author', 'id');
        $jokeController = new \Ijdb\Controllers\Joke($jokesTable, $authorsTable);

        $routes = [
            'joke/edit' => [
                'POST' => [
                    'controller' => $jokeController,
                    'action' => 'saveEdit'
                ],
                'GET' => [
                    'controller' => $jokeController,
                    'action' => 'save'
                ]
            ],
            'joke/list' => [
                'GET' => [
                    'controller' => $jokeController,
                    'action' => 'list'
                ]
            ],
            'joke/delete' => [
                'POST' => [
                    'controller' => $jokeController,
                    'action' => 'delete'
                ]
            ],
            '' => [
                'GET' => [
                    'controller' => $jokeController,
                    'action' => 'home'
                ]
            ]
        ];

        $route = key_exists($route, $routes) ? $route : '';

        $method = $_SERVER['REQUEST_METHOD'];
        $controller = $routes[$route][$method]['controller'];
        $action = $routes[$route][$method]['action'];
        return $controller->$action();
    }
}
