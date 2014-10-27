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
            echo '<td class="headerFunc" style="padding-right:100px;"><a class="undecorate" href="#""><span class="ppticon">2 </span>个人中心</a></td>';
            echo '<td class="headerFunc" style="padding-right:100px;"><a class="undecorate" href="/TechQ/user/logout""><span class="ppticon">2 </span>登出</a></td>';
        } else {
            switch ($controllerName) {
                case 'index':
                    echo '<td class="headerFunc" style="padding-right:100px;"><a class="undecorate" href="/TechQ/register""><span class="ppticon">2 </span>创建新用户</a></td>';
                    break;
                case 'register':
                    echo '<td class="headerFunc" style="padding-right:100px;"><a class="undecorate" href="/TechQ/"><span class="ppticon">3 </span>登录</a></td>';
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
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption), '<li>';
        }
        echo '</ul>';
    }
}