<?php

namespace PedramK\FarsiPack;

class FarsiEnum
{
	public static function gender($enum)
	{
		$man = 'مرد';
		$woman = 'زن';

		$data = [
			0 => $woman,
			1 => $men,
			'male' => $men,
			'female' => $woman
		];

		return $data[$enum];
	}

	public static function priceUnit($enum)
	{
		$data = [
			'rial' => 'ریال',
			'toman' => 'تومان',
			'k' => 'هزار',
			'm' => 'میلیون',
			'b' => 'میلیارد'
		];

		return $data[$enum];
	}
}