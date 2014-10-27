<?php

class BaseController extends \Phalcon\Mvc\Controller {

    protected function initialize() {
        $this->view->setVar("isAjax", $this::isAjax());
        if(!$this::isAjax()) {
            $this->tag->prependTitle('TechQ | ');
            $this->view->setTemplateAfter('main');
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
