<?php
declare(strict_types = 1);

namespace Mireiawen\Input;

/**
 * Input data interface
 *
 * @package Mireiawen\Input
 * @copyright 2020-2022 Mira "Mireiawen" Manninen
 * @license MIT
 */
interface InputInterface
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
	public function Has(string $key) : bool;
	
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
	public function Get(string $key, $default = NULL);
	
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
	public function GetString(string $key, ?string $default = NULL) : string;
	
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
	public function GetInt(string $key, ?int $default = NULL) : int;
	
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
	public function GetFloat(string $key, ?float $default = NULL) : float;
	
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
	public function GetBool(string $key, ?bool $default = NULL) : bool;
	
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
	public function GetArray(string $key, ?array $default = NULL) : array;
	
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
	public function GetAsString(string $key, ?string $default = NULL) : string;
	
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
	public function GetAsInt(string $key, ?int $default = NULL) : int;
	
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
	public function GetAsFloat(string $key, ?float $default = NULL) : float;
	
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
	public function GetAsBool(string $key, ?bool $default = NULL) : bool;
	
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
	public function GetAsArray(string $key, ?array $default = NULL) : array;
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param mixed $value
	 *    The value to write
	 */
	public function Set(string $key, $value) : void;
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param string $value
	 *    The value to write
	 */
	public function SetString(string $key, string $value) : void;
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param int $value
	 *    The value to write
	 */
	public function SetInt(string $key, int $value) : void;
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param float $value
	 *    The value to write
	 */
	public function SetFloat(string $key, float $value) : void;
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param bool $value
	 *    The value to write
	 */
	public function SetBool(string $key, bool $value) : void;
	
	/**
	 * Set the input variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param array $value
	 *    The value to write
	 */
	public function SetArray(string $key, array $value) : void;
}