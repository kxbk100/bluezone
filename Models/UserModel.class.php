<?php
	class UserModel extends BaseModel{

		function getAllUser(){
			$sql = "select * from user_info order by id";
			$result = $this->dao->GetRows($sql);
			return $result;
		}

		function toAdmin($id){
			$sql = "update user_info set isAdmin=1 where id=$id";
			$this->dao->exec($sql);
			return true;
		}

		function offAdmin($id){
			$sql = "update user_info set isAdmin=0 where id=$id";
			$this->dao->exec($sql);
			return true;
		}

		function deleteUser($id){
			$sql = "delete from user_info where id=$id";
			$this->dao->exec($sql);
			return true;
		}


	}  //类的花括号


?>