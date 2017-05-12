<?php
	class Watermark{
		function getWatermark($filename){

			list($width,$height,$type) = $this->getInfo($filename);
			$fname1 = "imagecreatefrom".$type;
			$img1 = $fname1($filename);

			//自建的一个画布，可用图片代替完成水印
			$img2 = imagecreatetruecolor($width, $height/5);
			$color1 = imagecolorallocate($img2, 255, 251, 241);
			imagefill($img2, 0, 0, $color1);
			$color2 = imagecolorallocate($img2, 255, 0, 0);
			imagestring($img2, 5, 0, 0, "@bluezone", $color2);

			imagecopymerge($img1, $img2, 0, $height*4/5, 0, 0, $width, $height/5, 50);

			$watermark_path = $this->getPath($filename);
			$fname2 = "image".$type;
			$fname2($img1,$watermark_path);

			echo $width;
			echo $height;
			echo $watermark_path;
			return $watermark_path;
		}

		private function getInfo($filename){
			$size = getimagesize($filename);
			$width = $size[0];
			$height = $size[1];
			$type_code = $size[2];
			$type_arr = array("","gif","jpeg","png");
			$type = $type_arr[$type_code];

			return array($width,$height,$type);
		}

		private function getPath($filename){
			$pos = strrpos($filename, ".");
			$former = substr($filename, 0,$pos);
			$latter = strrchr($filename, ".");
			$watermark_path = $former."_watermark".$latter;
			$watermark_path = str_replace("/upfile/", "/watermark_image/", $watermark_path);
			return $watermark_path;

		}

	}

?>