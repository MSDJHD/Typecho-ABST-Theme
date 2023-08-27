<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 LOGO 地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );

    $form->addInput($logoUrl);

    $DisPicUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'DisPicUrl',
        null,
        null,
        _t('缩略图 地址'),
        _t('在这里填入一个图片 URL 地址, 用于展示文章缩略图，可使用https://picdl.sunbangyan.cn/2023/08/25/p70dyz.jpg')
    );

    $form->addInput($DisPicUrl);

    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory'       => _t('显示分类'),
            'ShowArchive'        => _t('显示归档'),
            'ShowOther'          => _t('显示其它杂项')
        ],
        ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());
}

/* 自定义首页文章分布数量 */
function themeInit($archive) {
if ($archive->is('index')) {
$archive->parameter->pageSize = 10;
}
}