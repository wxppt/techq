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
        $tags = Tag::find();
        $tagGroup = array();
        $counter = 0;
        $index = -1;
        foreach($tags as $tag) {
            if($counter % 4==0) {
                array_push($tagGroup, array());
                $index++;
            }
            array_push($tagGroup[$index], $tag);
            
            $counter++;
        }
        $this->view->setvar("tags",$tagGroup);
    }
}
