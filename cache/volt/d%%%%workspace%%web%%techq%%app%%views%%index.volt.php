<?php if ($isAjax == false) { ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php echo $this->tag->getTitle(); ?>
        <?php echo $this->tag->stylesheetLink('styles/main.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/glass.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/header.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/ppt-icon.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/index.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/register.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/user.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/admin.css'); ?>
        <?php echo $this->tag->javascriptInclude('scripts/jquery-1.11.1.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('scripts/global.js'); ?>
        <?php echo $this->tag->javascriptInclude('scripts/glass.js'); ?>
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
        <?php echo $this->getContent(); ?>
    </body>
</html>
<?php } else { ?>
<?php echo $this->getContent(); ?>
<?php } ?>