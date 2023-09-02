<?php
/**
 * 二次元毛玻璃主题，MSDJHD制作
 *
 * @package ABST
 * @author MSDJHD
 * @version 0.8
 * @link https://github.com/MSDJHD
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<script>
    window.addEventListener('scroll', function() {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        var banner = document.querySelector('#banner-index');
        if (banner && scrollTop < 200) {
            document.getElementById('navbar').style.top = '-500px';
        } else {
            document.getElementById('navbar').style.top = '0px';
        }
    });
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
    #navbar {
        position: fixed;
        top: -500px;
        left: 0;
        width: 100%;
        transition: top 0.5s ease;
        }
    #controlers-top {
        background-color: rgba(255,255,255);
        height: 50px;
        width: 50px;
        border-style: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    #controlers-top.show {
        opacity: 0.9;
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
<div id="banner-index" class="p-5 shadow-lg" 
    style="background-rgba(0,0,0,0.5);
    height: 100vh;
    width:100%;
    background-image: url('<?php $this->options->BannerPicUrl() ?>');
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
    display: flex;
    justify-content: center;
    align-items: center;"
>
    <h1 class="p-3 display-1 text-white" style="text-shadow:0px 0px 10px black"><?php $this->options->title(); ?></h1>
    <div class="mx-auto" style="position: relative;position: absolute;bottom: 0;">
        <a href="#body-index">
            <button class="btn text-light mx-auto">
                <img style="width: 50px;height: 50px;filter: drop-shadow(0px 0px 5px black);" src="<?php $this->options->themeUrl('/img/arrow_down.svg'); ?>"></img>
            </button>
        </a>
    </div>
</div>
<div id="body-index" class="container">
<div class="container-fluid" style="height: 112px"></div>
<div class="p-3" id="main" role="main">
    <div class="row rounded-4 p-3 border shadow-lg" style="background-color: rgba(<?php $this->options->Color() ?>, 0.5);backdrop-filter: blur(<?php $this->options->blur() ?>px);">
        <div class="col-md-9">
            <?php if ($this->options->tColor == 'black'):?>
                <h1 class="display-3" style="text-shadow: 0px 0px 10px rgba(248,249,250,0.5);">文章</h1>
            <?php endif ?>
            <?php if ($this->options->tColor == 'white'):?>
                <h1 class="display-3 text-white" style="text-shadow: 0px 0px 10px rgba(33,37,41,0.5);">文章</h1>
            <?php endif ?>
            <?php while($this->next()): ?>
            <a href="<?php $this->permalink() ?>">
                <div class="rounded-4 p-3 bg-white shadow">
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
                    <h2 class="display-5 text-dark"><?php $this->title() ?></h2>
                    <p class="text-secondary">
                        <a style="text-decoration: none;" href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
                        <?php $this->date('F j, Y'); ?>
                        <?php $this->category(','); ?>
                    </p>
                    <a class="text-dark" href="<?php $this->permalink() ?>">
                        <?php 
                            if(preg_match('/<!--more-->/',$this->content)||mb_strlen($this->content, 'utf-8') < 200)
                            {
                                $c=mb_substr($this->content, 0, 200, 'utf-8');
                                $c=preg_replace("/<[img|IMG].*?src=[\'\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.png|\.tiff|\.bmp]))[\'|\"].*?[\/]?>/","",$c);
                                if(preg_match('/<pre>/',$c))
                                {
                                   echo $c,'</code></pre>';;
                                }
                                else
                                {
                                   echo $c;
                                }
                            }
                            else
                            {    
                                $c=mb_substr($this->content, 0, 200, 'utf-8');
                                $c=preg_replace("/<[img|IMG].*?src=[\'\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.png|\.tiff|\.bmp]))[\'|\"].*?[\/]?>/","",$c);
                                if(preg_match('/<pre>/',$c))
                                {
                                   echo $c,'</code></pre>','...';;
                                }
                                else
                                {
                                   echo $c.'...';
                                }
                                echo '</br><p class="more"><a href="',$this->permalink(),'" title="',$this->title(),'">阅读全文...</a></p>';
                            }
                        ?>
                    </a>
                </div>
                <br />
            </a>
            <?php endwhile; ?>
            <?php $this->pageNav('&laquo;', '&raquo;', '5'); ?>
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
<div class="container-fluid" style="height:25px"></div>
<?php $this->need('footer.php'); ?>
