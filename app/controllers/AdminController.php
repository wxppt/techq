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
        $this->view->setVar("resolvedCount", Question::count(""));
        $this->view->setVar("waitCount", Question::count(""));
        $this->view->setVar("closeCount", Question::count(""));
    }

    public function tagAction()
    {
        $tags = Tag::find();
        $dispTags = array();

        foreach($tags as $tag) {
            array_push($dispTags, array(
                'tid' => $tag->tid, 
                'name' => $tag->name, 
                'userCnt' => UserTag::count("tid='$tag->tid'"),
                'quesCnt' => QuestionTag::count("tid='$tag->tid'")));
        }
        $this->view->setVar("tags", $dispTags);
    }
}