# Input
Simple set of classes to allow reading of PHP input arrays `$_GET`, `$_POST`, `$_ENV` and `$_SESSION`

The classes have methods to read the values as different types and either cast the value to type, or throw exception of class `Type` if the value in the input array is not of correct type.

The methods will also throw `MissingValue` -exception if the value does not exist and no default value is given.

## Requirements
* Intl extension
* PHP 7.3

## Installation
You can clone or download the code from the [GitHub repository](https://github.com/Mireiawen/input) or you can use composer: `composer require mireiawen/input`

