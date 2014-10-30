<?php

class QuestionController extends BaseController {

	protected function isAjax() {
		return true;
	}

    public function uploadPictureAction() {
        if ($this->request->hasFiles() == true) {
        	foreach ($this->request->getUploadedFiles() as $file) {
        		$nameArr = explode(".", $file->getName());
        		$saveName = md5(date('Y-m-d H:i:s') . $this->session->get('auth')['uid']) . '.' . $nameArr[count($nameArr)-1];
        		$fbCode = 0;
        		$url = "";
        		$message = "";
        		if($file->moveTo(APP_PATH . 'public/images/q/tmp/' . $saveName)) {
        			$fbCode = 1;
        			$url = 'images/q/tmp/'.$saveName;
                    if ($this->cookies->has('upPic')) {
                        $oldUrl = $this->cookies->get('upPic');
                        $this->cookies->set('upPic', $oldUrl.",".$url, time() + 15 * 30000);
                    } else {
                        $this->cookies->set('upPic', $url, time() + 15 * 30000);
                    }
                    
        			$message = "操作成功";
        		} else {
        			$fbCode = -1;
        			$message = "转存文件失败";
        		}
        	}
        } else {
        	$fbCode = -1;
        	$message = "无文件";
        }

        $this->view->setvar("fbCode",$fbCode);
        $this->view->setvar("picUrl",$url);
        $this->view->setvar("message",$message);
    }

    public function cancelUploadAction() {
        $url = $this->request->getpost("url");
        if($url) {
            if(unlink(APP_PATH . "public/".$url)) {
                $oldUrl = $this->cookies->get('upPic');
                $oldUrl = str_replace($url.",", "", $oldUrl);
                $oldUrl = str_replace($url, "", $oldUrl);
                $this->cookies->set('upPic', $oldUrl.",".$url, time() + 15 * 30000);
                echo json_encode(array('fbCode' => 1,'message'=> '删除成功'));
            } else {
                echo json_encode(array('fbCode' => -1,'message'=> '删除失败'));
            }
        } else {
            echo json_encode(array('fbCode' => -2,'message'=> '参数有误'));
        }
    }

    public function askQuestionAction() {
        $title = $this->request->getpost("title");
        $content = $this->request->getpost("content");
        $tags = $this->request->getpost("tags");
        $points = $this->request->getpost("points","int");

        $uid = $this->session->get('auth')['uid'];
        $user = User::findFirst("uid='$uid'");
        if($user) {
            if($user->points < $points) {
                echo json_encode(array('fbCode' => -1,'message'=> '积分不足'));
                return;
            }
            $question = new Question();
            $question->title = $title;
            $question->content = $content;
            $question->tags = $tags;
            $question->status = 0;

            if($question->save()) {
                // 添加标签
                $tagArr = explode(",", $tags);
                foreach($tagArr as $tag) {
                    $q_t = new QuestionTag();
                    $q_t->qid = $question->qid;
                    $q_t->tid = $tag;
                    $q_t->save();
                }
                // 添加图片
                $this->cookies->useEncryption(false);
                if ($this->cookies->has('upPic')) {
                    echo $this->cookies->get('upPic');
                    $picArr = explode(",", $this->cookies->get('upPic'));
                    $flag = true;

                    foreach($picArr as $pic) {
                        $q_p = new QuestionPicture();
                        $q_p->qid = $question->qid;
                        echo $pic;
                        $q_p->p_url = $pic;
                        if(!$q_p->save()) {
                            $flag = false;
                            break;
                        }
                    }
                    if(!$flag) {
                        echo json_encode(array('fbCode' => -1,'message'=> '图片添加失败'));
                    }
                }

                // 添加用户
                $ask = new Ask();
                $ask->uid = $uid;
                $ask->qid = $question->qid;
                $ask->time = date('Y-m-d H:i:s');
                $ask->points = $points;
                $user->points = $user->points - $points;

                if($ask->save()) {
                    if($user->save()) {
                        echo json_encode(array('fbCode' => 1,'message'=> '问题创建成功'));
                    } else {
                        echo json_encode(array('fbCode' => -1,'message'=> '用户信息更新失败'));
                    }
                } else {
                    echo json_encode(array('fbCode' => -1,'message'=> '提问者登记失败'));
                }
            } else {
                echo json_encode(array('fbCode' => -1,'message'=> '问题创建失败'));
            }

        } else {
            echo json_encode(array('fbCode' => -1,'message'=> '用户未登录'));
        }
    }

    public function deleteQuestionAction() {
        $qid = $this->request->getpost("qid","int");

        $question = Question::findFirst("qid='$qid'");

        if($question) {
            if($question->delete()) {
                echo parent::jsonFeedback(1);
            } else {
                echo parent::jsonFeedback(-1,"删除失败");
            }
        } else {
            echo parent::jsonFeedback(-1,"找不到这个问题");
        }
    }

    public function addDescAction() {
        $qid = $this->request->getpost("qid","int");
        $addDesc = $this->request->getpost("addDesc");

        $question = Question::findFirst("qid='$qid'");

        if($question) {
            $question->add = $addDesc;
            if($question->save()) {
                echo parent::jsonFeedback(1);
            } else {
                echo parent::jsonFeedback(-1,"保存失败");
            }
        } else {
            echo parent::jsonFeedback(-1,"找不到这个问题");
        }
    }

    public function answerAction() {
        $qid = $this->request->getpost("qid","int");
        $content = $this->request->getpost("content");
        $user = $this->session->get('auth');

        if($user) {
            $answer = new Answer();
            $answer->uid = $user['uid'];
            $answer->qid = $qid;
            $answer->content = $content;
            $answer->time = date('Y-m-d H:i:s');
            if($answer->save()) {
                echo parent::jsonFeedback(1);
            } else {
                echo parent::jsonFeedback(-1,"保存失败");
            }
        } else {
            echo parent::jsonFeedback(-1,"您没有登录");
        }
    }

    public function praiseAction() {
        $aid = $this->request->getpost("aid","int");
        $position = $this->request->getpost("position","int");
        $user = $this->session->get('auth');

        if($user) {
            $uid = $user['uid'];

            $position = $position>0?1:-1;
            $check = Praise::findFirst("aid='$aid' AND uid='$uid' AND position='$position'");
            if($check) {
                echo parent::jsonFeedback(-1,"您已赞过");
            } else {
                $old = Praise::findFirst("aid='$aid' AND uid='$uid'");
                if($old) {
                    $old->delete();
                }
                $praise = new Praise();
                $praise->aid=$aid;
                $praise->uid=$uid;
                $praise->position=$position;
                if($praise->save()) {
                    echo parent::jsonFeedback(1);
                } else {
                    echo parent::jsonFeedback(-1,"保存失败");
                }
            }
        } else {
            echo parent::jsonFeedback(-1,"您没有登录");
        }
    }

    public function cancelAction() {
        $aid = $this->request->getpost("aid","int");
        $user = $this->session->get('auth');

        if($user) {
            $uid = $user['uid'];
            $old = Praise::findFirst("aid='$aid' AND uid='$uid'");
            if($old) {
                $old->delete();
                echo parent::jsonFeedback(1);
            }
        } else {
            echo parent::jsonFeedback(-1,"您没有登录");
        }
    }

    public function commentAction() {

    }

    public function questionResolvedAction() {

    }

    public function questionClosedAction() {

    }
}
