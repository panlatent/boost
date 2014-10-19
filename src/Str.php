<?php

namespace paboost {

	class Str {

		/**
		 * Convert a string to camle case.
		 *
		 * @param string $str
		 * @param array  $separators
		 * @param string $delimiter
		 * @return string
		 */
		public static function convertCamel($str, $separators = ['_', '-'], $delimiter = '')
		{
			$str = ucwords(str_replace($separators, ' ', $str));

			return str_replace(' ', $delimiter, $str);
		}

		/**
		 * Convert a string to snake case.
		 *
		 * @param string $str
		 * @param string $delimiter
		 * @return string
		 */
		public static function convertSnake($str, $delimiter = '_')
		{
			if (ctype_lower($str)) return $str;

			return strtolower(preg_replace('/(.)(?=[A-Z])/', '$1' . $delimiter, $str));
		}

	}
	
}