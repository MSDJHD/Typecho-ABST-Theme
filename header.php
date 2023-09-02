<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel='stylesheet' href="<?php $this->options->themeUrl('/css/nprogress.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/css/other.css'); ?>">
    <script src="<?php $this->options->themeUrl('/js/bootstrap.js'); ?>"></script>
    <script src="https://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.js"></script>
    <script src="<?php $this->options->themeUrl('/js/nprogress.js'); ?>"></script>
<?php $this->header(); ?>
</head>
<body>

<header id="header">
    <?php if ($this->options->tColor == 'black'):?>
        <nav id="navbar shadow" class="navbar navbar-expand-md navbar-light p-3 fixed-top" style="background-color: rgba(<?php $this->options->Color() ?>, 0.3);backdrop-filter: blur(10px);">
    <?php endif ?>
    
    <?php if ($this->options->tColor == 'white'):?>
        <nav id="navbar" class="navbar navbar-expand-md navbar-dark p-3 fixed-top" style="background-color: rgba(<?php $this->options->Color() ?>, 0.3);backdrop-filter: blur(10px);box-shadow: 0px 0px 10px rgba(33,37,41,0.3);">
    <?php endif ?>

        <div class="container">
            <!-- logo -->
            <a class="navbar-brand" href="<?php $this->options->siteUrl(); ?>">
                <img class="rounded-2 bg-white" decoding="async" src=<?php $this->options->logoUrl() ?> alt="Logo" style="width:40px;">
            </a>
         
            <!-- 展开按钮 -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse row" id="collapsibleNavbar">
            <!-- 导航链接 -->
            <div class="col-md-8">
                <ul class="navbar-nav" id="nav_menu">
                    <li class="nav-item"><a class="nav-link" href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                    <?php $this->widget('Widget_Contents_Page_List')
                   ->parse('<li class="nav-item"><a class="nav-link" href="{permalink}">{title}</a></li>'); ?>
                    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                </ul>
            </div>
            
            <!-- 搜索 -->
            <form class="navbar-collapse float-end col-md-4 btn-group" method="post">
                <input type="text" name="s" class="btn btn-light w-80 shadow" />
                <input type="submit" class="submit btn btn-primary w-20 shadow" value="搜索" />
            </form>
            </div>
        </div>
    </nav>
</header><!-- end #header -->

<div id="pjax" style=
    "background: rgba(<?php $this->options->Color() ?>,0.1) url('<?php $this->options->bgUrl() ?>)');
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center center;"
>