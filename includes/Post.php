<?php
/**
 * Copyright (c) 2020 Mira "Mireiawen" Manninen
 */

declare(strict_types = 1);

namespace Mireiawen\Input;

/**
 * HTTP POST input handler class
 *
 * @package Mireiawen\Input
 * @copyright 2020 Mira "Mireiawen" Manninen
 */
class Post extends AbstractInput
{
	/**
	 * Check if the parameter is set in the POST data
	 *
	 * @param string $key
	 *    The key to check
	 *
	 * @return bool
	 *    The existence of the key
	 */
	public function Has(string $key) : bool
	{
		return isset($_POST[$key]);
	}
	
	/**
	 * Get the POST variable and return its value, or default if the value
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
		if (isset($_POST[$key]))
		{
			return $_POST[$key];
		}
		
		if (!\is_null($default))
		{
			return $default;
		}
		
		throw new MissingValue(\sprintf(\_('The key %s was not found in the POST data'), $key));
	}
	
	/**
	 * Set the POST variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 * @param mixed $value
	 *    The value to write
	 */
	public function Set(string $key, $value) : void
	{
		$_POST[$key] = $value;
	}
}