<div class="glass-title">
    修改用户
</div>
<div class="glass-main">
    <input name="email" type="text" placeholder="请输入邮箱"  disabled="disabled"/>
    <input name="password" type="text" placeholder="密码不允许修改" disabled="disabled"/>
    <input name="nickname" type="text" placeholder="请输入昵称"/>
    <select name="role" >
        <option disabled="disabled" selected="selected" value="default">请选择身份</option>
        <option style="color:black;" value="0">一般用户</option>
        <option style="color:black;" value="777">管理员</option>
    </select>
    <input name="points" type="text" placeholder="请输入积分"/>
    <select name="status" >
        <option disabled="disabled" selected="selected" value="default">请选择状态</option>
        <option style="color:black;" value="0">正常</option>
        <option style="color:black;" value="-1">封禁</option>
    </select>
    <button class="glassDiv-ok" onclick="javascript:updateUser();">确定</button>
    <button class="glassDiv-cancel">取消</button>
</div>