<?php
	class HomepageController extends BaseController{

		//验证是否登录
		function pass(){
			if(empty($_SESSION['name'])||$_SESSION['name']=="")
			{
				$this->MsgAndGo("请先登录！！！","?a=showLogin",3,0);
				exit;
			}
		}

		//验证是否已登录和是否为管理员和读取有关活动信息并显示指定的显示文件的方法
		function showAboutActivity($viewName){
			session_start();
			$obj = ModelFactory::getModel('HomepageModel');
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

			$result = $obj->getAllActivity();
			$count = count($result);
			include_once "./Views/".$viewName;
		}

		//验证是否已登录和是否为管理员并显示指定的显示文件的方法
		function show($viewName){
			session_start();
			$obj = ModelFactory::getModel('HomepageModel');
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

			$result = $obj->getAllActivity();
			$count = count($result);
			include_once "./Views/".$viewName;
		}

		//显示主页
		function showHomepageAction(){
			session_start();
			$obj = ModelFactory::getModel('HomepageModel');
			$obj2 = ModelFactory::getModel('ActivityModel');
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

			$result = $obj->getAllActivity();
			$count = count($result);
			$result2 = $obj2->getAllHonor();
			$count2 = count($result2);
			include_once "./Views/index.html";
		}

		//显示登录页面
		function showLoginAction(){
			include_once "./Views/login.html";
		}

		function getValidCodeAction(){
			session_start();
			$obj = new ValidCode();
			$code = $obj->getValidCode(4);
			$_SESSION['code']=$code;
		}
		//执行登录动作
		function loginAction(){
			session_start();
			if(!isset($_POST["submit"]))
			{
				//echo"<script type='text/javascript'>alert('非法访问');url=?a=showHomepage;exit();</script>";
				$this->MsgAndGo("非法访问!!!","?",3,0);
			}

			if(@$_POST["submit"]=="登录")
    		{	
       		 	$username=addslashes($_POST['username']);  
       			$password=addslashes($_POST['password']);
				$validCode = strtoupper($_POST['validCode']);
				$code = strtoupper($_SESSION['code']);

				if($code!=$validCode){
					$this->MsgAndGo("验证码不正确!!!","?a=showLogin",3,0);
					die();
				}

       			if($username == "")  
        		{    
            		//echo"<script type='text/javascript'>alert('请填写用户名');url=?a=showLogin;</script>";  
            		$this->MsgAndGo("请填写用户名!!!","?a=showLogin",3,0);     
        		} 
	
        		else if($password == "")  
        		{  
      
            		//echo"<script type='text/javascript'>alert('请填写密码');url=?a=showLogin</script>";  
          			$this->MsgAndGo("请填写密码!!!","?a=showLogin",3,0);
        		}
	
        		else  
        		{
			        //$check_query = mysqli_query($db->link,"select name,user_name,user_pw,ison from user_info where user_name='$username'");
					$obj = ModelFactory::getModel('HomepageModel');
					$result = $obj->GetOneByName($username);

            		if(!($result))  
                	{  
                    	//echo"<script type='text/javascript'>alert('账号不存在');url=?a=showLogin</script>"; 
                    	$this->MsgAndGo("账号不存在!!!","?a=showLogin",3,0);      
                	}
			 
            		else  
		    		{
				     	if($result['user_pw']===$password)
                		{
							//if($result['ison']==0)
							//{
								$_SESSION['username']=$username;
								$_SESSION['name']=$result['name'];
								$_SESSION['isAdmin']=$result['isAdmin'];
								$today = $obj->getTime();
								//mysqli_query($db->link,"update user_info set ison=1,time2='$today' where user_name='$username'");
								$obj->isOn($username,$today);
								//echo"<script type='text/javascript'>alert('登录成功');url='?a=showHomepage';</script>";
								if(empty($_POST['l']))
									$this->MsgAndGo("登录成功!!!","?",1,1);
								else{
									$l="?";
									if(!empty($_POST['lc'])){
										$l .= "c=";
										$l .= $_POST['lc'];
										$l .= "&";
									}
									$l .= "a=";
									$l .= $_POST['l'];
									$this->MsgAndGo("登录成功!!!",$l,1,1);
								}
							//}
							//else
								//echo"<script type='text/javascript'>alert('该账号已被登录，请稍后再试');url=?a=showHomepage</script>";
								//$this->MsgAndGo("该账号已被登录，请稍后再试!!!","?a=showLogin",3,0);
                		}
			 
			     		else
				    		//echo"<script type='text/javascript'>alert('密码错误');url=?a=showHomepage</script>";	
				    		$this->MsgAndGo("密码错误!!!","?a=showLogin",3,0);		 
		    		}
        		}
    		}
    		else{
    			$this->MsgAndGo("非法访问!!!","?",3,0);
    		}
		}



		//注销动作
		function logoutAction(){
			$obj = ModelFactory::getModel('HomepageModel');
			session_start();
			$username=$_SESSION['username'];
			$_SESSION['username']='';
			$_SESSION['name']='';
			$obj->notOn($username);
			$this->MsgAndGo("注销成功!!!","?",1,1);
		}				


		//显示注册页面
		function showRegisterAction(){
			include_once "./Views/register.html";
		}


		//执行注册动作
		function registerAction(){

			if(!isset($_POST['submit']))
				$this->MsgAndGo("非法访问","?",3,0);

			$username = addslashes($_POST["username"]);  
    		$password = addslashes($_POST["password"]);  
    		$psw_confirm = addslashes($_POST["confirm"]);
			$name = $_POST["name"];

    		if($username == "" || $password == "" || $psw_confirm == "" || $name == "")  
    		{  
		 		//echo"<script type='text/javascript'>alert('信息不完整');location='../register.html';</script>";
		 		$this->MsgAndGo("信息不完整!!!","?a=showRegister",3,0);  
    		}  
    		else  
    		{  
        		if($password === $psw_confirm)  
        		{     
            		//$sql = "select user_name from user_info where user_name='$username'";    
					//$check_query = mysqli_query($db->link,$sql);
					$obj = ModelFactory::getModel('HomepageModel');
        			$result = $obj->GetOneByName($username);

            		if($result)     
            		{  	
                		//echo"<script type='text/javascript'>alert('账号已存在');location='../register.html';</script>"; 
                		$this->MsgAndGo("账号已存在!!!","?a=showRegister",3,0); 
            		}  
            		else     
            		{  
						$today = $obj->getTime();
						$insert = $obj->registerIn($username,$password,$name,$today);
                		if(@$insert)  
                		{  
							//echo"<script type='text/javascript'>alert('注册成功');location='../login.html';</script>";
							$this->MsgAndGo("注册成功!!!","?",1,1); 
               			}  
                		else  
                		{  
							//echo"<script type='text/javascript'>alert('注册失败，请稍后再试');location='../register.html';</script>";
							$this->MsgAndGo("注册失败，请稍后再试!!!","?a=showRegister",3,0);  
                		}  
            		}  
        		}  
        		else  
        		{  
            		//echo"<script type='text/javascript'>alert('两次密码输入不一致');location='../register.html';</script>"; 
            		$this->MsgAndGo("两次密码输入不一致!!!","?a=showRegister",3,0); 
        		}    
    		}  


		}

		//显示活动的详情
		function showMoreAction(){
			session_start();
			$id = $_GET['id'];
			$obj = ModelFactory::getModel('HomepageModel');
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
				$check = $obj->GetOneByName($username);
				$isAdmin = (boolean)$check['isAdmin'];
			}
			$result = $obj->getActivityById($id);
			include_once "./Views/more.html";
		}

		//显示活动
		function showActivityAction(){
			session_start();
			$obj = ModelFactory::getModel('HomepageModel');
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
				$check = $obj->GetOneByName($username);
				$isAdmin = (boolean)$check['isAdmin'];
			}

			$result = $obj->getAllActivity();
			$count = count($result);

			$maxPage = ceil($count/12);		//最大页面
			$page = !empty($_GET['page'])?$_GET['page']:1;		//想要跳转的页面

			include_once "./Views/activity.html";
		}

		//显示成果展示页面
		function showShowAction(){
			session_start();
			$obj = ModelFactory::getModel('ActivityModel');
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

			$result = $obj->getAllHonor();
			$count = count($result);
			include_once "./Views/show.html";
		}

		//显示学子风采页面
		function showStudentAction(){
			$this->show("student.html");
		}

		//陈璇
		function showIntroduct1Action(){
			$this->show("introduct1.html");
		}

		//华益峰
		function showIntroduct2Action(){
			$this->show("introduct2.html");
		}

		//王斌斌
		function showIntroduct3Action(){
			$this->show("introduct3.html");
		}

		//汪锴
		function showIntroduct4Action(){
			$this->show("introduct4.html");
		}

		//汪锴
		function showIntroduct5Action(){
			$this->show("introduct5.html");
		}

		//汪锴
		function showIntroduct6Action(){
			$this->show("introduct6.html");
		}

		//汪锴
		function showIntroduct7Action(){
			$this->show("introduct7.html");
		}

		//汪锴
		function showIntroduct8Action(){
			$this->show("introduct8.html");
		}



		//显示项目竞赛
		function showProjectAction(){
			$this->show("project.html");
		}

		//项目竞赛开始
		//显示春萌介绍
		
		function showChunmengAction(){
			$this->show("chunmeng.html");
		}

		//显示新苗介绍
		function showXinmiaoAction(){
			$this->show("xinmiao.html");
		}

		//显示国创介绍
		function showGuochuangAction(){
			$this->show("guochuang.html");
		}

		//显示并进入后台
		function showBackAction(){
			session_start();
			$this->pass();
			$name = $_SESSION['name'];
			include_once "./Views/_blank.html";
		}

		function showComputerDesignAction(){
			$this->show("computerdesign.html");
		}

		function showChallengeCupAction(){
			$this->show("challengecup.html");
		}

		function showInnovateAction(){
			$this->show("innovate.html");
		}

		function showOutsourcingAction(){
			$this->show("outsourcing.html");
		}

		//项目竞赛结束

		//显示切换用户的界面
		function showChangeAction(){
			include_once "./Views/changeUser.html";
		}

		function inputEmailAction(){
			$suggest = $_POST['suggest'];
			$obj = ModelFactory::getModel('HomepageModel');
			$obj->insertSuggest($suggest);
			$this->MsgAndGo("提交成功，谢谢你的支持！！！","?",1,1);
		}

		//切换用户
		function changeUserAction(){
			if(!isset($_POST["submit"]))
			{
				//echo"<script type='text/javascript'>alert('非法访问');url=?a=showHomepage;exit();</script>";
				$this->MsgAndGo("非法访问!!!","?",3,0);
			}

			if(@$_POST["submit"]=="登录")
    		{	
       		 	$username=addslashes($_POST['username']);  
       			$password=addslashes($_POST['password']);
	
       			if($username == "")  
        		{    
            		//echo"<script type='text/javascript'>alert('请填写用户名');url=?a=showLogin;</script>";  
            		$this->MsgAndGo("请填写用户名!!!","?a=showChange",3,0);     
        		} 
	
        		else if($password == "")  
        		{  
      
            		//echo"<script type='text/javascript'>alert('请填写密码');url=?a=showLogin</script>";  
          			$this->MsgAndGo("请填写密码!!!","?a=showChange",3,0);
        		}
	
        		else  
        		{
			        //$check_query = mysqli_query($db->link,"select name,user_name,user_pw,ison from user_info where user_name='$username'");
					$obj = ModelFactory::getModel('HomepageModel');
					$result = $obj->GetOneByName($username);

            		if(!($result))  
                	{  
                    	//echo"<script type='text/javascript'>alert('账号不存在');url=?a=showLogin</script>"; 
                    	$this->MsgAndGo("账号不存在!!!","?a=showChange",3,0);      
                	}
			 
            		else  
		    		{
				     	if($result['user_pw']===$password)
                		{
							if($result['ison']==0)
							{
								session_start();
								//注销之前的帐号
								$pastUsername=$_SESSION['username'];    //获得之前的帐号信息
								$obj->notOn($pastUsername);

								$_SESSION['username']=$username;
								$_SESSION['name']=$result['name'];
								$today = $obj->getTime();
								//mysqli_query($db->link,"update user_info set ison=1,time2='$today' where user_name='$username'");
								$obj->isOn($username,$today);
								//echo"<script type='text/javascript'>alert('登录成功');url='?a=showHomepage';</script>";
								$this->MsgAndGo("切换成功!!!","?",1,1);
							}
							else
								//echo"<script type='text/javascript'>alert('该账号已被登录，请稍后再试');url=?a=showHomepage</script>";
								$this->MsgAndGo("该账号已被登录，请稍后再试!!!","?a=showChange",3,0);
                		}
			 
			     		else
				    		//echo"<script type='text/javascript'>alert('密码错误');url=?a=showHomepage</script>";	
				    		$this->MsgAndGo("密码错误!!!","?a=showChange",3,0);
				    }
				}    
			}
		}






	}  //class的后花括号
?>