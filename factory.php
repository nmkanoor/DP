<?php	
class LuxuryCars
{
	private $CarMake;
	private $CarModel;

	public function __construct($make, $model)
	{
		$this->CarMake = $make;
		$this->CarModel = $model;
	}
	public function getMakeAndModel()
	{
		return $this->CarMake . ' ' . $this->CarModel;
	}
}
class LuxuryCarFactory
{
	public static function create($make, $model)
	{
		return new LuxuryCars($make, $model);
	}
}

//Through the use of the factory pattern, one can tell what car is needed//

interface Car {
	function cost();
	function description();
}
class SportCar implements Car {
	function cost()
	{
		return 90000;
	}
	function description()
	{
		return " with two butterfly doors ";
	}
}
abstract class CarFeatures implements Car {
	protected $car;
	function __construct(Car $car)
	{
		$this -> car = $car;
	}
	abstract function cost();
	abstract function description();
}
class SunRoof extends CarFeatures {
	function cost ()
	{
		return $this -> car -> cost() + 1000;
	}
	function description()
	{
	return $this -> car -> description() . "and a sunroof";
	}
}
//Through the decorator pattern, we can see the price of adding a sunroof//

interface DiscountGenerator {
	function AddSeasonDiscount();
	function AddStockDiscount();
}
class LamborghiniDiscount implements DiscountGenerator {
	private $discount = 0;
	private $HighSeason = false;
	private $HighStock = true;
	public function AddSeasonDiscount()
	{
		if(!$this -> HighSeason) return $this -> discount +=5;
		return $this -> discount +=0;
	}
	public function AddStockDiscount()
	{
		if ($this -> HighStock) return $this -> discount += 7;
		return $this -> discount += 0;
	}
}
class FerrariDiscount implements DiscountGenerator {
	private $discount = 0;
	private $HighSeason = false;
	private $HighStock = true;
	public function AddSeasonDiscount()
	{
		if(!$this -> HighSeason) return $this-> discount +=4;
		return $this -> discount += 0;
	}
	public function AddStockDiscount()
	{
		if($this -> HighStock) return $this -> discount += 10;
		return $this -> discount += 0;
	}
}
function DiscountObjectGenerator($automobile)
{
	if($automobile == "lamborghini")
	{
		$carobj= new LamborghiniDiscount;
	}
	else if($automobile == "ferrari")
	{
		$carobj = new FerrariDiscount;
	}
	return $carobj;
}

class CouponGenerator {
	private $CarCoupon;
	public function __construct(DiscountGenerator $CarCoupon)
	{
		$this -> CarCoupon = $CarCoupon;
	}
	public function getCoupon()
	{
		$discount = $this -> CarCoupon -> AddSeasonDiscount();
		$discount = $this -> CarCoupon -> AddStockDiscount();
		return $coupon = "Get {$discount}% off your car purchase!.";
	}
}
//The strategy pattern allows for a small discount to be given//

$gallardo = LuxuryCarFactory::create('Lamborghini', 'Gallardo');
print_r($gallardo->getMakeAndModel());

$basicCar = new SportCar();
$CarWithRoof = new SunRoof($basicCar);
echo $CarWithRoof -> description();
echo " costs ";
echo $CarWithRoof -> cost();

$automobile = "lamborghini";
$carobj = DiscountObjectGenerator($automobile);
$CouponGenerator = new CouponGenerator($carobj);
echo $CouponGenerator -> getCoupon();
//The sample output shows the price of a Lamborghini with a sunroof and discount//
