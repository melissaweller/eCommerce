<?php
namespace app\controllers;

use stdClass;
use app\models\Counter;

class Count extends \app\core\Controller{

	function index(){
		$counter = new \app\models\Counter();
		$counter->increment();
		$counter->write();
		$echo($counter);
	}

}