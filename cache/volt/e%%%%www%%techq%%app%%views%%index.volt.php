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
        <?php echo $this->tag->stylesheetLink('styles/ask.css'); ?>
        <?php echo $this->tag->javascriptInclude('scripts/jquery-1.11.1.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('scripts/uploadify/jquery.uploadify.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('scripts/global.js'); ?>
        <?php echo $this->tag->javascriptInclude('scripts/glass.js'); ?>
    </head>
    <body>
        <div class="glassDiv">
            
        </div>
        <div class="smokeDiv">
        </div>
        <?php echo $this->getContent(); ?>
    </body>
</html>
<?php } else { ?>
<?php echo $this->getContent(); ?>
<?php } ?>