{{ content() }}
{{ javascript_include('scripts/admin.js') }}

<div class="indexLeft">
    <div class="indexNavCtn">
        <div class="indexNavSlct">
        </div>
        {{ elements.getTabs() }}
    </div>
    <div class="user-statistics">
    	<div class="stat-block" style="background-color:#00b354;">活动用户：<a href="#">{{ userCount }}</a></div>
    	<div class="stat-block" style="background-color:#0073dd;">管理员：<a href="#">{{ adminCount }}</a></div>
    	<div class="stat-block"  style="background-color:#b30000;">封禁：<a href="#">{{ blackCount }}</a></div>
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
    			{% for user in users %}
    			<tr height=50 border=1>
    				<td><img src="../images/3.png"></td>
    				<td>{{ user.uid }}</td>
    				<td>{{ user.email }}</td>
    				<td>{{ user.nickname }}</td>
    				<td>
    					{% if user.role == 777 %}
    					管理员
    					{% else %}
    					一般用户
    					{% endif %}
    				</td>
    				<td>{{ user.points }}</td>
    				<td>{{ user.time }}</td>
    				<td>
    					{% if user.status == 0 %}
    					正常
    					{% elseif user.status == -1 %}
    					封禁
    					{% endif %}
    				</td>
    			</tr>
    			{% endfor %}
    		</tbody>
    	</table>
    </div>
</div>