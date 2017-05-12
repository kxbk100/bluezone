<?php
	require_once "./Base/MySQLDB.class.php";
	class BaseModel{
		private $conf = array(
			"host" => "localhost",
			"port" => "3306",
			"user" => "root",
			"pass" => "123456789",
			"charset" => "utf8",
			"dbname" => "bluezone_data",
		);

		protected $dao;        //数据连接对象

		function __construct(){
			$this->dao = MySQLDB::GetDB($this->conf);
		}
	}
?>