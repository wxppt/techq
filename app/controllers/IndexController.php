<?php

class IndexController extends BaseController {
    protected function initialize() {
        $this->tag->setTitle('首页');
        parent::initialize();
    }

    public function indexAction()
    {
        echo '<script>var $selectedNav = $("latest-Nav");</script>';
    }
    
}
