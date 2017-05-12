<?php
	class ModelFactory{
		static $arr = array();        //存放已经创建的模型对象

		static function getModel($modelClass){
			if(empty(self::$arr[$modelClass])){
				self::$arr[$modelClass] = new $modelClass();
			}
			return self::$arr[$modelClass];
		}
	}
?>
