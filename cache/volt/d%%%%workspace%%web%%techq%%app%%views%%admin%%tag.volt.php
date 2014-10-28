<?php echo $this->getContent(); ?>
<?php echo $this->tag->javascriptInclude('scripts/admin.js'); ?>

<div class="indexLeft">
    <div class="indexNavCtn">
        <div class="indexNavSlct">
        </div>
        <?php echo $this->elements->getTabs(); ?>
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
    			<?php foreach ($tags as $t) { ?>
                <tr height=30 border=1>
                    <td><?php echo $t['tid']; ?></td>
                    <td><?php echo $t['name']; ?></td>
                    <td><?php echo $t['userCnt']; ?></td>
                    <td><?php echo $t['quesCnt']; ?></td>
                </tr>
                <?php } ?>
    		</tbody>
    	</table>
    </div>
</div>