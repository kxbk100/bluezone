<?php
	//废弃该包含方式
	//require_once "./Base/BaseController.class.php";
	//require_once "./Base/ModelFactory.class.php";
	//require_once "./Controllers/{$ctrl}Controller.class.php";
	//require_once "./Models/{$ctrl}Model.class.php";
	$ctrl = !empty($_GET['c'])?$_GET['c']:"Homepage";
	define("DS",DIRECTORY_SEPARATOR);
	define("ROOT",__DIR__.DS);
	define("BASE_PATH",ROOT."Base".DS);
	define("CTRL_PATH",ROOT."Controllers".DS);
	define("MODEL_PATH",ROOT."Models".DS);
	define("VIEWS",ROOT."Views".DS);          //没有找到在html中使用常量的方法

	//采用自动加载机制包含文件
	function __autoload($name){

		$arr = array("BaseController","ModelFactory","MySQLDB","BaseModel","ValidCode","Watermark","Fileupload","SmallImage");
		if(in_array($name , $arr)){
			require_once BASE_PATH."{$name}.class.php";		
		}
		else if(substr($name, -10)=="Controller"){
			require_once CTRL_PATH."{$name}.class.php";
		}
		else if(substr($name, -5)=="Model"){
			require_once MODEL_PATH."{$name}.class.php";
		}

	}

	$ctrl .="Controller";
	$controller = new $ctrl();
	$action = !empty($_GET['a'])?$_GET['a']:"showHomepage";
	$action .="Action";
	//执行用户传入的动作
	@$controller->$action();


?>


