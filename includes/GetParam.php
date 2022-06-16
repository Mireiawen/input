<?php
declare(strict_types = 1);

namespace Mireiawen\Input;

/**
 * HTTP GET input handler class
 *
 * @package Mireiawen\Input
 */
class GetParam extends AbstractInput
{
	/**
	 * Check if the parameter is set in the GET data
	 *
	 * @param string $key
	 *    The key to check
	 *
	 * @return bool
	 *    The existence of the key
	 */
	public function Has(string $key) : bool
	{
		return isset($_GET[$key]);
	}
	
	/**
	 * Get the GET variable and return its value, or default if the value
	 * is not set
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return mixed
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 */
	public function Get(string $key, $default = NULL)
	{
		if (isset($_GET[$key]))
		{
			return $_GET[$key];
		}
		
		if (!\is_null($default))
		{
			return $default;
		}
		
		throw new MissingValue($key);
	}
	
	/**
	 * Set the GET variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param mixed $value
	 *    The value to write
	 */
	public function Set(string $key, $value) : void
	{
		$_GET[$key] = $value;
	}
}
