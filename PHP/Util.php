<?php

class Util {

	/**
	* Funcion para quitar numeros de un String
	* String $string - String a evaluar para quitar los numeros
	* @return $string - Regresa el String sin los Números
	*/
	public static function removeNumber($string)
	{
		$part = str_split($string);
		$name = "";
		for($i=0;$i<count($part);$i++)
		{
			if(!is_numeric($part[$i]))
			{
				$name .= $part[$i];
			}
		}
		return $name;
	}

    /**
     * Funcion para regregar el nombre del navegador usado
     * @return string
     */
	public static function browser()
	{
		$datos = $_SERVER["HTTP_USER_AGENT"];
		if (@eregi("Firefox", $datos)) {
			$string = "Firefox";
		} elseif (@eregi("MSIE", $datos)) {
			$string = "Internet Explorer";
		} elseif (@eregi("Opera", $datos)) {
			$string = "Opera Browser";
		} elseif (@eregi("Chrome", $datos)) {
			$string = "Google Chrome";
		} elseif (@eregi("Safari", $datos)) {
			$string = "Safari";
		} else {
			$string = "Otro";
		}
		return $string;
	}

    /**
     * Funcion para regregar la ip del visitante
     * @return mixed
     */
	public static function ipAdress()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
		{
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		return $_SERVER['REMOTE_ADDR'];
	}

    /**
     * Funcion para regresar el nombre del sistema operativo
     * @return string
     */
	public static function systemOperative()
	{
		$datos = $_SERVER["HTTP_USER_AGENT"];
		if (@eregi("Windows", $datos)) {
			$string = "Windows";
		} elseif (@eregi("Linux", $datos)) {
			$string = "Linux";
		} elseif (@eregi("Mac", $datos)) {
			$string = "Mac OS";
		} elseif (@eregi("Sun", $datos)) {
			$string = "Solaris";
		} elseif (@eregi("Freebsd", $datos)) {
			$string = "Free BSD";
		} elseif (@eregi("SymbianOS", $datos)) {
			$string = "SymbianOS";
		} elseif (@eregi("iphone", $datos)) {
			$string = "iPhone OS";
		} elseif (@eregi("palm", $datos)) {
			$string = "Palm OS";
		} else {
			$string = "Otro";
		}
		return $string;
	}

    /**
     * Funcion para generar convinaciones aleatorias
     * @param int $long
     * @param null $combina
     * @return string
     */
	public static function key($long=1,$combina=null)
	{
		$arrayCarecter = array(
			1 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
			2 => "abcdefghijklmnopqrstuvwxyz",
			3 => "0123456789",
			4 => "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",
			5 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
			6 => "abcdefghijklmnopqrstuvwxyz0123456789",
			7 => "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
			8 => "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789=$%@^-()><"
		);
		//opcionesde convinaciones
		$clave = "";
		$cadenaCaracteres = $arrayCarecter[$combina];
		for ($i = 0; $i < $long; $i++)//recorremos el for hasta el numero que se manda
		{
			srand((double)microtime() * 1000000);
			$clave .= $cadenaCaracteres[rand(0, strlen($cadenaCaracteres) - 1)];
			//optenemis una letras por cada instancia;
		}
		return $clave;
	}

    /**
     * Funcion para crear directorios
     * @param $path
     * @return bool
     */
	public static function createDir($path)
    {
        if (@mkdir($path, 0755))
        {
            return true;
        }
        return false;
    }

    /**
     * Funcion para eliminar archivos
     * @param $pathFile
     * @return bool
     */
	public static function deleteFile($pathFile)
	{
		if(@unlink($pathFile))
        {
			return true;
		}
		return false;
	}

    /**
     * Funcion para optiener información de un visitante por medio de la ip
     * @param string $ip
     * @return mixed
     */
	public static function getDataUser($ip='')
	{
		$json = file_get_contents('http://ip-api.com/json/'.$ip);
		$data = json_decode($json);
		return $data;
	}
}


