<header>
    <div class="headerMain">
        <a class="undecorate"  href= {{ ROOT_PATH }} >
            <div class="logoCtn"></div>
        </a>
        <div class="vMiddle hCtnLeft">
        <table><tbody><tr>
        <td class="logoDesc"><div><a class="undecorate"  href= {{ ROOT_PATH }} >问答社区</a><div></td>
        <td>
            <div class="searchCtn">
            <input class="searchInput" type="text" placeholder="搜索问题、用户..." />
            <input class="searchBtn ppticon" type="submit" value="0" />
            </div>
        </td>
        <td>
            <a class="headerFunc undecorate" href="/TechQ/ask" style="margin-left:20px;">我要提问</a>
        </td>
        </tr></tbody></table>
        </div>
        <div class="vMiddle hCtnRight">
        <table><tbody><tr>
        {{ elements.getMenu() }}
        </tr></tbody></table>
        </div>
    </div>
</header>

<div class="main">
    {{ flash.output() }}
    {{ content() }}
    <div class="indexRight">
    {% if not isLogin %}
    <div class="indexLogin">
        <div class="panelTitle">登录</div>
        <div class="indexLoginForm">
            <input type="text" id="emailInput" placeholder="请输入邮箱">
            <input type="password" id="pwInput" placeholder="请输入密码">
            <button class="loginBtn" id="loginBtn" value="登录">登&nbsp;&nbsp;&nbsp;录</button>
        </div>
    </div>
    {% else %}
    <div class="userHead">
        <img src="/TechQ/images/3.png"></img>
        <div class="userInfo"><div class="userName">{{ username }}</div> <div class="userLevel">Lv1</div><br/>
            <div class="userTag">
                {% for t in goodAt %}
                <a href="javascript:;">{{ t }}</a>
                {% endfor %}
            </div>
            <div class="userCenterLink"><a href="#">进入个人中心</a></div>
        </div>
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
    {% endif %}
</div>
</div>
