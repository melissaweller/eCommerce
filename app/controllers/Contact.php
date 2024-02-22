<?php
namespace app\controllers;

use stdClass;
use app\models\Message;

class Contact extends \app\core\Controller{

	function read(){
		$messages = \app\models\Message::read();
		$this->view('Contact/read',$messages);
	}

	function form(){
		$this->view('Contact/index');
		$message = new Message();
        $message->email = $_POST['email'];
        $message->message = $_POST['message'];
        $message->IP = $_SERVER['REMOTE_ADDR'];
        $message->write();
        header('Location: /Contact/read');
	}

}