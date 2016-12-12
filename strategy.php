<?php
class StrategyContext {
	private $strategy = NULL; 
	public function __construct($strategy_ind_id) {
		switch ($strategy_ind_id) {
			case "C":
				$this->strategy = new StrategyCaps();
			break;
			case "E":
				$this->strategy = new StrategyExclaim();
			break;
			case "S":
				$this->strategy = new StrategyStars();
			break;
		}
	}
	public function showBookTitle($book) {
		return $this->strategy->showTitle($book);
	}
}
interface StrategyInterface {
	public function showTitle($book_in);
}
class StrategyCaps implements StrategyInterface {
	public function showTitle($book_in) {
		$title = $book_in->getTitle();
		$this->titleCount++;
		return strtoupper ($title);
	}
}
class StrategyExclaim implements StrategyInterface {
	public function showTitle($book_in) {
		$title = $book_in->getTitle();
		$this->titleCount++;
		return Str_replace(' ','!',$title);
	}
}
class StrategyStars implements StrategyInterface {
	public function showTitle($book_in) {
		$title = $book_in->getTitle();
		$this->titleCount++;
		return Str_replace(' ','*',$title);
	}
}
class Book {
	private $author;
	private $title;
	function __construct($title_in, $author_in) {
		$this->author = $author_in;
		$this->title = $title_in;
	}
	function getAuthor() {
		return $this->author;
	}
	function getTitle() {
		return $this->title;
	}
	function getAuthorAndTitle() {
		return $this->getTitle() . ' by ' . $this->getAuthor();
	}
}
print_r('BEGIN TESTING STRATEGY PATTERN');
print_r('');
$book = new Book('The Art of War','Sun Tzu');
$strategyContextC = new StrategyContext('C');
$strategyContextE = new StrategyContext('E');
$strategyContextS = new StrategyContext('S');
print_r('test 1 - show name context C');
print_r($strategyContextC->showBookTitle($book));
print_r('');
print_r('test 2 - show name context E');
print_r($strategyContextE->showBookTitle($book));
print_r('');
print_r('test 3 - show name context S');
print_r($strategyContextS->showBookTitle($book));
print_r('');
print_r('END TESTING STRATEGY PATTERN');
function writeln($line_in) {
	echo $line_in."<br/>";
}
?>



