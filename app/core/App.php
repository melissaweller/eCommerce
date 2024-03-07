<?php
namespace app\core;

class App{
    private $routes = [];

    public function addRoute($url,$handler){
        $url = preg_replace('/{([^\/]+)}/', '(?<$1>[^\/]+)', $url);
        $this->routes[$url] = $handler;
    }

    public function resolve($url){
        $matches = [];

        //one by one compare the url to resolve the route
        foreach ($this->routes as $routePattern => $controllerMethod) {

            if (preg_match("#^$routePattern$#", $url, $matches)) {

                // filter named paramaters
                $namedParams = array_filter($matches, 
                    function($key){
                        return !is_numeric($key);
                    }, 
                    ARRAY_FILTER_USE_KEY);

                return [$controllerMethod, $namedParams];
            }
        }
        return false;
    }

    function __construct(){
    	//call the appropriate controller class and method to handle the HTTP Request
        //Routing version 0.1
        $url = $_GET['url'];

        //defined a few routes "url"=>"controller,method"
        $this->addRoute('Person/register','Person,register');
        $this->addRoute('Person/complete_registration' , 'Person,complete_registration');
        $this->addRoute('Person/' , 'Person,list');
        $this->addRoute('Person/delete' , 'Person,delete');
        $this->addRoute('Person/edit/{id}' , 'Person,edit');
        $this->addRoute('Person/update' , 'Person,update');
        $this->addRoute('User/register' , 'User,register');
        $this->addRoute('User/login' , 'User,login');
        $this->addRoute('User/logout' , 'User,logout');
        $this->addRoute('User/update' , 'User,update');
        $this->addRoute('User/delete' , 'User,delete');
        $this->addRoute('User/securePlace' , 'Profile,index');
        $this->addRoute('Profile/index' , 'Profile,index');
        $this->addRoute('Profile/create' , 'Profile,create');
        $this->addRoute('Profile/modify' , 'Profile,modify');
        $this->addRoute('Profile/delete' , 'Profile,delete');
        $this->addRoute('Friend/add/{id1}/{id2}' , 'Friend,add');

        [$controllerMethod, $namedParams] = $this->resolve($url);

        if(!$controllerMethod){
            return;
        }

        [$controller,$method]=explode(',', $controllerMethod);

        $controller = '\app\controllers\\' . $controller;

        $controllerInstance = new $controller();

        // create an object that can get information about the controller
        $reflection = new \ReflectionClass($controllerInstance);

        // get the attributes from the controller
        $classAttributes = $reflection->getAttributes();
        $methodAttributes = $reflection->getMethod($method)->getAttributes();

        $attributes = array_merge($classAttributes, $methodAttributes);

        foreach ($attributes as $attribute) {
            // instantiate the filter
            $filter = $attribute->newInstance();
            // run the filter and test if redirected
            if($filter->redirected()){
                return;
            }
        }

        call_user_func_array([$controllerInstance, $method], $namedParams);
    }
}