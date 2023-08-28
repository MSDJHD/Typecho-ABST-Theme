<?php
/**
    Theme by MSDJHD
    采用bootstrap5
    由官方主题修改而成
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="container-fluid" style="height:112px"></div>
<div class="p-3" id="main" role="main">
    <div class="row rounded-4 p-3" style="background: rgba(248, 249, 250, 0.6);backdrop-filter: blur(5px);box-shadow: 0px 0px 10px rgba(33,37,41,0.5)">
        <div class="col-md-9">
            <?php while($this->next()): ?>
            <h1 class="display-3">文章</h1>
            <a href="<?php $this->permalink() ?>">
                <div class="rounded-4 p-3 bg-white" style="box-shadow: 0px 0px 5px rgba(33,37,41,0.3)">
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
            <?php endwhile; ?>
            <?php $this->pageNav('&laquo; 上一页', '下一页 &raquo;'); ?>
        </div>
        <div class="col-md-3">
            <h1 class="display-3">小工具</h1>
            <div class="rounded-4 p-3 bg-white" style="box-shadow: 0px 0px 5px rgba(33,37,41,0.3)">
                <?php $this->need('sidebar.php'); ?>
            </div>
        </div>
    </div>
<div class="container-fluid" style="height:25px"></div>
<?php $this->need('footer.php'); ?>
