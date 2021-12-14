<?php
/**
 * Router class
 */
class Router
{

    /**
     * @var array 
     */
    private $routes;

    
    public function __construct()
    {
        
		$routesPath = ROOT . '/config/routes.php';
		$this->routes = include($routesPath);

	}
	
	/*
	*@return  string */
    
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

	/*
	Method for proccesing request
	* */

    public function run()
	{
		$uri = $this->getURI();
		
		  /* matches route by uri */
		  
		foreach ($this->routes as $uriPattern=>$path) {

				   
			if(preg_match("~$uriPattern~", $uri)) {


			
				$internalRoute = preg_replace("~$uriPattern~",$path,$uri);
				
              
				$segments = explode('/',$internalRoute);
			
				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);
				
				$actionName = 'action'.ucfirst(array_shift($segments));
				
                $parameters = $segments;
               
                
            
				 /**Include Controller ClassName */
				$controllerFile = ROOT . '/src/controllers/' .$controllerName. '.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}
				/**Initilization  Object Controller  by Name */

				$controllerObject = new $controllerName;
				/**Call Controller Method with params */

				$result = call_user_func_array(array($controllerObject,$actionName),$parameters);

				/**If Controller Method return true break dowon router proccesing  */
				if ($result != null) {
					session_write_close();
					break;
				}
			}

		}
	}

}