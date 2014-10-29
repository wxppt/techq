<?php echo $this->getContent(); ?>

<?php echo $this->tag->javascriptInclude('scripts/ask.js'); ?>

<div class="indexLeft">
    <div class="panelTitle">
        提问
    </div>
    <div class="askForm">
        <table>
            <tbody>
                <tr>
                    <td width=70>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>标题</td>
                    <td><input class="askInput" name="title" type="text" placeholder="请输入问题标题" spellcheck="none"></td>
                </tr>
                <tr>
                    <td>描述</td>
                    <td><textarea class="askArea" name="content" placeholder="请输入问题描述"></textarea></td>
                </tr>
                <tr>
                    <td>悬赏</td>
                    <td><input class="askInput" name="points" type="text" placeholder="请输入悬赏积分" spellcheck="none"></td>
                </tr>
                <tr>
                    <td>图片</td>
                    <td class="uploadPicCtn"><button class="addPicture"><span>+</span><br/>添加图片</button></td>
                </tr>

                <tr>
                    <td>标签</td>
                    <td>
                        <table>
                            <tbody>
                                <?php foreach ($this->elements->getTagObjects() as $tagLine) { ?>
                                <tr>
                                    <?php foreach ($tagLine as $t) { ?>
                                    <td><input type="checkbox" name="goodAt" value=<?php echo $t->tid; ?>><?php echo $t->name; ?></td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="registerBtnCtn">
        <button class="registerBtn" onclick="javascript:askQuestion();">发布</button>
        <button class="registerBtn">取消</button>
    </div>

</div>