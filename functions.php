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

}

