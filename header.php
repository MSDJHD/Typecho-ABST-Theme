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

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/css/normalize.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/css/grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <script src="<?php $this->options->themeUrl('/js/bootstrap.js'); ?>"></script>

    <!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header(); ?>
</head>
<body>

<header id="header">
    <nav class="navbar navbar-expand-md bg-warning navbar-dark p-3">
        <!-- 标题 -->
        <a class="navbar-brand" href="<?php $this->options->siteUrl(); ?>">
            <img class="rounded" decoding="async" src=<?php $this->options->logoUrl() ?> alt="Logo" style="width:40px;">
        </a>
     
        <!-- 展开按钮 -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" data-bs-target="#search">
            <span class="navbar-toggler-icon"></span>
        </button>
     
        <!-- 导航链接 -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav" id="nav_menu">
                <li class="nav-item"><a class="nav-link" href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                <?php $this->widget('Widget_Contents_Page_List')
               ->parse('<li class="nav-item"><a class="nav-link" href="{permalink}">{title}</a></li>'); ?>
            </ul>
        </div>
        
        <!-- 搜索 -->
        <form class="collapse navbar-collapse d-flex" method="post" action="" id="search">
            <input type="text" name="s" class="text form-control me-2" />
            <input type="submit" class="submit btn btn-primary" value="搜索" />
        </form>
    </nav>
</header><!-- end #header -->
<div id="body">
    <div class="container">
        <div class="row">