<?php

namespace app\models;

use PDO;

class Profile extends \app\core\Model{
	
	public $profile_id;
	public $user_id;
	public $first_name;
	public $last_name;

	// CRUD

	public function insert(){
		$SQL = 'INSERT INTO profile (user_id, first_name, last_name) VALUES (:user_id, :first_name, :last_name)';
		$STMT = self::$_conn->prepare($SQL); 
		$data = ['user_id' => $this->user_id,
				'first_name' => $this->first_name,
				'last_name' => $this->last_name];
		$STMT->execute($data);
	}

	public function getForUser($user_id){
		$SQL = 'SELECT * FROM profile WHERE user_id = :user_id';
		$STMT = self::$_conn->prepare($SQL); 
		$STMT->execute(['user_id' => $user_id]);
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetch(); // return what should be the only record
	}

	public function getAll(){
		$SQL = 'SELECT * FROM profile';
		$STMT = self::$_conn->prepare($SQL); 
		$STMT->execute();
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetchAll(); // return all records
	}

	// search
	public function getByName($name){
		$SQL = 'SELECT * FROM profile WHERE CONCAT(first_name,\' \',last_name) = :name';
		$STMT = self::$_conn->prepare($SQL); 
		$STMT->execute(
			['name' => $this->$name]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Profile');
		return $STMT->fetchAll(); // return all records
	}

	// you can't change user_id because that's a business logic choice that gets implemented in the model
	public function update(){
		$SQL = 'UPDATE profile SET first_name = :first_name, last_name = :last_name WHERE profile_id = :profile_id';
		$STMT = self::$_conn->prepare($SQL); 
		$data = ['profile_id' => $this->profile_id,
				'first_name' => $this->first_name,
				'last_name' => $this->last_name];
		$STMT->execute($data);
	}

	public function delete(){
		$SQL = 'DELETE FROM profile WHERE profile_id = :profile_id';
		$STMT = self::$_conn->prepare($SQL); 
		$STMT->execute(['profile_id' => $this->profile_id]);
	}
}