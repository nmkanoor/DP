<?php
class Book
{
	private $author;
	private $title;
	public function __construct($author, $title)
	{
		$this -> author = $author;
		$this -> title = $title;
	}
	public function getAuthor()
	{
		return $this -> author;
	}
	public function getTitle()
	{
		return $this -> title;
	}
}
class BookAdapter
{
	private $book;
	public function __construct(Book $book)
	{
		$this -> book = $book;
	}
	public function getAuthorandTitle()
	{
		return $this -> book -> getTitle().' by '.$this -> book ->
		getAuthor();
	}
}
$book = new Book('Khaled Hosseini', 'A Thousand Splendid Suns');
$bookAdapter = new BookAdapter($book);
echo 'Author and Title: '.$bookAdapter->getAuthorAndTitle();
