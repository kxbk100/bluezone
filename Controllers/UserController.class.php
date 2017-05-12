<?php
	class UserController extends BaseController{

		function pass(){
			if(empty($_SESSION['name'])||$_SESSION['name']=="")
			{
				$this->MsgAndGo("请先登录！！！","?a=showLogin",3,0);
				exit;
			}
		}

		//显示用户
		function showUserAction(){
			$obj = ModelFactory::getModel("UserModel");
			session_start();
			$this->pass();
			$name = $_SESSION['name'];
			$result = $obj->getAllUser();
			include_once "./Views/userlist.html";
		}

		function toAdminAction(){
			echo "<script></script>";
			$id = $_GET['id'];
			$obj = ModelFactory::getModel("UserModel");
			$obj->toAdmin($id);
			$this->MsgAndGo("设置为管理员成功!!!","?c=User&a=showUser",1,1);
		}

		function offAdminAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::getModel("UserModel");
			$obj->offAdmin($id);
			$this->MsgAndGo("撤销管理员成功!!!","?c=User&a=showUser",1,1);
		}		

		function deleteUserAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::getModel("UserModel");
			$obj->deleteUser($id);
			$this->MsgAndGo("删除用户成功!!!","?c=User&a=showUser",1,1);
		}

	}  //类的花括号


?>