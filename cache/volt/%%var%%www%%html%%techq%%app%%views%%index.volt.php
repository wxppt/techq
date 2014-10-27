<?php if ($isAjax == false) { ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php echo $this->tag->getTitle(); ?>
        <?php echo $this->tag->stylesheetLink('styles/main.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/header.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/ppt-icon.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/index.css'); ?>
        <?php echo $this->tag->stylesheetLink('styles/register.css'); ?>
    </head>
    <body>
        <?php echo $this->getContent(); ?>
        <?php echo $this->tag->javascriptInclude('scripts/jquery-1.11.1.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('scripts/index.js'); ?>
    </body>
</html>
<?php } else { ?>
<?php echo $this->getContent(); ?>
<?php } ?>