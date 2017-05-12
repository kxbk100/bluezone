<?php

	require_once "./Base/BaseModel.class.php";
	class HomepageModel extends BaseModel{

		//通过账号从数据库中得到指定的一条用户信息
		function GetOneByName($username){
			$sql = "select * from user_info where user_name='$username'";
			$result = $this->dao->GetOneRow($sql);
			return $result;
		}

		//获得时间
		function getTime(){
			date_default_timezone_set('PRC');
			$time = date("Y-m-d H:i:s");
			return $time;
		}

		//将数据库中的是否登录项设置成1
		function isOn( $username ,$today){
			$sql = "update user_info set ison=1,time2='$today' where user_name='$username'";
			$this->dao->exec($sql);
			return true;
		}

		//将数据库中的是否登录项设置成0
		function notOn( $username ){
			$sql = "update user_info set ison=0 where user_name='$username'";
			$this->dao->exec($sql);
			return true;
		}
		
		//向数据库中写入注册信息
		function registerIn($username,$password,$name,$today){
			$sql = "insert into user_info (user_name,user_pw,time1,name) values('$username','$password','$today','$name')";
			$this->dao->exec($sql);
			return true;
		}

		//从数据库中获得所有活动信息
		function getAllActivity(){
			$sql = "select * from activity order by id";
			$result = $this->dao->GetRows($sql);
			return $result;
		}

		//通过id从数据库获取对应的活动信息
		function getActivityById($id){
			$sql = "select * from activity where id='$id'";
			$result = $this->dao->GetOneRow($sql);
			return $result;
		}

		function insertSuggest($suggest){
			$sql = "insert into suggest (suggest) value('$suggest')";
			$this->dao->exec($sql);
			return true;
		}



	}


?>