<?php

namespace Core\Application;

use Exception;

class Router
{
    public static array $routes = []; // the array that stores routes

    /**
     * The function that adds a new route to the array for the GET method of an HTTP request
     * @param string $uri -  URL address
     * @param string $controller - controller class name
     * @param string $action - function in the class $controller
     * @return void
     */
    public static function get(string $uri, string $controller, string $action): void
    {
        self::$routes['GET'][] = compact('uri', 'controller', 'action');
    }

    /**
     * The function that adds a new route to the array for the POST method of an HTTP request
     * @param $uri -  URL address
     * @param $controller - controller class name
     * @param $action - function in the class $controller
     * @return void
     */
    public static function post(string $uri, string $controller, string $action): void
    {
        self::$routes['POST'][] = compact('uri', 'controller', 'action');
    }

    /**
     * The function that adds a new route to the array for the PUT method of an HTTP request
     * @param $uri -  URL address
     * @param $controller - controller class name
     * @param $action - function in the class $controller
     * @return void
     */
    public static function put(string $uri, string $controller, string $action): void
    {
        self::$routes['PUT'][] = compact('uri', 'controller', 'action');
    }

    /**
     * The function that adds a new route to the array for the DELETE method of an HTTP request
     * @param $uri -  URL address
     * @param $controller - controller class name
     * @param $action - function in the class $controller
     * @return void
     */
    public static function delete(string $uri, string $controller, string $action): void
    {
        self::$routes['DELETE'][] = compact('uri', 'controller', 'action');
    }

    /**
     * The function that adds a new route to the array for the PATCH method of an HTTP request
     * @param $uri -  URL address
     * @param $controller - controller class name
     * @param $action - function in the class $controller
     * @return void
     */
    public static function patch(string $uri, string $controller, string $action): void
    {
        self::$routes['PATCH'][] = compact('uri', 'controller', 'action');
    }

    /**
     * The function specifies the controller and action which need to be used to handle the http request
     * @return void
     * @throws Exception
     */
    public static function getController(): void
    {
        $uri = htmlspecialchars(strip_tags(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        $method = $_SERVER['REQUEST_METHOD'];;
        $routesOfThisMethod = self::$routes[$method];

        foreach ($routesOfThisMethod as $route) {

            if (preg_match("#^{$route['uri']}$#", $uri, $matches)) {
                $nameController = $route['controller'];
                $action = $route['action'];

                if (!empty($matches["id"])) {
                    self::callControllerAction($nameController, $action, $matches["id"]);

                    return;
                }

                self::callControllerAction($nameController, $action);

                return;
            }
        }

        throw new Exception(StatusCode::Page_Not_Found->name,StatusCode::Page_Not_Found->value);
    }

    /**
     * The function creates an instance of the controller class and calls the controller method
     * @param string $nameController - controller class name
     * @param string $action - function in the class $controller
     * @param int|null $id
     * @return void
     * @throws Exception
     */
    private static function callControllerAction(string $nameController, string $action, int $id = null): void
    {
        $namespaceController = 'App\Controllers\\' . $nameController;
        $objectController = new $namespaceController;

        if (method_exists($objectController, $action)) {

            $objectController->$action($id);

            return;
        }

        throw new Exception(StatusCode::Page_Not_Found->name,StatusCode::Page_Not_Found->value);
    }
}