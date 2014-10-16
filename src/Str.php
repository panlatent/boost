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
		 * @param bool   $each
		 * @return string
		 */
		public static function convertSnake($str, $delimiter = '_', $each = true)
		{
			if (ctype_lower($str)) return $str;

			$replace = $each ? '$1' . $delimiter : '$1' . $delimiter . '$2';
			$pattern = $each ? '/(.)(?=[A-Z])/' : '/(.)([A-Z]+)/';

			return strtolower(preg_replace($pattern, $replace, $str));
		}

	}
	
}