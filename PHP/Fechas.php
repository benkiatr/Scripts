<?php
class Fechas{
	//variables globales
	private static $dayOfWeek = array('Domingo','Lunes','Marte','Miercoles','Jueves','Viernes','Sabado');
	private static $monthOfYear = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
	/**
	* funcion que regresa el nombre del dia de la semana tomando como dia 0-Domingo y 6-Sabado
	* int $num - numero del dia que se quiere obtener
	* int $avr - 3 para avreviar a los primero tres caracteres de la palabra 2- para manejar solo los primero 2 caracteres de la palabra 
	*            null - valor por defecto regresa toda la palabra.
	* return String, nombre del día.
	*/
	public static function getNameDay($num,$avr=null)
	{
		$day = "";
		$long = strlen(self::$dayOfWeek[$num]);
		if($avr==3){
			$day = substr(self::$dayOfWeek[$num],0,-($long-3));
		}elseif ($avr==2) {
			$day = substr(self::$dayOfWeek[$num],0,-($long-2));
		}else{
			$day = self::$dayOfWeek[$num];
		}
		return $day;
	}
	/**
	* funcion igual a de anterior lo que esta funciona para los meses
	* int $num - numero del mes que se quiere obtener
	* int $avr - 3 para avreviar a los primero tres caracteres de la palabra 2- para manejar solo los primero 2 caracteres de la palabra 
	*            null - valor por defecto regresa toda la palabra.
	* return String, nombre del mes.
	*/
	public static function getNameMonth($num,$avr=null)
	{
		$day = "";
		$long = strlen(self::$monthOfYear[$num]);
		if($avr==3){
			$day = substr(self::$monthOfYear[$num],0,-($long-3));
		}elseif ($avr==2) {
			$day = substr(self::$monthOfYear[$num],0,-($long-2));
		}else{
			$day = self::$monthOfYear[$num];
		}
		return $day;
	}
	/**
	* funcion que regresa la fecha actual  tomada del sistema
	* String type - unico valor  "es" sino se especifica regresa la fecha año-mes-dia
	*/
	public static function getDate($type=null)
	{
		$date = "";
		if($type=="es"){
			$date = date('d-m-Y');
		}else{
			$date = date('Y-m-d');
		}
		return $date;
	}
	/**
	* funcion para obtener la  del sistema
	**/
	public static function getHour()
	{
		$hora = date('H');
	    $hora .= ":";
	    $hora .= date('i');
	    $hora .= ":";
	    $hora .= date('s');
		return $hora;
	}
	/**
	* funcion para obtener  la informacion completa de fecha y hora
	**/
	public static function getDateTime($format)
	{
		$dateTime = Fechas::getDate($format)." ". Fechas::getHour();
		return $dateTime;
	}
	/**
	*	funcion que regresa la fecha con formato en texto
	*	@String $format | 'txt' => '12 de enero del 2012 ' | '- o / '
	*	@Date   $date   | fecha espesifica, si esta es null se toma la fecha actual
	*	@String $avr    | '3' abrevia los nombres a 3 letras '2 abrevia los nombres a 2 letras'
	*	
	**/
	public static function getDateText($format="txt",$date=null,$avr=null)
	{
		$dateText = "";//texto terminado 
		$fecha = "";//fecha de la cual se va a elaborar el texto
		if($date==null){
			$fecha = Fechas::getDate();
		}else{
			$fecha = $date;
		}
		if($format=='txt')
		{
			$arrayFechas = explode('-',$fecha);
			$dateText = $arrayFechas[2]." de ";
			$dateText .=  Fechas::getNameMonth($arrayFechas[1]-1,$avr)." del ";
			$dateText .= $arrayFechas[0];
		}else{
			$arrayFechas = explode('-',$fecha);
			$dateText = $arrayFechas[2].$format;
			$dateText .=  Fechas::getNameMonth($arrayFechas[1]-1,$avr).$format;
			$dateText .= $arrayFechas[0];
		}
		return $dateText;
	}
	/**
	*	Funcion para obtener el nombre del dia apartir de una fecha dada
	*	@Date $date .- fecha de la cual se va a extraer le dia para obtener el nombre
	*	@String $avr .- abreviacion del nombre del día que se va a obtener
	*/
	public static function getDayNameOfDate($date,$avr=null)
	{
		$dia = date('w',strtotime($date));
		return Fechas::getNameDay($dia,$avr);
	}
	/**
	 *  funcion que regresa el array de los dias de la semana
	 */
	public static function getDayWeek()
	{
		return self::$dayOfWeek;
	}
	/**
	 * funcion que regresa el array de los meses del año
	 */
	public static function getMonthYear($month=null)
	{
		if($month==null)
		{
			return self::$monthOfYear;
		}else{
			return self::$monthOfYear[$month];
		}
	}
	/**
	*	funcion para sumarle dias a una fecha dada
	*	@Int  $days.- Recive el numero de dias que se le van a sumar
	*	@Date $date.- Revice la fecha a la cual se le va a sumar los dias
	*/
	public static function addDay($days,$date=null)
	{
		if($date==null){
			$date = date('Y-m-d');
		}
		list($year,$mon,$day) = explode('-',$date);
  		return date('Y-m-d',mktime(0,0,0,$mon,$day+$days,$year));
	}
	/**
	*	funcion para restarle dias a una fecha
	*	@Date $date.- Revice la fecha a la cual se le va a restar los dias
	*	@Int  $days.- Recive el numero de dias que se le van a restar
	*/
	public static function downDay($date,$days)
	{
		list($year,$mon,$day) = explode('-',$date);
  		return date('Y-m-d',mktime(0,0,0,$mon,$day-$days,$year));
	}
	/**
	*	funcion para sumar meses a una fecha
	*	@Date $date.- Revice la fecha a la cual se le va a sumar los meses
	*	@Int  $month.- Recive el numero de meses que se le van a sumar
	*/
	public static function addMonth($date,$month)
	{
		list($year,$mon,$day) = explode('-',$date);
  		return date('Y-m-d',mktime(0,0,0,$mon+$month,$day,$year));
	}
	/**
	*	funcion para restar meses a una fecha
	*	@Date $date.- Revice la fecha a la cual se le va a restar los meses
	*	@Int  $month.- Recive el numero de meses que se le van a restar
	*/
	public static function downMonth($date,$month)
	{
		list($year,$mon,$day) = explode('-',$date);
  		return date('Y-m-d',mktime(0,0,0,$mon-$month,$day,$year));
	}
	/**
	*	funcion para sumar años a una fecha
	*	@Date $date.- Revice la fecha a la cual se le va a sumar los años
	*	@Int  $anio.- Recive el numero de años que se le van a sumar
	*/
	public static function addYear($date,$anio)
	{
		list($year,$mon,$day) = explode('-',$date);
  		return date('Y-m-d',mktime(0,0,0,$mon,$day,$year+$anio));
	}
	/**
	*	funcion para restar años a una fecha
	*	@Date $date.- Revice la fecha a la cual se le va a restar los años
	*	@Int  $anio.- Recive el numero de años que se le van a restar
	*/
	public static function downYear($date,$anio)
	{
		list($year,$mon,$day) = explode('-',$date);
  		return date('Y-m-d',mktime(0,0,0,$mon,$day,$year-$anio));
	}
	/**
	*	funcion para comvertir hora de 24 a 12 horas
	*	@hour $hour.- Hora a comvertir
	*/
	public static function getHours($hour)
	{
		return date('g A',$hour);
	}
	/**
	*	Funcion para Regresar el Ultimo dia del Mes
	*	@date $date - Fecha de la cual se va a obtener el ultimo dia
	*/
	public static function getLastDayMonth($date)
	{
		list($year,$mon,$day) = explode('-',$date);
		return date("Y-m-d",(mktime(0,0,0,$mon+1,1,$year)-1));
	}
	/**
     * Funcion para obtener los dias transcurridos entre dos fechas
     * @param $dateStart
     * @param $dateEnd
     * @return float|number
     * @throws Exception
     */
    public static function getDaysPassed($dateStart,$dateEnd)
    {
        $dateInit = strtotime($dateStart);
        $dateEnd = strtotime($dateEnd);
        if($dateEnd > $dateInit)
        {
            $dias = ($dateInit-$dateEnd)/86400;
            $dias = abs($dias);
            $dias = floor($dias);
            return intval($dias);
        }else {
            throw new Exception("La fecha final no puede ser menor que la fecha inicial", 1);
        }
    }
}