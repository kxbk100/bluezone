<?php
	//该类还没有完成写入数据库的步骤
	class Fileupload{
		private $allow_ext = array(".png",".gif",".jpg",".PNG",".GIF",".JPG");
		private $allow_type = array("image/png","image/gif","image/jpg","image/jpeg");
		private $allow_maxsize = 2097152; //上传文件最大为2MB
		private $err_arr = array();

		function getError(){
			if(empty($this->err_arr))
				return false;
			else
				return $this->err_arr;
		}

		function uploadAll(){
			foreach($_FILES as $key=>$file){
				if(!is_array($file['name']))
					$this->uploadOne($file);
				else{
					$upfile=array();
					foreach($file['name'] as $key2=>$name){
						$upfile['name'] = $name;
						$upfile['type'] = $file['type'][$key2];
						$upfile['tmp_name'] = $file['tmp_name'][$key2];
						$upfile['error'] = $file['error'][$key2];
						$upfile['size'] = $file['size'][$key2];
						$this->uploadOne($upfile);
					}

				}

			}


		}


		function uploadOne($file){

			if($file['error']==0){
				$filename = $file['name'];
				$ext = strrchr($filename,".");
				if(!in_array($ext,$this->allow_ext))
				{
					$this->err_arr[]="文件【{$filename}】后缀名不符合要求";
					return;
				}

				$filetype = $file['type'];
				if(!in_array($filetype,$this->allow_type)){
					$this->err_arr[]="文件【{$filename}】类型不符合要求";
					return;
				}

				$filesize = $file['size'];
				if($filesize>$this->allow_maxsize){
					$this->err_arr[]="文件【{$filename}】大于2MB";
					return;
				}

				$tmp_name = $file['tmp_name'];
				date_default_timezone_set('PRC');
				$name = date("YmdHis")."-".rand(1,100000).$ext;
				$file_path = "./upfile/".$name;
				if(!move_uploaded_file($tmp_name, $file_path)){
					$this->err_arr[]="文件【{$filename}】上传失败";
				}
				else{
					//上传成功
				}
			}

			else{
				$this->err_arr[]="文件【{$file['name']}】有错";
			}


		}


	}
?>
