<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($cfg) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', null, null, _t('站点 Logo 地址'), _t('Logo 会显示在标签页的标题前面。'));
    $cfg->addInput($logoUrl);  //  注册
    
    $DisPicUrl = new Typecho_Widget_Helper_Form_Element_Text('DisPicUrl', null, null, _t('默认缩略图地址'), _t('文章的默认缩略图。可使用https://picdl.sunbangyan.cn/2023/08/25/p70dyz.jpg'));
    $cfg->addInput($DisPicUrl);  //  注册
    
    $bgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgUrl', null, null, _t('背景图片链接'), _t('各个页面的背景图片'));
    $cfg->addInput($bgUrl);  //  注册
    
    $Color = new Typecho_Widget_Helper_Form_Element_Text('Color', null, null, _t('主题色rgb值'), _t('如33, 37, 41。数值间需要使用半角逗号隔开。'));
    $cfg->addInput($Color);  //  注册

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
        array(
            'ShowRecentPosts' => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory' => _t('显示分类'),
            'ShowArchive' => _t('显示归档'),
            'ShowOther' => _t('显示其它杂项'),
        ),
        array(
            'ShowRecentPosts',
            'ShowRecentComments',
            'ShowCategory'
        ), _t('侧边栏显示')
    );
    $cfg->addInput($sidebarBlock->multiMode());  //  注册
}

/* 自定义首页文章分布数量 */
function themeInit($archive) {
if ($archive->is('index')) {
$archive->parameter->pageSize = 10;
}
}