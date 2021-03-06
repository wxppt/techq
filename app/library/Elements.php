<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Component {

    public function getMenu() {
        $controllerName = $this->view->getControllerName();
        $auth = $this->session->get('auth');
        if ($auth) {
            if($auth['role'] == 777) {
                echo '<td class="headerFunc" style="padding-right:100px;"><a class="undecorate" href="'. ROOT_PATH .'admin"><span class="ppticon">2 </span>控制台</a></td>';
            } else {
                echo '<td class="headerFunc" style="padding-right:100px;"><a class="undecorate" href="#""><span class="ppticon">2 </span>个人中心</a></td>';
            }
            echo '<td class="headerFunc" style="padding-right:100px;"><a class="undecorate" href="'. ROOT_PATH .'user/logout"><span class="ppticon">2 </span>登出</a></td>';
        } else {
            switch ($controllerName) {
                case 'index':
                    echo '<td class="headerFunc" style="padding-right:100px;"><a class="undecorate" href="'. ROOT_PATH .'register""><span class="ppticon">2 </span>创建新用户</a></td>';
                    break;
                case 'register':
                    echo '<td class="headerFunc" style="padding-right:100px;"><a class="undecorate" href="'. ROOT_PATH .'"><span class="ppticon">3 </span>登录</a></td>';
                    break;
                default:
                    break;
            }
        }
    }

    
    public function getTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        $auth = $this->session->get('auth');
        switch ($controllerName) {
            case 'index':
            echo '<button class="indexNav" id="index-latest-nav">最新推荐</button>';
            echo '<button class="indexNav">高分求解</button>';
            echo '<button class="indexNav">三日最热</button>';
            echo '<button class="indexNav">本周最热</button>';
            echo '<button class="indexNav">本月最热</button>';
            break;
            case 'admin':
            echo '<button class="indexNav" id="admin-user-nav">用户管理</button>';
            echo '<button class="indexNav" id="admin-question-nav">问题管理</button>';
            echo '<button class="indexNav" id="admin-tag-nav">标签管理</button>';
            break;
            case 'usercenter':
            echo '<button class="indexNav">最新推荐</button>';
            echo '<button class="indexNav">高分求解</button>';
            echo '<button class="indexNav">三日最热</button>';
            echo '<button class="indexNav">本周最热</button>';
            echo '<button class="indexNav">本月最热</button>';
            break;
            default:
            break;
        }
    }

    public function getTagObjects() {
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
        return $tagGroup;
    }
}