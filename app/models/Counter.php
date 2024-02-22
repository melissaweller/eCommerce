<?php
namespace app\models;

class Counter(){

	public $count;

	public function __construct(){
		$countFile = '../resources/counter.txt';

		if(file_exists($countFile)){
			$fileContents = file_get_contents($countFile);
			$this->count = json_decode($fileContents)->count;
		}

		else{
			$this->count=0;
		}
	}

	public function increment(){
		this->count++;
	}

	public function write(){
		$countFile = '../resources/counter.txt';
        $json = json_encode(['count' => $this->count]);
        file_put_contents($countFile, $json);
	}

	public function __toString(){
		return json_encode(['count' => $this->count]);
	}

}