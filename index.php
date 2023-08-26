<?php
/**
    Theme by MSDJHD
    采用bootstrap
    由官方主题修改而成
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<h1 class="p-3 display-3">文章</h1>
<?php while($this->next()): ?>
    <div class="container-fluid post">
        <div class="p-3" id="main" role="main">
            <a href="<?php $this->permalink() ?>">
                <img class="rounded img-fluid" alt="Display" src=<?php $this->options->DisPicUrl() ?>></img>
            </a>
                <h2 class="display-5" itemprop="name headline">
                    <a class="text-dark" style="text-decoration: none;" itemprop="url"
                       href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                </h2>
                <p class="text-secondary">
                    <a class="text-secondary" style="text-decoration: none;" href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                    <?php $this->date('F j, Y'); ?>
                    <?php $this->category(','); ?>
                </p>
            <?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;'); ?>
        </div>
    </div>
<?php endwhile; ?>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
