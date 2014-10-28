{{ content() }}
{{ javascript_include('scripts/admin.js') }}

<div class="indexLeft">
    <div class="indexNavCtn">
        <div class="indexNavSlct">
        </div>
        {{ elements.getTabs() }}
    </div>
    <div class="user-operation">
    	<button id="admin-tag-add" style="margin-left:20px;">增</button>
    	<button id="admin-tag-delete">删</button>
    	<button id="admin-tag-update">改</button>
    	<input placeholder="请输入搜索内容">
    </div>

    <div class="user-result">
    	<table cellpadding=0 cellspacing=0 rules=rows>
    		<thead>
    			<th>标签ID</th>
    			<th>标签名</th>
    			<th>用户数</th>
    			<th>问题数</th>
    		</thead>
    		<tbody>
    			{% for t in tags %}
                <tr height=30 border=1>
                    <td>{{ t['tid'] }}</td>
                    <td>{{ t['name'] }}</td>
                    <td>{{ t['userCnt'] }}</td>
                    <td>{{ t['quesCnt'] }}</td>
                </tr>
                {% endfor %}
    		</tbody>
    	</table>
    </div>
</div>