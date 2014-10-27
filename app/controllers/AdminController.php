<?php

class AdminController extends BaseController {
	 protected function initialize() {
        $this->tag->setTitle('控制台');
        parent::initialize();
    }

    public function indexAction()
    {
        $response = new \Phalcon\Http\Response();
        $response->redirect("admin/user");
        return $response;
    }

    public function userAction()
    {
        $users = User::find();
        $this->view->setVar("users", $users);
        $this->view->setVar("userCount", User::count("role<>777 AND status=0"));
        $this->view->setVar("adminCount", User::count("role=777 AND status=0"));
        $this->view->setVar("blackCount", User::count("status=-1"));
    }

    public function questionAction()
    {

    }

    public function tagAction()
    {

    }
}