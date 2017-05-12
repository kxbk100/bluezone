<?php
//演示mysql的工具类的设计：
/*
目标：
设计一个“mysql数据库操作类”，要求：
1，设计该类的必要属性；
2，可以创建数据库对象的同时并建立跟数据库的连接（或连接失败信息）；
2.1，可以在建立连接的同时设定所要连接的数据库和所要使用的连接编码；
2.2，还可以单独设置所要连接的数据库；
2.3，还可以单独设置所要使用的连接编码；
3，可以断开连接；
4，实现其单例化。

5，该mysqldb工具类对象，可以调用一个方法，以执行“增删改”这种没有返回结果集的语句；并可以返回真假数据：真表示执行成功，假表示执行失败。

6，该mysqldb工具类对象，可以调用一个方法，以执行一条可以返回多行数据的select语句，并将该结果集，以“二维数组”的形式返回。
7，可以返回一行多列数据（实际是一维数组）；
8，可以返回一行一列数据（实际是一个标量数据）；
*/
class MySQLDB{
	private $link = null;	//用于存储连接之后的资源！
	//设定6个私有的属性，以存储6个对应的常规连接信息
	private $host;
	private $port;
	private $user;
	private $pass;
	private $charset;
	private $dbname;
	//单例化第1步：设定一个私有静态属性以存储该单例对象：
	private static $instance = null;
	//单例化第2步：将构造方法似有化
	//function __construct($host, $port, $user, $pass, $charset, $dbname){
	private function __construct($conf){
		//将这些数据存储到“自己”的属性中去
		$this->host = $conf['host'] ? $conf['host'] : "localhost";
		$this->port = $conf['port'] ? $conf['port'] : "3306";
		$this->user = $conf['user'] ? $conf['user'] : "root";
		$this->pass = $conf['pass'] ? $conf['pass'] : "123";
		$this->charset = $conf['charset'] ? $conf['charset'] : "utf8";
		$this->dbname = $conf['dbname'] ? $conf['dbname'] : "php42";

		/*/////////////////////////////////////////////////////////////////////
		//然后开始连接
		$this->link = mysql_connect("{$this->host}:{$this->port}","{$this->user}","{$this->pass}")
						or die('数据库服务器连接失败！');
		//然后开始设定连接编码
		//mysql_query("set names {$this->charset}", $this->link);
		//用以下一行代替上一行，更为“专业”：
		$this->select_charset($this->charset);

		//然后开始选定数据库
		//mysql_query("use {$this->dbname}", $this->link);
		//用以下一行代替上一行，更为“专业”：
		$this->select_database($this->dbname);
		//////////////////////////////////////////////////////////////////////*/
		//以上若干行，用以下一行代替：
		$this->connect();
	}
	//单例化第3步：设定一个静态方法，判断是否需要new一个对象，并返回
	static function GetDB( $conf1 ){
		//if( empty( self::$instance ) ) {改造为以下更为严谨的写法：
		if( !(self::$instance instanceof self) ){//如果不是自身的实例
			self::$instance = new self( $conf1 );
		}
		return self::$instance;
	}
	//单例化第4步：禁止克隆：
	private function __clone(){}

	//可以单独来修改要使用的数据库
	function select_database( $db ){
		//mysql_query("use $db", $this->link);
		$this->query( "use $db" );	//同样用这一行代替上一行，更专业！
		$this->dbname = $db;	//如果更换了数据，也得保存起来
	}
	//可以单独来修改要使用的连接编码
	function select_charset( $charset ){
		//mysql_query("set names $charset", $this->link);
		$this->query( "set names $charset" );	//同样用这一行代替上一行，更专业！
		$this->charset = $charset;	//如果更换了编码，也得保存起来
	}
	function close(){
		mysql_close( $this->link );
	}

	//该方法专门执行sql语句，并：
	//如果失败，就处理错误，然后结束；
	//如果成功，就“直接返回”，对直接结果不做任何处理
	private function query( $sql ){
		$result = mysql_query($sql,$this->link);
		if( $result === false ){
			echo "<p>发生错误了，详细请参考：";
			echo "<br />错误语句：" . $sql ;
			echo "<br />错误提示：" . mysql_error();
			echo "<br />错误代号：" . mysql_errno();
			die();	//同时，失败之后，直接终止
		}
		else{
			return $result;
		}
	}

	//该方法用于执行一条没有返回结果的增删改语句：
	function exec( $sql ){
		$result = $this->query($sql);
		return true;
	}
	//该方法可以执行一条返回多行数据的select语句，
	//并将数据以“二维数组”的形式返回
	//此select语句类似这样： select *  from XXX  where id < 8;
	function GetRows( $sql ){
		$result = $this->query($sql);

		//这里才准备返回二维数组
		//此时，$result 是“结果集”（数据集）
		$arr = array();	//空数组，目的是为了装该fetch出来的多行数据（$rec，是一维数组)
		while($rec = mysql_fetch_assoc( $result ) ){
			$arr[] = $rec;	//
		}
		return $arr;

	}
	//该方法可以返回一行多列数据（实际是一维数组）；
	//此select语句类似这样： select *  from XXX  where id = 8;
	function GetOneRow( $sql ){
		$result = $this->query($sql);

		//这里才准备返回一维数组
		//此时，$result 是“结果集”（数据集）
		if( $rec = mysql_fetch_assoc ( $result ) ){
			return $rec;	//如果有数据，则返回该行
		}
		return array();		//否则，返回空数组
				
	}
	//该方法可以返回一行一列数据（实际是一个标量数据）；
	//此select语句类似这样： select age  from XXX  where id = 8;
	function GetOneData( $sql ){
		$result = $this->query($sql);

		//这里才准备返回一个
		//此时，$result 是“结果集”（数据集）
		if( $rec = mysql_fetch_row ( $result ) ){
			return $rec[0];	//如果有数据，则返回该唯一数据
		}
		return false;	//否则，返回false，表示没有数据！
	}
	function __sleep(){
		//只要如下6个数据进行序列化
		return array('host','port','user','pass','charset','dbname');
	}
	function __wakeup(){
		//反序列化时立即完成连接工作
		$this->connect();
	}
	//此函数专门进行连接数据的最初始工作：
	private function connect(){
		$this->link = mysql_connect("{$this->host}:{$this->port}","{$this->user}","{$this->pass}")
						or die('数据库服务器连接失败！');
		$this->select_charset($this->charset);
		$this->select_database($this->dbname);
	}
}

