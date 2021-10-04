<?php

class App
{

    protected static $routes = [];
    protected static $config;

    protected $activePath;

    protected $activeMethod;

    protected $notFound;

    protected $auth;



    public function __construct($activePath, $activeMethod, $config)
    {
        $this->$activePath = $activePath;
        $this->activeMethod = $activeMethod;
        self::$config = $config;
        $this->auth = self::$config['authentication'];

        $this->notFound = function () {
            http_response_code(404);
            echo "Error 404 Not Found";
        };
    }

    public static function get($path, $auth = false, $callback = null)
    {
        self::$routes[] = ['GET', $path, $auth, $callback];
    }

    public static function post($path, $auth = false, $callback = null)
    {
        self::$routes[] = ['POST', $path, $auth, $callback];
    }


    public function run()
    {
        foreach (self::$routes as $route) {
            
            // var_dump($route);
            list($method, $path, $auth, $params) = $route;

            $methodCheck = $this->activeMethod == $method;
            $pathCheck = preg_match("~^{$path}$~", $this->activePath, $params);

            if ($methodCheck && $pathCheck) {

                $url        = explode("/", $path);

                var_dump(count($url));
                die("###");

                if (count($url) == 2) {
                    $module     = "default";
                    $controller = "defaultController";
                    $action     = "defaultAction";
                } else {

                    if ($auth == true && isset($_SESSION[$this->auth['auth_files'][$url[1]]]) || $auth == false) {
                        $module     = $url[1];
                    $controller = $url[1] . "Controller";
                    $action     = $url[2] . "Action";
                    }else{
                        Controller::redirect($this->auth['auth_urls'][$url[1]]);
                        exit;
                    }
                    
                }

                if (file_exists($file = 'APP_DIR' . "/modules/{$module}/controller/{$controller}.php")) {
                    require_once $file;
                    if (class_exists($controller)) {
                        $class = new  $controller;

                        if (method_exists($class, $action)) {
                            array_shift($params);
                            return call_user_func_array([$class, $action], array_values($params));
                        } else {
                            echo 'havent method';
                        }
                    } else {
                        echo "havent Class";
                    }
                } else {
                    echo 'No Controller';
                }
                var_dump($url);
            }


            // var_dump($route);
        }
        return call_user_func($this->notFound);
    }
}
