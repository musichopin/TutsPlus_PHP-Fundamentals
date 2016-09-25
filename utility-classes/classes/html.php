<?php

class HTML {
	// Only for the lesson. Normally place in config file.
	public static $base_url = 'localhost:81/';

	public static function link($href, $text)
	{
		// contatination yapınca quote'lara dikkat (single quote kullanılmasa da olurdu)
		return "<a href='http://" . self::$base_url . $href . "'>$text</a>";
		// alt:
		// return "<a href=" . 'http://' . self::$base_url . $href . ">$text</a>";
		// regular link:
		// return "<a href= 'http://google.com' >$text</a>";

		// we try to turn relative link into absolute link (sometimes it is helpful)
		// we refer to class itself with "self" kw. we don't use this kw since it refers to object and base_url is a static variable
	}

// we could have used for each sta as well instead of implode function
	public static function ul($items)
	{
		return "<ul><li>" . implode('</li><li>', $items) . '</li></ul>';
	}
	
	// implode(', ', $items);
	// prints "item1, item2, item3"

	public static function image($src, $alt = '')
	{
		return "<img src='$src' alt='$alt'>";
		// aşağıdaki gibi olmadı:
		// return "<img src=" . $src . "alt=" . $alt .  ">";
		// return "<img src=" . $src . "alt=$alt>";
	}

	// Homework: create a script helper, that accepts either
	// one script source, or an array of them.
}

