<?php

class BaseController extends \Phalcon\Mvc\Controller {

    protected function initialize() {
        $this->view->setVar("isAjax", $this::isAjax());
        $this->view->setVar("ROOT_PATH", '/TechQ/');
        if(!$this::isAjax()) {
            $this->tag->prependTitle('TechQ | ');
            $this->view->setTemplateAfter("main");
            $auth = $this->session->get('auth');
            if($auth) {
                $uid = $auth['uid'];
                $curUser = User::findFirst("uid='$uid'");
                $this->view->setVar("isLogin", true);
                $this->view->setVar("username", $curUser->nickname);
                $tags = UserTag::find("uid='$uid'");
                $viewTags = array();
                foreach($tags as $tag) {
                    array_push($viewTags, Tag::findFirst("tid='$tag->tid'")->name);
                }

                $this->view->setVar("goodAt", $viewTags);
            } else {
                $this->view->setVar("isLogin", false);
            }
        }
    }

    protected function forward($uri)
    {
        $uriParts = explode('/', $uri);
    	return $this->dispatcher->forward(
    		array(
    			'controller' => $uriParts[0],
    			'action' => $uriParts[1]
    		)
    	);
    }

    protected function isAjax()
    {
        return false;
    }
}
