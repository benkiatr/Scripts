<?php

class Util {
	// funcion para quitar numero de un string
	public static function removeNumber($string)
	{
		$part = explode(" ",$string);
		$totalPart = count($part);
		$name = null;
		for($i=0;$i<$totalPart;$i++)
		{
			if(!is_numeric($part[$i]))
			{
				$name = $name." ".$part[$i];
			}
		}
		return $name;
	}
	// funcion que regresa el nombre del navegador
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
	// funcion que regresa la ip 
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
	// funcion que regresa el tipo de sistema operativo
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
	// funcion para generar clavez o cadenas de texto aleatorias
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
	// funcion para subir archivos a cualquier carpeta
	public static function uploadFile($path,$nameFile='file',$name=null)
	{
		$filename="";//nombre del archivo final
		$file = Input::file($nameFile);//sacando datos de archivos
		if($name==null)
		{
			$filename = Util::key(32,7).".".$file->getClientOriginalExtension();//creando el nombre alieatorio
		}else{
			$filename = $name.".".$file->getClientOriginalExtension();//creando el nombre alieatorio
		}
		$uploadSuccess = Input::file($nameFile)->move($path, $filename);//moviendo el archivo al directorio con el nuevo nombre
		return array(
				'status'   => $uploadSuccess,
				'filename' => $filename
			);
	}
	// funcion para crear un directorio en la carpeta de se le mande
	public static function createDir($path)
	{
		$createSuccess = 0;
		if(@mkdir($path,0755))
		{
			$createSuccess = 1;
		}
		return $createSuccess;
	}
	// funcion para borar un archivo de cualquier carpeta
	public static function deleteFile($pathFile)
	{
		if(@unlink($pathFile)){
			return true;
		}
		else{
			return false;
		}
	}
	// funcion para obtener datos de la ubicación del cliente
	public static function getDataUser($ip='')
	{
		$json = file_get_contents('http://ip-api.com/json/'.$ip);
		$data = json_decode($json);
		return $data;
	}
    // funcion para mostrar el status de una consilta
    public static function labelStatus($status)
    {
        $arrayClass = array(
            0=>'danger',
            1=>'success',
            2=>'info',
            3=>'default'
        );
        $arrayText = array(
            0=>'Inactivo',
            1=>'Activo',
            2=>'Programado',
            3=>'Papelera'
        );
        return '<span class="label label-'.$arrayClass[$status].'">'.$arrayText[$status].'</span>';
    }
    // function para mostrar el status de las carteleras
    public static function statusFace($status)
    {
        //0.- Pendientes 1.- Activo-Disponible 2.- bloqueado-apartado 3.- Rentado
        $arrayClass = array(
            0=>'info',
            1=>'success',
            2=>'warning',
            3=>'danger'
        );
        $arrayText = array(
            0=>'Pendiente',
            1=>'Disponible',
            2=>'Bloqueado',
            3=>'Rentado'
        );
        return '<span class="label label-'.$arrayClass[$status].'">'.$arrayText[$status].'</span>';
    }
    // funcion que regresa la clase del panel para pintarlo de color
    public static function classPanel($status)
    {
        $class = [
            0 => 'bg-gray',
            1 => 'bg-green',
            2 => 'bg-yellow',
            3 => 'bg-red'
        ];
        return $class[$status];
    }
}


