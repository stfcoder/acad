<?php
/*******************************************************
This file copyright 2005 by Larry Garfield
(larry@garfieldtech.com).  You are free to use this
class in any way for any project of any kind whatsoever,
provided that this notice is retained.
********************************************************/


/**
 * Wrapper class for getting input data from the user, handles some security stuff
 *
 * @author	Larry Garfield
 */
class Input {

	// Control members
	var $array;

	/**
	 * Default Constructor for the class
	 *
	 * @param	$arr	The array to pull input data from, either $_GET or $_POST
	 * @author	Larry Garfield
	 *
	 */
	function Input(&$arr) {
		$this->array = &$arr;
	}

	/**
	 * Get an input value as an integer (cast it for safety)
	 *
	 * @param	$var		The name of the variable to return
	 * @param	$default	The default value to use if the variable doesn't exist, default 0
	 * @return	none
	 * @author	Larry Garfield
	 *
	 */
	function getInt($var, $default = 0) {
		return isset($this->array[$var]) ? (int)$this->array[$var] : (int)$default;
	}

	/**
	 * Get an input value as a double (cast it for safety)
	 *
	 * @param	$var		The name of the variable to return
	 * @param	$default	The default value to use if the variable doesn't exist, default 0
	 * @return	none
	 * @author	Larry Garfield
	 *
	 */
	function getDouble($var, $default = 0) {
		return isset($this->array[$var]) ? (double)$this->array[$var] : (double)$default;
	}

	/**
	 * Get an input value as a string.  REMOVES any magic slashes
	 *
	 * @param	$var		The name of the variable to return
	 * @param	$default	The default value to use if the variable doesn't exist or is empty, default is empty string
	 * @return	none
	 * @author	Larry Garfield
	 *
	 */
	function getString($var, $default = "") {
		// We are using empty here instead of isset because we want to treat
		// an empty but set form value as not existing so that we get the
		// default value
		$val = (!empty($this->array[$var])) ? $this->array[$var] : $default;
		return get_magic_quotes_gpc() ? stripslashes($val) : $val;
	}

	/**
	 * Get an input value as an array
	 *
	 * @param	$var		The name of the variable to return
	 * @param	$default	The default value to use if the variable doesn't exist, default is empty array
	 * @return	none
	 * @author	Larry Garfield
	 *
	 */
	function getArray($var, $default = array()) {
		return $val = isset($this->array[$var]) && is_array($this->array[$var]) ? $this->array[$var] : $default;
	}


}


?>
