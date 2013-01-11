<?php
/**
 * input.php
 * @author   Mfawa Alfred Onen <muffycompoqm@gmail.com>
 * @link     http://maomuffy.com
 */

class Input extends Laravel\Input {
    /**
     * Get an item from the input data.
     *
     * This method is used for all request verbs (GET, POST, PUT, and DELETE).
     *
     * <code>
     *		// Get the "email" item from the input array
     *		$email = Input::get('email');
     *
     *		// Return a default value if the specified item doesn't exist
     *		$email = Input::get('name', 'Taylor');
     * </code>
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public static function get($key = null, $default = null)
    {
        $input = Request::foundation()->request->all();

        if (is_null($key))
        {
            return array_merge($input, static::query());
        }

        $value = array_get($input, $key);

        if (is_null($value))
        {
            return array_get(static::query(), $key, $default);
        }

        return trim($value);
    }
}
