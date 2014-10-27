<?php

class Question extends \Phalcon\Mvc\Model {
	public $qid;
	public $title;
	public $content;
	public $add;		// added contents
	public $status;		// -1:closed 0:wait for answer 1:resolved
}
