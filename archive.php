<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container-fluid" style="height:112px"></div>
<div class="row p-3" id="main" role="main">
    <div class="col-md-9">
        <h1 class="display-3"><?php $this->archiveTitle([
                    'category' => _t('分类 %s 下的文章'),
                    'search'   => _t('包含关键字 %s 的文章'),
                    'tag'      => _t('标签 %s 下的文章'),
                    'author'   => _t('%s 发布的文章')
                ], '', ''); ?></h1>
        <div class="rounded-4 p-3 bg-light border">
            <?php if ($this->have()): ?>
                <?php while ($this->next()): ?>
                    <article>
                        <a href="<?php $this->permalink() ?>">
                            <div class="rounded-4 p-3 bg-light border">
                                <img class="rounded-3" style="height: 200px;width: 100%;object-fit: cover;" alt="Display" src=<?php $this->options->DisPicUrl() ?>></img>
                                <h2 class="display-5 text-dark"><?php $this->title() ?></h2>
                                <p class="text-secondary">
                                    <a class="text-secondary" style="text-decoration: none;" href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                                    <?php $this->date('F j, Y'); ?>
                                    <?php $this->category(','); ?>
                                </p>
                                <a class="text-dark" href="<?php $this->permalink() ?>">
                                    <div class="post-content" itemprop="articleBody">
                                        <?php $this->content(200,'- 阅读剩余部分 -'); ?>
                                    </div>
                                </a>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <article class="post">
                    <h2 class="display-4"><?php _e('没有找到内容'); ?></h2>
                </article>
            <?php endif; ?>
            <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
        </div>
        <br />
    </div>
    <div class="col-md-3">
            <h1 class="display-3">小工具</h1>
            <div class="rounded-4 p-3 bg-light border">
                <?php $this->need('sidebar.php'); ?>
            </div>
        </div>
    </div>
</div><!-- end #main -->

<?php $this->need('footer.php'); ?>
