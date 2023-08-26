<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="p-3" id="main" role="main">
    <article class="post" itemscope>
        <img class="rounded img-fluid" alt="Display" src=<?php $this->options->DisPicUrl() ?>></img>
        <h1 class="display-5" itemprop="name headline">
            <a class="text-dark" style="text-decoration: none;" itemprop="url"
               href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        </h1>
        <p class="text-secondary">
            <a class="text-secondary" style="text-decoration: none;" href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a> 
            <?php $this->date('F j, Y'); ?> 
            <?php $this->category(','); ?> 
            标签: <?php $this->tags(',', true, 'none'); ?> 
        </p>
        <hr />
        <br />
        <div class="post-content text-dark h6 img-fluid" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
    <br />
    <hr />
    <br />
</div><!-- end #main-->

    <?php $this->need('comments.php'); ?>

    <ul class="list-group">
        <li class="list-group-item">上一篇: <?php $this->thePrev('%s', '没有了'); ?></li>
        <li class="list-group-item">下一篇: <?php $this->theNext('%s', '没有了'); ?></li>
    </ul>
</div><!-- end #main-->
<br />
<hr />
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
