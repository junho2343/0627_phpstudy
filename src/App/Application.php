<?php 
namespace Gondr\App;

class Application
{
	private static $cPrefix = "\\Gondr\\Controller\\";
	private static $cPostfix = "Controller";
	private $controller = null;
	private $action = null;

	public function __construct()
	{

		$url = "";
		if(isset($_GET['url'])){
			$url = rtrim($_GET['url'],'/');
			// /board/list/ => /board/list
			$url = filter_var($url,FILTER_SANITIZE_URL);

			// $!*^~[] 잡아줌
		}
		$params = explode('/',$url);
		$cnt = count($params);

		$cname =self::$cPrefix . "Home" . self::$cPostfix;
		if(isset($params[0]) && $params[0] != ""){
			$cname =self::$cPrefix . ucfirst($params[0]) . self::$cPostfix;
		}
		$this->action = 'index';

		try{
			if(class_exists($cname)){
				$this->controller = new $cname();
			}
			else{
				throw new \Exception("해당 요청은 처리할 수 없습니다. "); 
			}
			if(isset($params[1])){
				$this->action = $params[1];
			}

			if(!method_exists($this->controller,$this->action)){
				throw new \Exception("해당 요청은 처리할 수 없습니다. "); 
			}


			switch($cnt){
				case '0':
				case '1':
				case '2':
					$this->controller->{$this->action}();
					break;
				case '3':
					unset($params[0]);
					unset($params[1]);
					$this->controller->{$this->action}(...$params);
					break;
				default:
					throw new \Exception("해당 요청은 처리할 수 없습니다. "); 
					break;
			}


		}catch(\Exception $e){
			$this->controller = new \Gondr\Controller\NullController();
			$this->controller->index($e->getMessage());
		}


	}
}