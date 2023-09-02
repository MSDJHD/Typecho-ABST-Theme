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
        background-color: rgba(255,255,255,0.9);
        height: 50px;
        width: 50px;
        border-style: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    #controlers-top.show {
        opacity: 1;
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
    </div>
</div>
<div id="body" class="container">
    <div class="error-page">
        <div class="container-fluid" style="height:162px" id="banner"></div>
            <br />
            <div class="rounded-4 p-3 border shadow-lg" style="background-color: rgba(<?php $this->options->Color() ?>, 0.5);backdrop-filter: blur(<?php $this->options->blur() ?>px);">
                <?php if ($this->options->tColor == 'black'):?>
                <h1 class="display-3" style="text-shadow: 0px 0px 10px rgba(248,249,250,0.5);">404 - <?php _e('页面没找到'); ?></h1>
            <?php endif ?>
            <?php if ($this->options->tColor == 'white'):?>
                <h1 class="display-3 text-white" style="text-shadow: 0px 0px 10px rgba(33,37,41,0.5);">404 - <?php _e('页面没找到'); ?></h1>
            <?php endif ?>
                <div class="rounded-4 p-3 bg-white shadow">
                    <h2 class="display-6"><?php _e('这个页面被吃了(／_＼)，搜索一下试试？ '); ?></p>
                    <form method="post" class="btn-group shadow" style="width: 100%;">
                        <input type="text" name="s" class="btn btn-light" autofocus/>
                        <button type="submit" class="submit btn btn-primary"><?php _e('搜索'); ?></button>
                    </form>
                </div>
            </div>
        </div>
        <br />
    </div>

</div><!-- end #content-->
<?php $this->need('footer.php'); ?>
