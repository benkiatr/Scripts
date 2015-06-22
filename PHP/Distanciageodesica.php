<?php 
class Distanciageodesica {

	public $lat1;
	public $long1;
	public $lat2;
	public $long2;

	function distanciaGeodesica()
	{
		$degtorad = 0.01745329;
		$radtodeg = 57.29577951;
		$dlong = ($this->long1 - $this->long2);
		$dvalue = (sin($this->lat1 * $degtorad) * sin($this->lat2 * $degtorad)) + (cos($this->lat1 * $degtorad) * cos($this->lat2 *$degtorad) * cos($dlong * $degtorad));


		$dd = acos($dvalue) * $radtodeg;
		$miles = ($dd * 69.16);
		$km = ($dd * 111.302);
		//echo "Kilometros = ". $km;
		//echo "<br>Millas = ". $miles;

		return $km;
	}
}
