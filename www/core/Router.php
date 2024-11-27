<?php

namespace Core;


class Router
{
    public static array $routes = []; // the array that stores routes

    /**
     * The function that adds a new route to the array
     * @param $method - http method
     * @param $uri -  URL address
     * @param $controller - controller class name
     * @param $action - function in the class $controller
     * @return void
     */
    public static function add(string $method, string $uri, string $controller,string $action): void
    {
        self::$routes[] = compact('method', 'uri', 'controller', 'action');
    }


    /**
     * The function specifies the controller and action which need to be used to handle the http request
     * @return void
     */
    public static function loadController(): void
    {
        $uri = htmlspecialchars(strip_tags(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        $method = $_SERVER['REQUEST_METHOD'];
        //show($uri . "   " . $method);

        foreach (self::$routes as $route) {

            if ($route['method'] === $method && $route['uri'] === $uri) {
                $nameController = $route['controller'];
                $action = $route['action'];

                self::actionController($nameController, $action);

                return;
            }
        }

        \Core\Error::error(404);
    }


    /**
     * The function creates an instance of the controller class and calls the controller method
     * @param $nameController - controller class name
     * @param $action - function in the class $controller
     * @return void
     */
    private static function actionController(string $nameController, string $action): void
    {
        //  $namespaceController = (str_contains($uri, 'admin') ? 'App\Controllers\admin' : 'App\Controllers') . '\\' . $nameController;
        $namespaceController = 'App\Controllers\\' . $nameController;
        //show('namespace'.$namespaceController);
        $objectController = new $namespaceController;
        // show($objectController);

        if (method_exists($objectController, $action)) {
            $objectController->$action();
            // call_user_func_array()

            return;
        }

        \Core\Error::error(404);
    }
}