<?php

namespace Core;
class Router 
{
    public $routes = [];
    public $params = [];

    public function add($route, $params = []) {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route); 
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
 
        $route = '/^' . $route . '$/i';
        $this->routes[$route] = $params;
    } 

    public function match($url)  {
       foreach($this->routes as $route => $params ) {
            if(preg_match($route, $url, $matches)) {
                foreach($matches as $key => $value) {
                    if(is_string($key)) {
                        $params[$key] = $value;
                    }
                }
                 echo "<pre>";
                    print_r($params); 
                 echo "</pre>";
                
                $this->params = $params;
                return true;
            }   
        }
        return false;
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function getParams() {
        return $this->params;
    }

    public function dispatch($url) {

        $url = $this->removeQueryStringVariable($url);

        if($this->match($url)) {
                $controller = $this->params['controller'];
            $controller =  $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace() . $controller;
            //echo $controller;
            if(class_exists($controller)) {
                $controller = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if(is_callable([$controller, $action])) {
                    $controller->$action();
                }
                else {
                    throw new \Exception("Method $action not found in controller $controller");
                }
            }
            else {
                throw new \Exception("Controller not Found $controller");
            }
        }
        else {
            throw new \Exception("Route not matched", 404);
        }
    }

    protected function convertToStudlyCaps($string) {
        return str_replace(" ", "", ucwords(str_replace('-',' ',$string)));
    }

    protected function convertToCamelCase($string) {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    public function removeQueryStringVariable($url)  {
        if($url != null) {
            $parts = explode('&', $url, 2);
            if(strpos($parts[0], '=') === false) {
                $url = $parts[0];
            }
            else {
                $url = '';
            }
        }
        return $url;
    } 
    protected function getNamespace() {
        $namespace = 'App\Controller\\';
        if(array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        } 
        return $namespace;
    }
}
?>