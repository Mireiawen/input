<?php
declare(strict_types = 1);

namespace Mireiawen\Input;

/**
 * The abstract base for input classes
 *
 * @package Mireiawen\Input
 * @copyright 2020-2022 Mira "Mireiawen" Manninen
 */
abstract class AbstractInput
{
	/**
	 * Check if the key exists
	 *
	 * @param string $key
	 *    The key to check
	 *
	 * @return bool
	 *    TRUE if the key exists, FALSE otherwise
	 */
	abstract public function Has(string $key) : bool;
	
	/**
	 * Get the input variable and return its value, or default if the value
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
	 *
	 */
	abstract public function Get(string $key, $default = NULL);
	
	/**
	 * Get the input variable and return its value, or default if it
	 * is not set, and validating the type
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param string|null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return string
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 *
	 * @throws \TypeError
	 *    If the key value is of wrong type
	 */
	public function GetString(string $key, ?string $default = NULL) : string
	{
		$value = $this->Get($key, $default);
		if (!\is_string($value))
		{
			throw new \TypeError(\sprintf(\_('Expected value of type %s, got %s'), 'string', \gettype($value)));
		}
		
		return $value;
	}
	
	/**
	 * Get the input variable and return its value, or default if it
	 * is not set, and validating the type
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param int|null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return int
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 *
	 * @throws \TypeError
	 *    If the key value is of wrong type
	 */
	public function GetInt(string $key, ?int $default = NULL) : int
	{
		$value = $this->Get($key, $default);
		if (!\is_int($value))
		{
			throw new \TypeError(\sprintf(\_('Expected value of type %s, got %s'), 'int', \gettype($value)));
		}
		
		return $value;
	}
	
	/**
	 * Get the input variable and return its value, or default if it
	 * is not set, and validating the type
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param float|null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return float
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 *
	 * @throws \TypeError
	 *    If the key value is of wrong type
	 */
	public function GetFloat(string $key, ?float $default = NULL) : float
	{
		$value = $this->Get($key, $default);
		if (!\is_float($value))
		{
			throw new \TypeError(\sprintf(\_('Expected value of type %s, got %s'), 'float', \gettype($value)));
		}
		
		return $value;
	}
	
	/**
	 * Get the input variable and return its value, or default if it
	 * is not set, and validating the type
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param bool|null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return bool
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 *
	 * @throws \TypeError
	 *    If the key value is of wrong type
	 */
	public function GetBool(string $key, ?bool $default = NULL) : bool
	{
		$value = $this->Get($key, $default);
		if (!\is_bool($value))
		{
			throw new \TypeError(\sprintf(\_('Expected value of type %s, got %s'), 'bool', \gettype($value)));
		}
		
		return $value;
	}
	
	/**
	 * Get the input variable and return its value, or default if it
	 * is not set, and validating the type
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param array|null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return array
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 *
	 * @throws \TypeError
	 *    If the key value is of wrong type
	 */
	public function GetArray(string $key, ?array $default = NULL) : array
	{
		$value = $this->Get($key, $default);
		if (!\is_array($value))
		{
			throw new \TypeError(\sprintf(\_('Expected value of type %s, got %s'), 'bool', \gettype($value)));
		}
		
		return $value;
	}
	
	/**
	 * Get the input variable and return its value, or default if it
	 * is not set, and casting the return value to correct type
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param string|null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return string
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 */
	public function GetAsString(string $key, ?string $default = NULL) : string
	{
		return (string)$this->Get($key, $default);
	}
	
	/**
	 * Get the input variable and return its value, or default if it
	 * is not set, and casting the return value to correct type
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param int|null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return int
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 */
	public function GetAsInt(string $key, ?int $default = NULL) : int
	{
		return (int)$this->Get($key, $default);
	}
	
	/**
	 * Get the input variable and return its value, or default if it
	 * is not set, and casting the return value to correct type
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param float|null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return float
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 */
	public function GetAsFloat(string $key, ?float $default = NULL) : float
	{
		return (float)$this->Get($key, $default);
	}
	
	/**
	 * Get the input variable and return its value, or default if it
	 * is not set, and casting the return value to correct type
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param bool|null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return bool
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 */
	public function GetAsBool(string $key, ?bool $default = NULL) : bool
	{
		return (bool)$this->Get($key, $default);
	}
	
	/**
	 * Get the input variable and return its value, or default if it
	 * is not set, and casting the return value to correct type
	 *
	 * @param string $key
	 *    The key to retrieve
	 *
	 * @param array|null $default
	 *    The default value for the key, NULL to throw error if key is not set
	 *
	 * @return array
	 *    The value of the key
	 *
	 * @throws MissingValue
	 *    If the key is not set and no default value is specified
	 */
	public function GetAsArray(string $key, ?array $default = NULL) : array
	{
		$value = $this->Get($key, $default);
		if (!\is_array($value))
		{
			return [$value];
		}
		
		return $value;
	}
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param mixed $value
	 *    The value to write
	 */
	abstract public function Set(string $key, $value) : void;
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param string $value
	 *    The value to write
	 */
	public function SetString(string $key, string $value) : void
	{
		$this->Set($key, $value);
	}
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param int $value
	 *    The value to write
	 */
	public function SetInt(string $key, int $value) : void
	{
		$this->Set($key, $value);
	}
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param float $value
	 *    The value to write
	 */
	public function SetFloat(string $key, float $value) : void
	{
		$this->Set($key, $value);
	}
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param bool $value
	 *    The value to write
	 */
	public function SetBool(string $key, bool $value) : void
	{
		$this->Set($key, $value);
	}
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param array $value
	 *    The value to write
	 */
	public function SetArray(string $key, array $value) : void
	{
		$this->Set($key, $value);
	}
}
