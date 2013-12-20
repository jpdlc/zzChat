<?php

require_once("check.php");

class TestCalc extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		//echo "I run before each Test \n";
	}
	
	public function testAddPositiveValues()
	{
		//echo "running test \n";
		$a = "a";
		$b = md5("b");
		
		
		
		signup($a, $b);
		$this->expectOutputString("Mot de passe");
		
	}
	public function tearDown()
	{
		//echo "I run after each test \n";
	}
}
?>
