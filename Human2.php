<?php 

namespace Gondr99\Modul;


class Human 
{
	public $name;
	public $age;

	public function __construct($name,$age)
	{
		$this->name = $name;
		$this->age = 30;


	}	

	public static function info()
	{
		print '인간 클래스입니다. ';
	}
}
