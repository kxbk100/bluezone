<?php
	class SmallImage{
		//还没有修改
		private $width; //缩略图宽
		private $height; //缩略图高

		function __construct($width ,$height){
			$this->width = $width;
			$this->height = $height;
		}

		function getSmallImage($filename){

			if($filename=="")
				return "";

			$arr = getimagesize($filename);
			$width = $arr[0];
			$height = $arr[1];
			$type_code = $arr[2];
			$type_arr = array("","gif","jpeg","png");
			$type = $type_arr[$type_code];			//得到图片的类型

			$fname = "imagecreatefrom".$type;
			$img = $fname($filename);


			//$size = $this->getNewSize($width,$height);
			$img2 = imagecreatetruecolor($this->width, $this->height);

			imagecopyresampled($img2, $img, 0, 0, 0, 0, $this->width, $this->height, $width, $height);

			$small_path = $this->getSmallPath($filename);

			$fname2 = "image".$type;
			$fname2($img2,$small_path);

			imagedestroy($img);
			imagedestroy($img2);

			return $small_path;

		}

		function getNewSize($width , $height){
			$wh_ratio = $width/$height;
			if($wh_ratio>=1){
				$ratio = 100/$width;
				$h = $height*$ratio;
				$size = array(100,$h);
				return $size;
			}
			else{
				$ratio = 100/$height;
				$w = $width*$ratio;
				$size = array($w,100);
				return $size;
			}
		}

		function getSmallPath($filename){
			  $pos = strrpos($filename, ".");
			  $former = substr($filename, 0,$pos);
			  $latter = strrchr($filename, ".");
			  $small_path = $former."_small".$latter;
			  $small_path = str_replace("/upfile/", "/small_image/", $small_path);
			  return $small_path;
		}


	}
?>