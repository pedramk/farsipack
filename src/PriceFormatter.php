<?php

namespace PedramK\FarsiPack;

use Exception;
use PedramK\FarsiPack\Modifier;
use PedramK\FarsiPack\Enum;

class PriceFormatter
{
	public static function priceFormat($number, $farsi = true)
	{
		if(! $farsi) {
	    	return self::commaSeparated($number);
		}

		return Modifier::faNumber(self::commaSeparated($number));
	}

	public static function finalPrice($price, $percent, $type = 'off')
	{
		if($type == 'off') {
			return intval($price)*(100-intval($percent))/100;
		} else if ($type == 'on') {
			return intval($price)*(100+intval($percent))/100;
		} else {
			throw new Exception('Invalid input argument!');
		}
	}

	public static function alterationPrice($price, $percent)
	{
		return intval($price)*intval($percent)/100;
	}

	public static function setUnit($price, $unit)
	{
		$length = strlen($price);
		if($length > 12) { throw new Exception('Price is out of range!'); }

		$zeroGroup = floor($length/3);
		$rem = $length%3;

		if(! $rem) { $zeroGroup -= 1; }

		switch ($zeroGroup) {
			case 1:
				$prefix = 'k';
				break;
			case 2:
				$prefix = 'm';
				break;
			case 3:
				$prefix = 'b';
				break;
			default:
				throw new Exception('Whoops! Something unusual happened!');
				break;
		}
		
		return (explode(',', self::commaSeparated($price)))[0] . ' ' . Enum::priceUnit($prefix) . ' ' . Enum::priceUnit($unit);
	}

	private static function commaSeparated($number)
	{
	    return number_format(intval($number));
	}
}