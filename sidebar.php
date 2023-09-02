<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="display-6"><?php _e('最新文章'); ?></h3>
            <ul class="list-group rounded-0">
                <?php \Widget\Contents\Post\Recent::alloc()
                    ->parse('<a class="list-group-item" href="{permalink}"><li class="list-group-link" style="list-style: none">{title}</li></a>'); ?>
            </ul>
        </section>
        <br />
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="display-6"><?php _e('最近回复'); ?></h3>
            <ul class="list-group rounded-0">
                <?php \Widget\Comments\Recent::alloc()->to($comments); ?>
                <?php while ($comments->next()): ?>
                    <a class="list-group-item" href="<?php $comments->permalink(); ?>"><li style="list-style: none">
                        <?php $comments->author(false); ?>: <?php $comments->excerpt(35, '...'); ?>
                    </li></a>
                <?php endwhile; ?>
            </ul>
        </section>
        <br />
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="display-6"><?php _e('分类'); ?></h3>
            <ul class="list-group rounded-0">
                <?php $this->widget('Widget_Metas_Category_List')
                ->parse('<a href="{permalink}"><li class="list-group-item">{name} ({count})</li></a>'); ?>
            </ul>
        </section>
        <br />
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="display-6"><?php _e('归档'); ?></h3>
            <ul class="list-group rounded-0">
                <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年m月')->parse('<a href="{permalink}"><li class="list-group-item">{date} ({count})</li></a>'); ?>
            </ul>
        </section>
        <br />
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="display-6"><?php _e('其它'); ?></h3>
            <ul class="list-group rounded-0">
                <?php if ($this->user->hasLogin()): ?>
                    <a href="<?php $this->options->adminUrl(); ?>"><li class="list-group-item"><?php _e('进入后台'); ?>(<?php $this->user->screenName(); ?>)</li></a>
                    <a href="<?php $this->options->logoutUrl(); ?>"><li class="list-group-item"><?php _e('退出'); ?></li></a>
                <?php else: ?>
                    <a href="<?php $this->options->adminUrl('login.php'); ?>"><li class="list-group-item"><?php _e('登录'); ?></li></a>
                <?php endif; ?>
                <a href="<?php $this->options->feedUrl(); ?>"><li class="list-group-item"><?php _e('文章 RSS'); ?></li></a>
                <a href="<?php $this->options->commentsFeedUrl(); ?>"><li class="list-group-item"><?php _e('评论 RSS'); ?></li></a>
            </ul>
        </section>
        <br />
    <?php endif; ?>

</div><!-- end #sidebar -->
