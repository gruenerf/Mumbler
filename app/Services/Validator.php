<?php namespace App\Services;

class Validator extends \Illuminate\Validation\Validator
{
	/**
	 * Checks if a string only contains one word.
	 * 
	 * @return bool
	 */
	public function validateSingleWord($attribute, $value)
	{
		if (str_word_count(trim($value)) > 1)
			return false;
		else
			return true;
	}
}