<?php

	class BaseController{
		function __construct(){
			header("content-type:text/html; charset=utf-8");
		}

		function MsgAndGo($Msg , $url , $time ,$isSuccess){
			//echo "<b>{$Msg}<b>";
			//header("refresh:$time; url=$url");
			if($isSuccess)
				include_once "./Views/turnto.html";
			else
				include_once "./Views/turnto2.html";
		}
	}
?>