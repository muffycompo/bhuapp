<?php
class Form extends Laravel\Form {

	/**
	 * Create a HTML password input element that contains a value.
	 *
	 * @param  string  $name
	 * @param  string  $value
	 * @param  array   $attributes
	 * @return string
	 */
	public static function mpassword($name, $value, $attributes = array())
	{
		return static::input('password', $name, $value, $attributes);
	}

}