<?php

namespace Boost {

	class ArrObj {

		/**
		 * Get a value From a array or object.
		 *
		 * @param mixed $arrObj
		 * @param mixed $key
		 * @param mixed $default
		 * @return mixed
		 */
		public static function value($arrObj, $key, $default = null)
		{
			if (is_array($arrObj) && isset($arrObj[$key]))
				return $arrObj[$key];
			elseif (is_object($arrObj) && isset($arrObj->$key))
				return $arrObj->$key;
			else
				return $default;
		}

		/**
		 * Get a value From a array or object, according to the separator of recursive search keys.
		 *
		 * @param mixed  $arrObj
		 * @param mixed  $key
		 * @param mixed  $default
		 * @param string $separator
		 * @param int    $limit
		 * @return mixed
		 */
		public static function valueByDot($arrObj, $key, $default = null, $separator = '.', $limit = 512)
		{
			$keys = explode($separator, $key, $limit);
			if (1 == count($keys))
				return static::value($arrObj, $key, $default);

			foreach ($keys as $child) {
				$arrObj = static::value($arrObj, $child, $default);
				if ($default == $arrObj)
					return $default;
			}

			return $arrObj;
		}

	}

}