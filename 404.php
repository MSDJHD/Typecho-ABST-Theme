<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-tb-8 col-tb-offset-2">

    <div class="error-page">
        <div class="container-fluid" style="height:112px"></div>
        <br />
        <h2 class="post-title display-1">404 - <?php _e('页面没找到'); ?></h2>
        <hr />
        <p><?php _e('你想查看的页面已被转移或删除了, 要不要搜索看看: '); ?></p>
        <form method="post">
            <p><input type="text" name="s" class="text form-control" autofocus/></p>
            <p>
                <button type="submit" class="submit btn btn-primary"><?php _e('搜索'); ?></button>
            </p>
        </form>
        <br />
    </div>

</div><!-- end #content-->
<?php $this->need('footer.php'); ?>
