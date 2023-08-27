<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container" style="height:112px"></div>

<div class="p-3" id="main" role="main">
    <div class="row">
        <div class="col-md-9">
            <article class="post" itemscope>
            <div class="rounded-4 bg-light border p-3">
                <div class="col">
                    <img class="rounded-3" style="height: 200px;width: 100%;object-fit: cover;" alt="Display" src=<?php $this->options->DisPicUrl() ?>></img>
                </div>
                <div class="col">
                    <h1 class="display-3"><?php $this->title() ?></h1>
                    <p class="text-secondary">
                        <a class="text-secondary" style="text-decoration: none;" href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                        <?php $this->date('F j, Y'); ?>
                        <?php $this->category(','); ?>
                    </p>
                </div>
            </div>
            <br />
            <div class="rounded-4 p-3 bg-light border">
                <br />
                <div class="post-content text-dark h6 img-fluid" itemprop="articleBody">
                    <?php $this->content(); ?>
                </div>
            </div>
            </article>
            <br />
            <h1 class="display-3">评论</h1>
            <div class="rounded-4 p-3 bg-light border">
                <?php $this->need('comments.php'); ?>
            </div>
            <br />
            <h1 class="display-3">继续阅读</h1>
            <ul class="list-group rounded-4">
                <li class="list-group-item">上一篇: <?php $this->thePrev('%s', '没有了'); ?></li>
                <li class="list-group-item">下一篇: <?php $this->theNext('%s', '没有了'); ?></li>
            </ul>
            <br />
        </div>
        <div class="col-md-3">
            <h1 class="display-3">小工具</h1>
            <div class="rounded-4 p-3 bg-light border">
                <?php $this->need('sidebar.php'); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>