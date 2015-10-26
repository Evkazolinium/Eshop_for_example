<?php
class Router {
	private $router;
	
	public function __construct() {
		$routesPath = ROOT."/config/routes.php";
		$this->router = include($routesPath);
	}
	/*
		Return request string
	*/
	private function getPath() {
		if(!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}
	public function routing() {
		$uri = $this->getPath();
		foreach($this->router as $uriPattern=>$path) {
			if(preg_match("~$uriPattern~", $uri)) {
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segment = explode("/", $internalRoute);
				$controllerName = ucfirst(array_shift($segment).'Controller');
				
				$contollerFile = ROOT.'/controllers/'.$controllerName.'.php';
				$actionName = 'action'.ucfirst(array_shift($segment));
				$parametrs = $segment;
				if(file_exists($contollerFile)) {
					include_once($contollerFile);
                }else{
                    echo "404";
                    die();  
                }
				$controllerObject = new $controllerName;
                if(!empty($parametrs) && !$controllerObject) {
                    echo "404";
                    die();
                }
				$result = call_user_func_array(array($controllerObject, $actionName), $parametrs);
				if($result != null) {
					break;
				}
			}
		}
		
	}
}
?>