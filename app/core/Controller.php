<?php

namespace app\core;

class Controller{
	function view($name, $data=null){
		include('app/views/' . $name . '.php');
	}
}