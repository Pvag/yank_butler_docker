<?php

namespace Ninja;

class EntryPoint
{
    private $route;
    private $method;
    private $routes;

    public function __construct($route, $method, \Ninja\Routes $routesObj)
    {
        $this->routes = $routesObj->getRoutes();
        $this->route = key_exists($route, $this->routes) ? $route : ''; // redirect to home, if route does not exist
        $this->method = $method;
        $this->checkUrl();
    }

    private function checkUrl()
    {
        if (strtolower($this->route) !== $this->route) {
            http_response_code(301); // permanent redirection
            header('Location: ' . strtolower($this->route));
            exit;
        }
    }

    function loadTemplate($templateFileName, $variables = [])
    {
        extract($variables);
        ob_start();
        include __DIR__ . '/../../templates/' . $templateFileName;
        return ob_get_clean();
    }

    public function run()
    {
        $controller = $this->routes[$this->route][$this->method]['controller'];
        $action = $this->routes[$this->route][$this->method]['action'];
        $page = $controller->$action();
        $title = $page['title'];
        if (isset($page['variables'])) {
            $output = $this->loadTemplate($page['template'], $page['variables']);
        } else {
            $output = $this->loadTemplate($page['template']);
        }
        include __DIR__ . '/../../templates/layout.html.php';
    }
}
