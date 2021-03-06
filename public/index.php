<?php 
include '../bootstrap/bootstrap.php';

// not necessary
// var_dump(PUBLIC_DIR);

$route = request('route',404);

echo $route;


// have a look at the request and return the name of the controller
// and name of the action that should handle this request
function getControllerActionFromRequest()
{
    //declare $routes as an empty array
    $routes = [];

    // replace $routes with the variable $routes defined in web.php
    include ROUTES_DIR . '/web.php';

    // get the current route from the request or 'homepage' if it is not there
    $current_route = request('route');


    // if there is an item in $routes with $current_route for index
    if(isset($route[$current_route]))
    {
       return $routes[$current_route];
    }
    else
    {

        // return the error 404 controller and action  
        return [
            'controller' => 'errorController',
            'action' => 'error404'
        ];
    }

    echo '<hr>';
    var_dump($routes);


     
}

function runControllerMethod ($controller_name, $action_name)
{
    // include the RIGHT controller
    include APP_DIR . '/controllers/' . $controller_name .'.php';

    //create the controller object
    $controller_class = '\\app\\controllers\\' . $controller_name;
    $controller = new \app\controllers\indexController();


    //calling the RIGHT action of the controller object
    echo $controller->$action_name();

}

// we run the right controller and it's action
$controller_action = getControllerActionFromRequest();
runControllerMethod($controller_action['controller'], $controller_action['action']);




?>

