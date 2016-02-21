<?php


require_once('config.php');

class Help 
{
	public $rescueTye;
	public $latitude;
	public $longitude;


	public function __construct($rescueTye, $latitude, $longitude)
	{
		$this->rescueTye = $rescueTye;
		$this->latitude  = $latitude;
		$this->longitude = $longitude;
	}


}