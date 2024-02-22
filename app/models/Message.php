<?php
namespace app\models;

class Message{
	public $name;
	public $email;
	public $IP;

	public function __construct(){
		
	}

	public static function read(){
		$filename = 'resources/Messages.txt';
		// print_r(file($filename));
	}

	public function write(){
		$filename = 'resources/Messages.txt';
		$file_handle = fopen($filename, 'a'); 
		flock($file_handle, LOCK_EX);
		$data = json_encode($this);
		fwrite($file_handle, $data . "\n");
		flock($file_handle, LOCK_UN);
		fclose($file_handle);
	}
}