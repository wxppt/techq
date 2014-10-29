<?php echo $this->getContent(); ?>
<?php echo $this->tag->javascriptInclude('scripts/admin.js'); ?>

<div class="indexLeft">
    <div class="indexNavCtn">
        <div class="indexNavSlct">
        </div>
        <?php echo $this->elements->getTabs(); ?>
    </div>
    <div class="user-statistics">
    	<div class="stat-block" style="background-color:#00b354;">已解决：<a href="#"><?php echo $resolvedCount; ?></a></div>
    	<div class="stat-block" style="background-color:#0073dd;">待解答：<a href="#"><?php echo $waitCount; ?></a></div>
    	<div class="stat-block"  style="background-color:#b30000;">已关闭：<a href="#"><?php echo $closeCount; ?></a></div>
    </div>

    <div class="user-operation">
    	<button id="admin-user-add" style="margin-left:20px;">增</button>
    	<button id="admin-user-delete">删</button>
    	<button id="admin-user-update">改</button>
    	<input placeholder="请输入搜索内容">
    </div>

    <div class="user-result">
    	<table cellpadding=0 cellspacing=0 rules=rows>
    		<thead>
    			<th width=50></th>
    			<th>ID</th>
    			<th>邮箱</th>
    			<th>昵称</th>
    			<th>身份</th>
    			<th>积分</th>
    			<th>注册时间</th>
    			<th>状态</th>
    		</thead>
    		<tbody>
    			
    		</tbody>
    	</table>
    </div>
</div>