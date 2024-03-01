<?php

namespace app\controllers;

class Friend extends \app\core\Controller{
	public function add($id1, $id2){
		echo "Make $id1 friends with $id2";
	}
}