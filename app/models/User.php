<?php

class User extends \Phalcon\Mvc\Model {
	public $uid;
	public $email;
	public $password;
	public $nickname;
	public $time;		// register time
	public $points;		// does not contain locked points
	public $role;		// admin or user_0, user_1, etc
	public $headpic;	// url to headpic location
	public $intro;		// self introduction, limits to 50 letters
	public $status;		// normal(0) or forbidden(-1)
}

