<?php

class AskController extends BaseController {
    protected function initialize() {
        $this->tag->setTitle('提问');
        parent::initialize();
    }

    public function indexAction()
    {
        $this->cookies->set('upPic', '', time() -1000);
    }

}
