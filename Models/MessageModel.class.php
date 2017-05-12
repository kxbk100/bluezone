<?php
	class MessageModel extends BaseModel{
		
		//从数据库获取父板块信息
	  /*function getAllFather(){
			$sql = "select * from father_module_info order by id";
			$result = $this->dao->GetRows($sql);
			return $result;
		}

		//从数据库获取子板块信息
		function getAllSon(){
			$sql = "select * from son_module_info order by id";
			$result = $this->dao->GetRows($sql);
			return $result;
		}
		*/
	
		//获得时间
		function getTime(){
			date_default_timezone_set('PRC');
			$time = date("Y-m-d H:i:s");
			return $time;
		}

		function getAllMessage(){
			$sql = "select * from message order by time";
			$result = $this->dao->GetRows($sql);
			return $result;
		}

		function messageIn($user,$content,$time){
			$sql = "insert into message (user,content,time) values('$user','$content','$time')";
			$this->dao->exec($sql);
			return true;
		}

		function deleteMessage($id){
			$sql = "delete from message where id=$id";
			$this->dao->exec($sql);
			return true;
		}


	} 		//类的后花括号
?>