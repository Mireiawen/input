<?php
/**
 * Copyright (c) 2020 Mira "Mireiawen" Manninen
 */

declare(strict_types = 1);

namespace Mireiawen\Input;

/**
 * ENV input handler class
 *
 * @package Mireiawen\Input
 * @copyright 2020 Mira "Mireiawen" Manninen
 */
class Env extends AbstractInput
{
	/**
	 * Check if the parameter is set in the ENV data
	 *
	 * @param string $key
	 *    The key to check
	 *
	 * @return bool
	 *    The existence of the key
	 */
	public function Has(string $key) : bool
	{
		return isset($_ENV[$key]);
	}
	
	/**
	 * Get the ENV variable and return its value, or default if the value
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
		$value = getenv($key);
		if ($value !== FALSE)
		{
			return $value;
		}
		
		if (!\is_null($default))
		{
			return $default;
		}
		
		throw new MissingValue($key);
	}
	
	/**
	 * Set the ENV variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 * @param mixed $value
	 *    The value to write
	 */
	public function Set(string $key, $value) : void
	{
		putenv(sprintf("%s=%s", $key, $value));
	}
}
