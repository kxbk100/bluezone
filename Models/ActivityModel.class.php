<?php
	require_once "./Base/BaseModel.class.php";
	class ActivityModel extends BaseModel{
			
		//获得时间
		function getTime(){
			date_default_timezone_set('PRC');
			$time = date("Y-m-d H:i:s");
			return $time;
		}
		
		//向数据库写入新活动
		function addActivity($title,$author,$description,$content,$dateline,$path,$small_path){
			$sql = "insert into activity(title,author,description,content,time,filePath,small_image) values('$title','$author','$description','$content','$dateline','$path','$small_path')";  
			$this->dao->exec($sql);
			return true;
		}

		//从数据库获得所有的活动
		function getAllActivity(){
			$sql="select * from activity";
			$result = $this->dao->GetRows($sql);
			return $result;
		}

		//从数据库删除活动
		function delete($id){
			$sql = "delete from activity where id='$id'";
			$this->dao->exec($sql);
			return true;
		}

		//通过id从数据库中获得一条活动数据
		function getOneActivity($id){
			$sql = "select * from activity where id='$id' ";
			$result = $this->dao->GetOneRow($sql);
			return $result;
		}

		//数据库中修改活动的有关信息
		function modifyActivity($info){
			$sql = " update activity set ";
			$sql.= " title='{$info['title']}', ";
			$sql.= " author='{$info['author']}', ";
			$sql.= " description='{$info['description']}', ";
			$sql.= " content='{$info['content']}', ";
			$sql.= " filePath='{$info['filePath']}', ";
			$sql.= " small_image='{$info['small_image']}' ";
			$sql.= " where id = {$info['id']}";
			$this->dao->exec($sql);
			return true;
		}

		//荣誉写入数据库
		function addHonor($title,$member,$teacher,$time,$image,$small_image,$author){
			$sql = "insert into honor(title,member,teacher,time,image,small_image,author) values('$title','$member','$teacher','$time','$image','$small_image','$author')";  
			$this->dao->exec($sql);
			return true;
		}

		//获得所有荣誉
		function getAllHonor(){
			$sql="select * from honor";
			$result = $this->dao->GetRows($sql);
			return $result;
		}

		//从数据库中根据id来读取一个荣誉数据
		function getOneHonor($id){
			$sql = "select * from honor where id='$id' order by id";
			$result = $this->dao->GetOneRow($sql);
			return $result;
		}

		//数据库中修改荣誉的有关信息
		function modifyHonor($info){
			$sql = " update honor set ";
			$sql.= " title='{$info['title']}', ";
			$sql.= " author='{$info['author']}', ";
			$sql.= " teacher='{$info['teacher']}', ";
			$sql.= " member='{$info['member']}', ";
			$sql.= " image='{$info['image']}', ";
			$sql.= " small_image='{$info['small_image']}' ";
			$sql.= " where id = {$info['id']}";
			$this->dao->exec($sql);
			return true;
		}

		//从数据库删除活动
		function deleteHonor($id){
			$sql = "delete from honor where id='$id'";
			$this->dao->exec($sql);
			return true;
		}


	}
?>