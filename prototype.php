<?php
abstract class CarPrototype {
	protected $manufac;
	protected $model;
	abstract function __clone();
	function getManufac() {
		return $this->manufac;
	}
	function setManufac($ManufacIn) {
		$this->manufac = $ManufacIn;
	}
	function getModel(){
		return $this->model;
	}
}
class LamboCar extends CarPrototype {
	function __construct() {
		$this->model = 'Gallardo';
	}
	function __clone(){
	}
}
class FerrariCar extends CarPrototype {
	function __construct(){
		$this->model = 'Spider';
	}
	function __clone() {
	}
}
$LamboProto = new LamboCar();
$FerrariProto = new FerrariCar();
$car1 = clone $LamboProto;
$car1->setManufac('Lamborghini');
print_r('Car 1 Model: '.$car1->getModel());
print_r('Car 1 Manufacturer: '.$car1->getManufac());
print_r('');
$car2 = clone $FerrariProto;
$car2->setManufac('Ferrari');
print_r('Car 2 Model: '.$car2->getModel());
print_r('Car 2 Manufacturer: '.$car2->getManufac());
print_r('');
/*I was unsure how to use the prototype pattern that I used here with the other
patterns*/
	
