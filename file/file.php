<?php

// file_get_contents, file_put_contents gibi fonksiyonlar kullanılır

class File {
	public static function exists($file)
	{
		return file_exists($file);
	}

	public static function size($file)
	{
		return filesize($file);
	}

	public static function name($file)
	{
		return pathinfo($file, PATHINFO_FILENAME);
	}

	public static function extension($file)
	{
		return pathinfo($file, PATHINFO_EXTENSION);
	}

	public static function delete($file)
	{
		return unlink($file);
	}

// might be necessary for cached files
	public static function last_updated($file)
	{
		return filemtime($file);
	}

	// we should check the file's existence before returning.
	// we could have used try-catch block instead of ternary operator
	public static function get($file, $default = null)
	{
		return static::exists($file)
			? file_get_contents($file)
			: $default;
	}

	public static function put($file, $data, $append = false)
	{
		if ( $append )
		{
			// with LOCK_EX file can only be written one at a time 
			return file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
		}

		return file_put_contents($file, $data, LOCK_EX);
	}

	
	public static function append($file, $data)
	{
		return static::put($file, $data, true);

		// we didn't rewrite the code (if we had written "return file_put_contents($file, $data, FILE_APPEND | LOCK_EX);" we would have rewritten the code 
		// more readable than putting everything inside the put method 

	}

	// php truncate function automatically clears the file
	// there is also another technique that when we open a file
	// with the right priviliges that automatically clears it
	public static function truncate($file)
	{
		// if condition olmasaydı file olmasa da yaratılacaktı silmek için
		if ( static::exists($file) ) {
			$fp = fopen($file, 'w');
			fclose($fp);
		}
	}

	// Homework: Implement
	// copy and move this file to a different directory
}