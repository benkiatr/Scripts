<?php

class Thumb {

	private static $image;
	private static $type;
	private static $width;
	private static $height;

	//---Método de leer la imagen
	public static function loadImage($name) 
	{
		//---Tomar las dimensiones de la imagen
		$info = getimagesize($name);

		self::$width = $info[0];
		self::$height = $info[1];
		self::$type = $info[2];

		//---Dependiendo del tipo de imagen crear una nueva imagen
		switch(self::$type){
			case IMAGETYPE_JPEG:
				self::$image = imagecreatefromjpeg($name);
			break;
			case IMAGETYPE_GIF:
				self::$image = imagecreatefromgif($name);
			break;
			case IMAGETYPE_PNG:
				self::$image = imagecreatefrompng($name);
			break;
		}
	}

	//---Método de guardar la imagen
	public static function save($name, $quality = 100) {
		//---Guardar la imagen en el tipo de archivo correcto
		switch(self::$type){
			case IMAGETYPE_JPEG:
				imagejpeg(self::$image, $name, $quality);
			break;
			case IMAGETYPE_GIF:
				imagegif(self::$image, $name);
			break;
			case IMAGETYPE_PNG:
				$pngquality = floor(($quality - 10) / 10);
				imagepng(self::$image, $name, $pngquality);
			break;
		}
	}

	//---Método de mostrar la imagen sin salvarla
	public static function show() {
		//---Mostrar la imagen dependiendo del tipo de archivo
		switch(self::$type){
			case IMAGETYPE_JPEG:
				header('Content-Type: image/jpeg');
				imagejpeg(self::$image);
			break;
			case IMAGETYPE_GIF:
				header('Content-Type: image/gif');
				imagegif(self::$image);
			break;
			case IMAGETYPE_PNG:
				header('Content-Type: image/png');
				imagepng(self::$image);
			break;
		}
	}

	//---Método de redimensionar la imagen sin deformarla
	public static function resize($value, $prop){
		//---Determinar la propiedad a redimensionar y la propiedad opuesta
		$prop_value = ($prop == 'width') ? self::$width : self::$height;
		$prop_versus = ($prop == 'width') ? self::$height : self::$width;
		//---Determinar el valor opuesto a la propiedad a redimensionar
		$pcent = $value / $prop_value;
		$value_versus = $prop_versus * $pcent;
		//---Crear la imagen dependiendo de la propiedad a variar
		$image = ($prop == 'width') ? imagecreatetruecolor($value, $value_versus) : imagecreatetruecolor($value_versus, $value);
		//---Hacer una copia de la imagen dependiendo de la propiedad a variar
		switch($prop){
			case 'width':
				imagecopyresampled($image, self::$image, 0, 0, 0, 0, $value, $value_versus, self::$width, self::$height);
			break;
			case 'height':
				imagecopyresampled($image, self::$image, 0, 0, 0, 0, $value_versus, $value, self::$width, self::$height);
			break;
		}
		//---Actualizar la imagen y sus dimensiones
		self::$width = imagesx($image);
		self::$height = imagesy($image);
		self::$image = $image;
	}

	//---Método de extraer una sección de la imagen sin deformarla
	public static function crop($cwidth, $cheight, $pos = 'center') {
		//---Dependiendo del tamaño deseado redimensionar primero la imagen a uno de los valores
		// if($cwidth > $cheight){
		// 	Thumb::resize($cwidth, 'width');
		// }else{
		// 	Thumb::resize($cheight, 'height');
		// }
		//---Crear la imagen tomando la porción del centro de la imagen redimensionada con las dimensiones deseadas
		$image = imagecreatetruecolor($cwidth, $cheight);
		switch($pos){
			case 'center':
				imagecopyresampled($image, self::$image, 0, 0, abs((self::$width - $cwidth) / 2), abs((self::$height - $cheight) / 2), $cwidth, $cheight, $cwidth, $cheight);
			break;
			case 'left':
				imagecopyresampled($image, self::$image, 0, 0, 0, abs((self::$height - $cheight) / 2), $cwidth, $cheight, $cwidth, $cheight);
			break;
			case 'right':
				imagecopyresampled($image, self::$image, 0, 0, self::$width - $cwidth, abs((self::$height - $cheight) / 2), $cwidth, $cheight, $cwidth, $cheight);
			break;
			case 'top':
				imagecopyresampled($image, self::$image, 0, 0, abs((self::$width - $cwidth) / 2), 0, $cwidth, $cheight, $cwidth, $cheight);
			break;
			case 'bottom':
				imagecopyresampled($image, self::$image, 0, 0, abs((self::$width - $cwidth) / 2), self::$height - $cheight, $cwidth, $cheight, $cwidth, $cheight);
			break;
		}
		self::$image = $image;
	}

}
?>