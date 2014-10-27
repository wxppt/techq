{{content()}}

<script src="scripts/register.js"></script>
<div class="registerPanel">
    <div class="panelTitle">加入TechQ</div>
    <div class="registerForm">
        <table border="0">
            <tbody>
                <tr>
                    <td class="formTitle">E-mail</td>
                    <td><input class="textInput" id="emailInput" type="text" placeholder="请输入邮箱"></td>
                    <td class="formDesc">您将使用该邮箱登录</td>
                </tr>
                <tr>
                    <td class="formTitle">密码</td>
                    <td><input class="textInput" id="pwInput1" type="password" placeholder="请输入密码"></td>
                    <td class="formDesc">密码由字母数字组成，长度大于6位</td>

                </tr>
                <tr>
                    <td class="formTitle">确认密码</td>
                    <td><input class="textInput" id="pwInput2" type="password" placeholder="请再次输入密码"></td>
                    <td class="formDesc">再次输入密码以确认</td>
                </tr>
                <tr>
                    <td class="formTitle">昵称</td>
                    <td><input class="textInput" id="unameInput" type="text" placeholder="请输入昵称"></td>
                    <td class="formDesc">昵称长度大于4字节，</td>

                </tr>
                <tr>
                    <td class="formTitle">擅长领域</td>
                    <td colspan="2">
                        <table style="margin-left:30px;">
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="goodAt" value="c">C</td>
                                    <td><input type="checkbox" name="goodAt" value="cpp">C++</td>
                                    <td><input type="checkbox" name="goodAt" value="java">Java</td>
                                    <td><input type="checkbox" name="goodAt" value="python">Python</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="goodAt" value="Perl">Perl</td>
                                    <td><input type="checkbox" name="goodAt" value="Ruby">Ruby</td>
                                    <td><input type="checkbox" name="goodAt" value="Basic">Basic</td>
                                    <td><input type="checkbox" name="goodAt" value=".NET">.NET</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="checkbox" name="goodAt" value="Javascript">Javascript</td>
                                    <td><input type="checkbox" name="goodAt" value="Web">Web开发</td>
                                    <td><input type="checkbox" name="goodAt" value="Other">Other</td>
                                </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="registerBtnCtn">
                            <button class="registerBtn" id="registerBtn">注册</button>
                            <button class="registerBtn" id="backBtn">返回</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    

