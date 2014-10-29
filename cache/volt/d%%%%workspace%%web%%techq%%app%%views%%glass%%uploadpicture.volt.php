<div class="glass-title">
    上传图片
</div>
<div class="glass-main">
	
		<div class="uploadDiv">
		    <input type="text" disabled="disabled">
		    <form id="pictureForm" method="POST" action="/TechQ/Question/uploadPicture" target='ghostFrame' enctype="multipart/form-data">
		    <div class="uploadCtn">
				<button id="chooseFileBtn">选择图片</button>
				<input name="questionPicture" type="file" class="fileInput" accept="image/*">
			</div>
			</form>
	    </div>
	    <div id="canvasloader-container" style="padding-top:40px;"></div>
	    <div class="imgPreview"></div>
	    <button class="glassDiv-ok" onclick="javascript:finishUpload();" disabled="disabled" >上传</button>
	    <button class="glassDiv-cancel" onclick="javascript:cancelUpload();">取消</button>
	<iframe id='ghostFrame' name='ghostFrame' style="display:none;"></iframe>
</div>