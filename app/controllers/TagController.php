<?php
class TagController extends BaseController {

    protected function isAjax() {
        return true;
    }

    public function addAction() {
    	$tagName = $this->request->getpost("tagName","string");

    	$tag = new Tag();
    	$tag->name = $tagName;

    	if($tag->save()) {
    		echo json_encode(array('fbCode' => 1, 'message' => '操作成功'));
    	} else {
    		echo json_encode(array('fbCode' => -1, 'message' => '操作失败'));
    	}
    }

    public function updateAction() {
    	$tid = $this->request->getpost("tid","int");
    	$tagName = $this->request->getpost("tagName");

    	$tag = Tag::findFirst("tid='$tid'");
    	$tag->name = $tagName;

    	if($tag->save()) {
    		echo json_encode(array('fbCode' => 1, 'message' => '操作成功'));
    	} else {
    		echo json_encode(array('fbCode' => -1, 'message' => '操作失败'));
    	}
    }

    public function deleteAction() {
    	$tid = $this->request->getpost("tid","int");

    	$tag = Tag::findFirst("tid='$tid'");

    	if($tag->delete()) {
    		echo json_encode(array('fbCode' => 1, 'message' => '操作成功'));
    	} else {
    		echo json_encode(array('fbCode' => -1, 'message' => '操作失败'));
    	}
    }
}