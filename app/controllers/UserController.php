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

        if($user->save() == true) {
            echo "Register OK";
        } else {
            echo "Sorry, the following problems were generated:\n";
            foreach ($user->getMessages() as $message) {
                echo $message->getMessage(), "\n";
            }
        }
    }
}
