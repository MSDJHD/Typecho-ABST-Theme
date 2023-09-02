<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<script>
    window.addEventListener('scroll', function() {
        var button = document.getElementById('controlers-top');
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > 400) {
            document.getElementById('controlers-top').classList.add('show');
        } else {
            document.getElementById('controlers-top').classList.remove('show');
        }
    });
</script>
<style>
    #controlers-top {
        background-color: rgba(255,255,255);
        height: 30px;
        width: 50px;
        border-style: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    #controlers-top.show {
        opacity: 0.9;
    }
    #controlers {
        background-color: rgba(255,255,255);
        height: 50px;
        width: 50px;
        border-style: none;
        opacity: 0.9;
    }
    img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: var(--bs-border-radius);
    }
</style>
<div class="p-4 fixed-bottom">
    <div class="float-end">
        <a href="#">
            <button id="controlers-top" class="btn btn-light shadow rounded-1">
                <i class="bi bi-caret-up-fill"></i>
            </button>
        </a>
        <div class="container" style="height: 5px"></div>
        <a href="#comments">
            <button id="controlers" class="btn btn-light shadow rounded-1">
                <i class="bi bi-chat-left-fill"></i>
            </button>
        </a>
    </div>
</div>
<div id="body" class="container">
<div class="container" style="height: 162px" id="banner"></div>
<div class="p-3" id="main" role="main">
    <div class="row rounded-4 p-3 border shadow-lg" style="background-color: rgba(<?php $this->options->Color() ?>, 0.5);backdrop-filter: blur(<?php $this->options->blur() ?>px);">
        <div class="col-md-9">
            <article class="post" itemscope>
            <div class="rounded-4 p-3 bg-white shadow">
                <div class="col">
                    <?php if (array_key_exists('thumb',unserialize($this->___fields()))): ?>
                        <div class="index-post-thumb">
                            <img class="thumb rounded-3" style="height: 200px;width: 100%;object-fit: cover;" src="<?php echo $this->fields->thumb;?>">
                        </div>
                        <?php else : ?>
                        <?php $thumb = showThumbnail($this); if(!empty($thumb)):?>

                        <div class="index-post-thumb">
                            <img class="thumb rounded-3" style="height: 200px;width: 100%;object-fit: cover;" src="<?php echo $thumb;?>">
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
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
            <div class="rounded-4 p-3 bg-white shadow">
                <br />
                <div class="post-content text-dark h6 img-fluid" itemprop="articleBody">
                    <?php $this->content(); ?>
                </div>
            </div>
            </article>
            <br />
            <?php if ($this->options->tColor == 'black'):?>
                <h1 class="display-3" style="text-shadow: 0px 0px 10px rgba(248,249,250,0.5);">评论</h1>
            <?php endif ?>
            <?php if ($this->options->tColor == 'white'):?>
                <h1 class="display-3 text-white" style="text-shadow: 0px 0px 10px rgba(33,37,41,0.5);">评论</h1>
            <?php endif ?>
            <div class="rounded-4 p-3 bg-white shadow">
                <?php $this->need('comments.php'); ?>
            </div>
            <br />
            <ul class="rounded-4 list-group p-3 bg-white shadow">
            <li class="list-group-item">上一篇: <?php $this->thePrev('%s', '没有了'); ?></li>
            <li class="list-group-item">下一篇: <?php $this->theNext('%s', '没有了'); ?></li>
            </ul>
            <br />
        </div>
        <div class="col-md-3">
            <?php if ($this->options->tColor == 'black'):?>
                <h1 class="display-3" style="text-shadow: 0px 0px 10px rgba(248,249,250,0.5);">小工具</h1>
            <?php endif ?>
            <?php if ($this->options->tColor == 'white'):?>
                <h1 class="display-3 text-white" style="text-shadow: 0px 0px 10px rgba(33,37,41,0.5);">小工具</h1>
            <?php endif ?>
            <div class="rounded-4 p-3 bg-white shadow">
                <?php $this->need('sidebar.php'); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>