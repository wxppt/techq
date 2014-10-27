{% if isAjax == false %}
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        {{ get_title() }}
        {{ stylesheet_link('styles/main.css') }}
        {{ stylesheet_link('styles/glass.css') }}
        {{ stylesheet_link('styles/header.css') }}
        {{ stylesheet_link('styles/ppt-icon.css') }}
        {{ stylesheet_link('styles/index.css') }}
        {{ stylesheet_link('styles/register.css') }}
        {{ stylesheet_link('styles/user.css') }}
        {{ stylesheet_link('styles/admin.css') }}
        {{ javascript_include('scripts/jquery-1.11.1.min.js') }}
        {{ javascript_include('scripts/global.js') }}
        {{ javascript_include('scripts/glass.js') }}
    </head>
    <body>
        <div class="glassDiv">
            <div class="glass-title">
                增加用户
            </div>
            <div class="glass-main">
                <input type="text" placeholder="请输入邮箱"/>
                <input type="text" placeholder="请输入密码"/>
                <input type="text" placeholder="请输入昵称"/>
                <select>
                    <option disabled="disabled" selected="selected" value="default">请选择身份</option>
                    <option style="color:black;">一般用户</option>
                    <option style="color:black;">管理员</option>
                </select>
                <input type="text" placeholder="请输入积分"/>
                <select>
                    <option disabled="disabled" selected="selected" value="default">请选择状态</option>
                    <option style="color:black;">正常</option>
                    <option style="color:black;">封禁</option>
                </select>
                <button class="glassDiv-ok">确定</button>
                <button class="glassDiv-cancel">取消</button>
            </div>
        </div>
        <div class="smokeDiv">
        </div>
        {{ content() }}
    </body>
</html>
{% else %}
{{ content() }}
{% endif %}