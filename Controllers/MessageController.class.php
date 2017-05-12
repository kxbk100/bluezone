<?php
	class MessageController extends BaseController{

		function pass(){
			if(empty($_SESSION['name'])||$_SESSION['name']=="")
			{
				$this->MsgAndGo("请先登录！！！","?a=showLogin",3,0);
				exit;
			}
		}


		//显示论坛首页
		function showMessageAction(){
			$obj = ModelFactory::getModel("MessageModel");
			session_start();
			//检查是否登录
			if(empty($_SESSION['username'])||$_SESSION['username']=="")
			{	
				$isLogin = true;  //islogin的意思为是否需要登录
				$isAdmin = false;
			}
			else
			{
				$isLogin = false;
				$username = $_SESSION['username'];
				$isAdmin = $_SESSION['isAdmin'];
			}

			$result = $obj->getAllMessage();
			$count = count($result);
			include_once "./Views/Message.html";

		}


		function messageInAction(){
			session_start();
			if(empty($_SESSION['name'])||$_SESSION['name']=='')
			{
				$this->MsgAndGo("请先登录!!!","?a=showLogin&lc=Message&l=showMessage",3,0);
				exit;
			}
			$obj = ModelFactory::getModel("MessageModel");
			$content = $_POST['content'];
			$time = $obj->getTime();
			$user = $_SESSION['name'];
			$obj->messageIn($user,$content,$time);
			$this->MsgAndGo("填写留言成功!!!","?c=Message&a=showMessage",1,1);
		}

		function showMessageManageAction(){
			session_start();
			$this->pass();
			$name = $_SESSION['name'];
			$obj = ModelFactory::getModel("MessageModel");
			$result=$obj->getAllMessage();
			$count = count($result);
			include_once "./Views/messagemanage.html";
		}

		function deleteMessageAction(){
			$id=$_GET['id'];
			$obj=ModelFactory::getModel("MessageModel");
			$obj->deleteMessage($id);
			$this->MsgAndGo("删除留言成功!!!","?c=Message&a=showMessageManage",1,1);
		}


	} 		//class的后花括号
?>