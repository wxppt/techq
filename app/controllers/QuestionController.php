<?php

class QuestionController extends BaseController {

	protected function isAjax() {
		return true;
	}

    public function uploadPictureAction() {
        if ($this->request->hasFiles() == true) {
        	foreach ($this->request->getUploadedFiles() as $file) {
        		$nameArr = explode(".", $file->getName());
        		$saveName = md5(date('Y-m-d H:i:s',time()) . $this->session->get('auth')['uid']) . '.' . $nameArr[count($nameArr)-1];
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
}
