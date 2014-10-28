<?php
class UserController extends BaseController {

    protected function isAjax() {
        return true;
    }

    public function loginAction() {
        // request var from html form
        $email = $this->request->getpost("email", "email");
        $password = $this->request->getpost("password");
        $password = md5($email . " " . $password);

        // find user in db
        $user = User::findFirst("email='$email' AND password='$password'");

        if($user != false) {
            $this->session->set('auth', array(
                'uid' => $user->uid,
                'role' => $user->role
            ));

        	echo json_encode(array('fbCode' => 1, 'message' => '登录成功' )); 
        } else {
        	echo json_encode(array('fbCode' => -1, 'message' => '用户名或密码错误' )); 
        }
    }

    public function logoutAction() {
        $this->session->remove('auth');
        $response = new \Phalcon\Http\Response();
        $response->redirect("");
        return $response;
    }

    public function registerAction() {
        // request var from html
        $nickname = $this->request->getpost("nickname", "string");
        $password = $this->request->getpost("password");
        $email = $this->request->getpost("email", "email");
        
        $user = new User();
        $user->email = $email;
        $user->password = md5($email ." ".$password);
        $user->nickname = $nickname;
        $user->time = date('Y-m-d H:i:s');
        $user->points = 0;
        $user->role = 0;
        $user->headpic = "default";
        $user->intro = "";
        $user->status = 0;

        if($user->save() == true) {
            $flag = true;
            $goodAt = explode(",", $this->request->getpost("goodAt", "string"));
            foreach($goodAt as $item) {
                $newGoodAt = new UserTag();
                $newGoodAt->uid = $user->uid;
                $newGoodAt->tid = intval($item);
                if(!$newGoodAt->save()) {
                    $flag = false;
                    break;
                }
            }
            if($flag) {
                $this->session->set('auth', array(
                'uid' => $user->uid,
                'role' => $user->role
                ));
                echo json_encode(array('fbCode' => 1, 'message' => '注册成功' ));
            } else {
                $user->delete();
                echo json_encode(array('fbCode' => -1, 'message' => '标签添加失败' ));
            }
        } else {
            echo json_encode(array('fbCode' => -1, 'message' => '注册失败' ));
        }
    }

    public function deleteAction() {
        $uid = $this->request->getpost("uid","int");
        $user = User::findFirst("uid='$uid'");
        if($user) {
            if($this->session->get('auth')['uid'] == $uid) {
                echo json_encode(array('fbCode' => -1, 'message' => '不可以删除自己'));
            } else {
                $user->delete();
                echo json_encode(array('fbCode' => 1, 'message' => '删除成功'));
            }
            
        } else {
            echo json_encode(array('fbCode' => -1, 'message' => '找不到UID为'.$uid.'的用户'));
        }
    }

    public function addAction() {
        $email = $this->request->getpost("email","email");
        $password = $this->request->getpost("password");
        $nickname = $this->request->getpost("nickname","string");
        $role = $this->request->getpost("role","int");
        $points = $this->request->getpost("points","int");
        $status = $this->request->getpost("status","int");

        $user = new User();
        $user->email = $email;
        $user->password = md5($email ." ".$password);
        $user->nickname = $nickname;
        $user->time = date('Y-m-d H:i:s');
        $user->points = $points;
        $user->role = $role;
        $user->status = $status;
        $user->headpic = "default";
        $user->intro = "";

        if($user->save() == true) {
            $this->session->set('auth', array(
                'uid' => $user->uid,
                'role' => $user->role
            ));
            echo json_encode(array('fbCode' => 1, 'message' => '增加成功' ));
        } else {
            echo json_encode(array('fbCode' => -1, 'message' => '增加失败' ));
        }
    }

    public function updateAction() {
        $uid = $this->request->getpost("uid","int");
        $email = $this->request->getpost("email","email");
        $nickname = $this->request->getpost("nickname","string");
        $role = $this->request->getpost("role","int");
        $points = $this->request->getpost("points","int");
        $status = $this->request->getpost("status","int");

        $user = User::findFirst("uid='$uid'");
        $user->nickname = $nickname;
        $user->points = $points;
        $user->role = $role;
        $user->status = $status;

        if($user->save() == true) {
            $this->session->set('auth', array(
                'uid' => $user->uid,
                'role' => $user->role
            ));
            echo json_encode(array('fbCode' => 1, 'message' => '修改成功' ));
        } else {
            echo json_encode(array('fbCode' => -1, 'message' => '修改失败' ));
        }
    }
}
