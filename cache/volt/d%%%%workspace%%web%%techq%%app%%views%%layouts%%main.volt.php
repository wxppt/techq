<header>
    <div class="headerMain">
        <a class="undecorate"  href= <?php echo $ROOT_PATH; ?> >
            <div class="logoCtn"></div>
        </a>
        <div class="vMiddle hCtnLeft">
        <table><tbody><tr>
        <td class="logoDesc"><div><a class="undecorate"  href= <?php echo $ROOT_PATH; ?> >问答社区</a><div></td>
        <td>
            <div class="searchCtn">
            <input class="searchInput" type="text" placeholder="搜索问题、用户..." />
            <input class="searchBtn ppticon" type="submit" value="0" />
            </div>
        </td>
        <td>
            <a class="headerFunc undecorate" href="javascript:;" style="margin-left:20px;">我要提问</a>
        </td>
        </tr></tbody></table>
        </div>
        <div class="vMiddle hCtnRight">
        <table><tbody><tr>
        <?php echo $this->elements->getMenu(); ?>
        </tr></tbody></table>
        </div>
    </div>
</header>

<div class="main">
    <?php echo $this->flash->output(); ?>
    <?php echo $this->getContent(); ?>
    <div class="indexRight">
    <?php if (!$isLogin) { ?>
    <div class="indexLogin">
        <div class="panelTitle">登录</div>
        <div class="indexLoginForm">
            <input type="text" id="emailInput" placeholder="请输入邮箱">
            <input type="password" id="pwInput" placeholder="请输入密码">
            <button class="loginBtn" id="loginBtn" value="登录">登&nbsp;&nbsp;&nbsp;录</button>
        </div>
    </div>
    <?php } else { ?>
    <div class="userHead">
        <img src="images/3.png"></img>
        <div class="userInfo"><?php echo $username; ?><span></span></div>
    </div>
    <div class="userStatistics">
        <table>
            <tbody>
                <tr>
                    <td style="border-left:0;"><span>提问</span><br/>1</td><td><span>回答</span><br/>1</td><td><span>受助</span><br/>1</td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php } ?>
</div>
</div>
