<?php

class RegisterController extends BaseController {
    protected function initialize() {
        $this->tag->setTitle('注册');
        $this->view->setVar("isAjax", $this::isAjax());
        $this->view->setVar("ROOT_PATH", '/TechQ/');
        if(!$this::isAjax()) {
            $this->tag->prependTitle('TechQ | ');
            $this->view->setTemplateAfter("single");
        }
    }

    public function indexAction()
    {
        
    }
}
