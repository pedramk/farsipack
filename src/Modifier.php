<?php

namespace PedramK\FarsiPack;

class Modifier
{
	const persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

    const latinNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    const persianCharacters = ['ک', 'ی'];

    const arabicCharacters = ['ك', 'ي'];

	public static function faNumber($statement)
	{
        return str_replace(self::latinNumbers, self::persianNumbers, $statement);
	}

	public static function enNumber($statement)
	{
		return str_replace(self::persianNumbers, self::latinNumbers, $statement);
	}

	public static function alphabetCorrection($statement)
	{
		return str_replace(self::arabicCharacters, self::persianCharacters, $statement);
	}

	public static function fullFarsi($statement)
	{
		return self::faNumber(self::alphabetCorrection($statement));
	}
}