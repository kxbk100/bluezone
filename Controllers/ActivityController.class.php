<?php
	class ActivityController extends BaseController{

		//验证是否登录
		function pass(){
			if(empty($_SESSION['name'])||$_SESSION['name']=="")
			{
				$this->MsgAndGo("请先登录！！！","?a=showLogin",3,0);
				exit;
			}
		}
		
		//执行发布新活动的动作
		function addAction(){
			$obj = ModelFactory::getModel("ActivityModel");
			$title = addslashes($_POST['title']);  
			$author = addslashes($_POST['author']);  
			$description = addslashes($_POST['description']);  
			$content = addslashes($_POST['content']);  
			$dateline = $obj->getTime();
    		
			//检测文件是否符合要求，如果成功就上传
			$last = strrpos($_FILES['upfile']['name'], '.')+1;
			$suffix = substr($_FILES['upfile']['name'], $last);
			$arr = array('png','gif','jpg','PNG','GIF','JPG');

			if($_FILES['upfile']['error']!=0){
				$this->MsgAndGo("上传出错(可能文件过大)","?c=Activity&a=showAdd",3,0);
				die();
			}

			if(!in_array($suffix, $arr))
			{
				$this->MsgAndGo("请上传png，gif或jpg格式的图片！！！","?c=Activity&a=showAdd",3,0);
			}
			else if($_FILES['upfile']['size']>1024*1024*2){
				$this->MsgAndGo("文件太大，请上传小于2MB的图片！！！","?c=Activity&a=showAdd",3,0);
			}
			else{
				$path = "./upfile/".time().".".$suffix;
				move_uploaded_file($_FILES['upfile']['tmp_name'], $path);
				$obj2 = new SmallImage(400,300);
				$small_path = $obj2->getSmallImage($path);
				$obj->addActivity($title,$author,$description,$content,$dateline,$path,$small_path);
				$this->MsgAndGo("添加成功！！！","?c=Activity&a=showActivity",1,1);
			}

		}

		//显示发布活动页面
		function showAddAction(){
			session_start();
			$this->pass();
			$name = $_SESSION['name'];
			include_once "./Views/activityadd.html";
		}

		//显示已发布的活动
		function showActivityAction(){
			session_start();
			$this->pass();
			$name = $_SESSION['name'];
			$obj = ModelFactory::getModel("ActivityModel");
			$result = $obj->getAllActivity();
			$count = count($result);
			include_once "./Views/activitymanage.html";
		}

		//执行删除动作
		function deleteAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::getModel("ActivityModel");
			
			//删除对应图片文件
			$result = $obj->getOneActivity($id);
			$path = $result['filePath'];
			$small_path = $result['small_image'];
			unlink ( $path );
			unlink ( $small_path);

			$obj->delete($id);
			$this->MsgAndGo("删除成功!!!","?c=Activity&a=showActivity",1,1);
		}

		//显示修改活动界面
		function modifyAction(){
			session_start();
			$this->pass();
			$name = $_SESSION['name'];
			$id = $_GET['id'];
			$obj = ModelFactory::getModel("ActivityModel");
			$result = $obj->getOneActivity($id);
			include_once "./Views/activitymodify.html";
		}

		//执行修改活动动作
		function modifyActivityAction(){
			$info = array();
			$info['id'] = $_POST['id'];
			$info['title'] = addslashes($_POST['title']);
			$info['author'] = addslashes($_POST['author']);
			$info['description'] = addslashes($_POST['description']);
			$info['content'] = addslashes($_POST['content']);

			//检测图片是否符合要求
			$last = strrpos($_FILES['upfile']['name'], '.')+1;
			$suffix = substr($_FILES['upfile']['name'], $last);
			$arr = array('png','gif','jpg','PNG','GIF','JPG');
			if($_FILES['upfile']['error']!=0){
				$this->MsgAndGo("上传出错(可能文件过大)","?c=Activity&a=modify&id={$_POST['id']}",3,0);
				die();
			}
			if(!in_array($suffix, $arr))
			{
				$this->MsgAndGo("请上传png，gif或jpg格式的图片！！！","?c=Activity&a=modify&id={$_POST['id']}",3,0);
			}
			else if($_FILES['upfile']['size']>1024*1024*2){
				$this->MsgAndGo("文件太大，请上传小于2MB的图片！！！","?c=Activity&a=modify&id={$_POST['id']}",3,0);
			}
			else{
				$newPath = "./upfile/".time().".".$suffix;
				move_uploaded_file($_FILES['upfile']['tmp_name'], $newPath);
				$obj2 = new SmallImage(400,300);
				$small_path = $obj2->getSmallImage($newPath);

				$info['filePath'] = $newPath;
				$info['small_image'] = $small_path;

				$obj = ModelFactory::getModel("ActivityModel");

				//删除没有用的图片
				$id = $_POST['id'];
				$result = $obj->getOneActivity($id);
				$path = $result['filePath'];
				$small_path = $result['small_image'];      //得到原来文件的地址
				unlink ( $path );
				unlink ( $small_path );

				$obj->modifyActivity($info);

				$this->MsgAndGo("修改成功!!!","?c=Activity&a=showActivity",1,1);
				}


		}

		//显示添加荣誉展示后台
		function showHonorAddAction(){
			session_start();
			$this->pass();
			$name = $_SESSION['name'];
			include_once "./Views/honoradd.html";
		}

		//添加新荣誉
		function honorAddAction(){
			$obj = ModelFactory::getModel("ActivityModel");
			$title = addslashes($_POST['title']);  
			$member = addslashes($_POST['member']);  
			$teacher = addslashes($_POST['teacher']);
			$author = addslashes($_POST['author']);  
			$time = $obj->getTime();
    		
			//检测文件是否符合要求，如果成功就上传
			$last = strrpos($_FILES['upfile']['name'], '.')+1;
			$suffix = substr($_FILES['upfile']['name'], $last);
			$arr = array('png','gif','jpg','PNG','GIF','JPG');

			if($_FILES['upfile']['error']!=0){
				$this->MsgAndGo("上传出错(可能文件过大)","?c=Activity&a=showHonorAdd",3,0);
				die();
			}

			if(!in_array($suffix, $arr))
			{
				$this->MsgAndGo("请上传png，gif或jpg格式的图片！！！","?c=Activity&a=showHonorAdd",3,0);
			}
			else if($_FILES['upfile']['size']>1024*1024*2){
				$this->MsgAndGo("文件太大,请上传小于2MB的图片！！！","?c=Activity&a=showHonorAdd",3,0);
			}
			else{
				$image = "./upfile/".time().".".$suffix;
				move_uploaded_file($_FILES['upfile']['tmp_name'], $image);
				$obj2 = new SmallImage(400,300);
				$small_image = $obj2->getSmallImage($image);
				$obj->addHonor($title,$member,$teacher,$time,$image,$small_image,$author);
				$this->MsgAndGo("添加成功！！！","?c=Activity&a=showHonorManage",1,1);
			}


		}

		//显示荣誉管理
		function showHonorManageAction(){
			session_start();
			$this->pass();
			$name = $_SESSION['name'];
			$obj = ModelFactory::getModel("ActivityModel");
			$result = $obj->getAllHonor();
			$count = count($result);
			include_once "./Views/honormanage.html";
		}

		//显示荣誉修改
		function showHonorModifyAction(){
			session_start();
			$this->pass();
			$name = $_SESSION['name'];
			$id = $_GET['id'];
			$obj = ModelFactory::getModel("ActivityModel");
			$result = $obj->getOneHonor($id);
			include_once "./Views/honormodify.html";
		}

		function modifyHonorAction(){
			$info = array();
			$info['id'] = $_POST['id'];
			$info['title'] = addslashes($_POST['title']);
			$info['author'] = addslashes($_POST['author']);
			$info['member'] = addslashes($_POST['member']);
			$info['teacher'] = addslashes($_POST['teacher']);

			//检测图片是否符合要求
			$last = strrpos($_FILES['upfile']['name'], '.')+1;
			$suffix = substr($_FILES['upfile']['name'], $last);
			$arr = array('png','gif','jpg','PNG','GIF','JPG');
			if($_FILES['upfile']['error']!=0){
				$this->MsgAndGo("上传出错(可能文件过大)","?c=Activity&a=showHonorModify&id={$_POST['id']}",3,0);
				die();
			}
			if(!in_array($suffix, $arr))
			{
				$this->MsgAndGo("请上传png，gif或jpg格式的图片！！！","?c=Activity&a=showHonorModify&id={$_POST['id']}",3,0);
			}
			else if($_FILES['upfile']['size']>1024*1024*2){
				$this->MsgAndGo("文件太大，请上传小于2MB的图片！！！","?c=Activity&a=showHonorModify&id={$_POST['id']}",3,0);
			}
			else{
				$newPath = "./upfile/".time().".".$suffix;
				move_uploaded_file($_FILES['upfile']['tmp_name'], $newPath);
				$obj2 = new SmallImage(400,300);
				$small_path = $obj2->getSmallImage($newPath);

				$info['image'] = $newPath;
				$info['small_image'] = $small_path;

				$obj = ModelFactory::getModel("ActivityModel");

				//删除没有用的图片
				$id = $_POST['id'];
				$result = $obj->getOneHonor($id);
				$path = $result['image'];
				$small_path = $result['small_image'];      //得到原来文件的地址
				unlink ( $path );
				unlink ( $small_path );

				$obj->modifyHonor($info);

				$this->MsgAndGo("修改成功!!!","?c=Activity&a=showHonorManage",1,1);
				}

		}

		//删除荣誉
		function deleteHonorAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::getModel("ActivityModel");
			
			//删除对应图片文件
			$result = $obj->getOneHonor($id);
			$path = $result['image'];
			$small_path = $result['small_image'];
			unlink ( $path );
			unlink ( $small_path);

			$obj->deleteHonor($id);
			$this->MsgAndGo("删除成功!!!","?c=Activity&a=showHonorManage",1,1);
		}





	}//class的后括号
	
?>