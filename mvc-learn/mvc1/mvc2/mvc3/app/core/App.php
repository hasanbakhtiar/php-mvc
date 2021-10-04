<?php

class App{

        protected $routes = [];

        protected $activePath;

        protected $activeMethod;

        protected $notFound;


        public function __construct($activePath, $activeMethod)
        {
            $this->activePath = $activePath;
            $this->activeMethod = $activeMethod;

            $this->notFound = function (){
                http_response_code(404);
                echo "404 not found";
            };
        }

        public function get($path, $callback){
                $this->routes[] = ['GET', $path, $callback];
                
        }

        public function post($path, $callback){
                $this->routes[] = ['POST', $path, $callback];
                
        }

        public function run(){
            foreach ($this->routes as $route) {

                list($method, $path, $params) = $route;

                $methodCheck = $this->activeMethod == $method;
                $pathCheck = preg_match("~^{$path}$~", $this->activePath, $params);

                if ($methodCheck && $pathCheck) {
                    var_dump($path);

                    $url = explode("/", $path);
                    $module = $url[1];
                    $controller = $url[1]."Controller";
                    $action = $url[2]."Action";

                    if(file_exists($controller))
                    var_dump($url);
                }

                
                // var_dump($route);
            }

            return call_user_func($this->notFound);
        }
        
}







?>