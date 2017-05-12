<?php
	class ValidCode{

		private $width=0;
		private $height=0;

		function getValidCode($len){

			$type = rand(1,2);
			$n = rand(1,5);

			/*if($type==1)
				$img = imagecreatefromgif("./images/captcha_bg{$n}.gif");
			else
				$img = imagecreatefromjpeg("./images/captcha_bg{$n}.jpg");
			*/
			$img = imagecreatetruecolor(80, 45);
			$color = imagecolorallocate($img,192,192,192);
			imagefill($img, 0, 0, $color);

			$this->width = imagesx($img);
			$this->height = imagesy($img);

			$validCode = $this->getCode($len);

			$color1 = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));

			imagestring($img, 5, 20, 12, $validCode, $color1);
			//$this->addDisturb($img , $color1);

			header("content-type:image/png");
			imagepng($img);

			imagedestroy($img);

			return $validCode;

		}

		private function addDisturb($img,$color){

			for($i=0 ; $i<10 ; $i++){
				$x = rand(0,$this->width-1);
				$y = rand(0,$this->height-1);
				imagerectangle($img, $x, $y, $x+1, $y+1, $color);
			}

			for($i=0 ; $i<3 ; $i++){
				$x1 = rand(0,$this->width-1);
				$y1 = rand(0,$this->height-1);
				$x2 = rand(0,$this->width-1);
				$y2 = rand(0,$this->height-1);
				imageline($img, $x1, $y1, $x2, $y2, $color);
			}

		}


		private function getCode($len){
			$arr1 = range("0","9");
			$arr2 = range("a","z");
			$arr3 = range("A","Z");
			$arr = array_merge($arr1,$arr2,$arr3);

			$str = "";

			for($i=0 ; $i<$len ; $i++){
				$index = rand(0,61);
				$str .= $arr[$index];
			}

			return $str;
		}



	}
?>