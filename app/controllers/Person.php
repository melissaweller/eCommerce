<?php
namespace app\controllers;

class Person extends \app\core\Controller {
	function register(){
		// showing the register view
		$this->view('Person/register');
	}

	function complete_registration(){
		print_r($_POST);

		// call a view to show the submitted data
		// collect the data
		$person = new \stdClass();
		$person->first_name = $_POST['first_name'];
		$person->last_name = $_POST['last_name'];
		$person->email = $_POST['email'];
		$person->weekly_flyer = in_array('weekly_flyer', $_POST['publications']);
		$person->mailing_list = in_array('mailing_list', $_POST['publications']);

		// $person->mailing_list = $_POST['mailing_list'] ?? 'unselected';
		// hypothetically insert into a database
		// show the feedback view
		$this->view('Person/complete_registration',$person);
	}
}