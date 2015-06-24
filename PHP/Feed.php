<?php
/**
* 
*/
class Feed
{
	private static $encoding = '<?xml version="1.0" encoding="utf-8"?>';
	private static $header = '<ads>';
	private static $footer = '</ads>';

	private $template = '';

	function __construct(argument)
	{
		# code...
	}

	public function loadData($data = array())
	{
		if(count($data)==0)
		{
			return false;
			break;
		}

		$this->template .= '<ad>';
		
		foreach ($data as $item) {
			$this->template .= '<id>'.$item->id.'</id>';
			$this->template .= '<id>'.$item->id.'</id>';
			$this->template .= '<id>'.$item->id.'</id>';
			$this->template .= '<id>'.$item->id.'</id>';
			$this->template .= '<id>'.$item->id.'</id>';
			$this->template .= '<id>'.$item->id.'</id>';
			$this->template .= '<id>'.$item->id.'</id>';
		}
		
		$this->template .= '</ad>';

	}
}

// <ad>
// <id><![CDATA[...]]></id>
// <url><![CDATA[...]]></url>
// <title><![CDATA[...]]></title>
// <type><![CDATA[...]]></type>
// <content><![CDATA[...]]></content>

// <price><![CDATA[...]]></price>
// <property_type><![CDATA[...]]></property_type>

// <address><![CDATA[...]]></address>
// <city_area><![CDATA[...]]></city_area>
// <city><![CDATA[...]]></city>
// <region><![CDATA[...]]></region>
// <postcode><![CDATA[...]]></postcode>
// <latitude><![CDATA[...]]></latitude>
// <longitude><![CDATA[...]]></longitude>
// <agency><![CDATA[...]]></agency>

// <floor_area unit="feet"><![CDATA[...]]></floor_area>
// <rooms><![CDATA[...]]></rooms>
// <bathrooms><![CDATA[...]]></bathrooms>
// <virtual_tour><![CDATA[...]]></virtual_tour>
// <parking><![CDATA[...]]></parking>

// <pictures>

//     <picture>
//         <picture_url><![CDATA[...]]></picture_url>
//         <picture_title><![CDATA[...]]></picture_title>
//     </picture>
//     <picture>

//         <picture_url><![CDATA[...]]></picture_url>
//         <picture_title><![CDATA[...]]></picture_title>
//     </picture>
//     ...
// </pictures>

// <date><![CDATA[...]]></date>

// </ad>

