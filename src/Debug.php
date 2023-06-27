<?php

/*
Copyright (C) 2023 Alyssa McKeown

lib-debug is free software distributed under the GNU Affero General Public License v3.0
see the accompanying file LICENSE in the main directory of the project for more details.
*/

namespace lib_debug;

class Debug
{
	const ERROR = 1;
	const WARN = 2;
	const INFO = 3;

	private static function typeToString(int $type) : string
	{
		switch($type)
		{
			case 1:
				return 'ERROR';
			case 2:
				return 'WARN';
			case 3:
				return 'INFO';
				break;
		}

		throw new \InvalidArgumentException("Invalid debug type: ".$type);
	}

	public static function output(int $type, int $verbosity, string $message, array $tags = [], bool $prepend = true, bool $linebreak = true, int $precision = 4) : void
	{
		if(DEBUG_LEVEL !== 0 && DEBUG_LEVEL !== 1 && DEBUG_LEVEL !== 2 && DEBUG_LEVEL !== 3)
		{
			throw new \Exception("Invalid DEBUG_LEVEL is set. DEBUG_LEVEL must be between 0 - 3");
		}

		if($type !== 1 && $type !== 2 && $type !== 3)
		{
			throw new \Exception("Invalid type");
		}

		if($verbosity <= \DEBUG_VERBOSITY && $type <= \DEBUG_LEVEL)
		{
			$debug_tags = [];
			foreach(\DEBUG_DTAG_ARRAY as $debug_tag)
			{
				array_push($debug_tags, strtolower($debug_tag));
			}
			$enable_display = false;
			foreach($tags as $tag)
			{
				if(in_array(strtolower($tag), $debug_tags))
				{
					$enable_display = true;
				}
			}
			if(\DEBUG_DISPLAY_ALL === true)
			{
				$enable_display = true;
			}

			if($enable_display)
			{
				if($prepend)
				{
					echo "[" . self::typeToString($type) . "][" . $verbosity . "][" . number_format(microtime(true), $precision, ".", "") . "]";
				}

				echo $message;

				if($linebreak)
				{
					echo PHP_EOL;
				}
			}
		}
	}
}
