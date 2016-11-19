<?php
abstract class Book {
	protected $title;
	protected $content;
	
	function setTitle( $str )
	{
		$this -> title = $str;
	}
	function setContent( $str )
	{
		$this -> content = $str;
	}
}
class Paperback extends Book {
	function printBook()
	{
		var_dump("The book '{$this -> title}' was printed.");
	}
}
class eBook extends Book {
	function generatePDF()
	{
		var_dump("A PDF was generated for this eBook '{$this -> title}'");
	}
}
$paperback = new Paperback;
$paperback -> setTitle("The Art of War");
$paperback -> printBook();

