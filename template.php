<?php
abstract class Book {
	protected $title;
	protected $content;
	function setTitle($str)
	{
		$this->title = $str;
	}
	function setContent($str)
	{
		$this->content = $str;
	}
}
class Paperback extends Book {
	function printBook()
	{
		var_dump("The book'{$this->title}' was printed.");
	}
}
class Ebook extends Book {
	function generatePDF()
	{
		var_dump("The PDF '{this->title}' was printed.");
	}
}

$paperback = new Paperback;
$paperback -> setTitle("The greatest paperback ever");
$paperback -> printBook();
