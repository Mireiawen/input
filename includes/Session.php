<?php
/**
 * Copyright (c) 2020 Mira "Mireiawen" Manninen
 */

declare(strict_types = 1);

namespace Mireiawen\Input;

/**
 * Basic session input handler
 *
 * @package Mireiawen\Input
 * @copyright 2020 Mira "Mireiawen" Manninen
 */
class Session extends AbstractInput
{
	/**
	 * Get the current session ID as seen by PHP
	 *
	 * @return string
	 *    The session ID
	 */
	public function GetSID() : string
	{
		return session_id();
	}
	
	/**
	 * Write the current session out and "pause" it
	 * to avoid long call blocking the session
	 */
	public function Pause() : void
	{
		session_write_close();
	}
	
	/**
	 * Resume the paused session
	 */
	public function Resume() : void
	{
		session_start();
	}
	
	/**
	 * Check if the key exists
	 *
	 * @param string $key
	 *    The key to check
	 *
	 * @return bool
	 *    TRUE if the key exists, FALSE otherwise
	 */
	public function Has(string $key) : bool
	{
		return isset($_SESSION[$key]);
	}
	
	/**
	 * Get the session variable and return its value, or default if the value
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
	public function Get(string $key, $default = NULL)
	{
		if (isset($_SESSION[$key]))
		{
			return $_SESSION[$key];
		}
		
		if (!\is_null($default))
		{
			return $default;
		}
		
		throw new MissingValue($key);
	}
	
	/**
	 * Set the session variable
	 *
	 * @param string $key
	 *    The name of the key to write
	 *
	 * @param mixed $value
	 *    The value to write
	 */
	public function Set(string $key, $value) : void
	{
		$_SESSION[$key] = $value;
	}
	
	/**
	 * Get a PHP server variable, or default value if it is not set
	 *
	 * @param string $key
	 *    The key to read from
	 *
	 * @param string $default
	 *    The default value to return if the key is not set
	 *
	 * @return string
	 *    Either the value from the server variables, or default if the key is not set
	 */
	protected function GetServerVariable(string $key, string $default) : string
	{
		if (!isset($_SERVER[$key]))
		{
			return $default;
		}
		
		return (string)$_SERVER[$key];
	}
	
	/**
	 * Make sure session ID, remote address, user agent etc. are
	 * still same and time limit has not expired.
	 *
	 * @return bool
	 *    TRUE if session is still valid, FALSE otherwise
	 */
	protected function IsValid() : bool
	{
		// Session is empty, no point checking more...
		if (empty($_SESSION))
		{
			return FALSE;
		}
		
		// Check for required variables
		if (!isset($_SESSION['Server Generated SID'], $_SESSION['Remote Address'], $_SESSION['User Agent'], $_SESSION['Expires']))
		{
			return FALSE;
		}
		
		// Validate remote address
		if ($_SESSION['Remote Address'] !== md5($this->GetServerVariable('REMOTE_ADDR', 'localhost')))
		{
			return FALSE;
		}
		
		if ($_SESSION['User Agent'] !== md5($this->GetServerVariable('HTTP_USER_AGENT', 'Unknown HTTP User Agent')))
		{
			return FALSE;
		}
		
		// Check for expiry
		if (time() > $_SESSION['Expires'])
		{
			return FALSE;
		}
		
		// Check for Server Generated SID
		if (!$_SESSION['Server Generated SID'])
		{
			return FALSE;
		}
		
		// So far good
		return TRUE;
	}
}
