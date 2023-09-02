<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($cfg) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', null, null, _t('站点 Logo 地址'), _t('Logo 会显示在标签页的标题前面'));
    $cfg->addInput($logoUrl);
    
    $bgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgUrl', null, null, _t('背景图片链接'), _t('各个页面的背景图片'));
    $cfg->addInput($bgUrl);
    
    $BannerPicUrl = new Typecho_Widget_Helper_Form_Element_Text('BannerPicUrl', null, null, _t('banner图片链接'), _t('首页头图'));
    $cfg->addInput($BannerPicUrl);
    
    $Color = new Typecho_Widget_Helper_Form_Element_Text('Color', null, null, _t('主题色rgb值'), _t('如33, 37, 41。数值间需要使用半角逗号隔开'));
    $cfg->addInput($Color);
    
    $tColor = new Typecho_Widget_Helper_Form_Element_Radio('tColor', array(
        'white' => '白色',
        'black' => '黑色'
    ), 'black', _t('导航栏/大标题文字颜色'));
    $cfg->addInput($tColor);
    
    $blur = new Typecho_Widget_Helper_Form_Element_Text('blur', null, null, _t('卡片模糊程度'), _t('请填写阿拉伯数字，0则不模糊，建议5'));
    $cfg->addInput($blur);  //  注册

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
$archive->parameter->pageSize = 6;
}
}

function showThumbnail($widget)
{ 
    // 当文章无图片时的默认缩略图
    $rand = rand(1,7); // 随机 1-7 张缩略图

    $random = $widget->widget('Widget_Options')->themeUrl . '/img/sj/' . $rand . '.webp'; // 随机缩略图路径
    //正则匹配 主题目录下的/img/sj/的图片（以数字按顺序命名）

    $cai = '';
        $attach = $widget->attachments(1)->attachment;
        $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
        $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
        $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';
    
    if ($attach && $attach->isImage) {
    
    $ctu = $attach->url.$cai;
        } 
    //调用第一个图片附件
    else 
    
    //下面是调用文章第一个图片
    if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
    $ctu = $thumbUrl[1][0].$cai;
        }
    
    //如果是内联式markdown格式的图片
    else   if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
    $ctu = $thumbUrl[1][0].$cai;
        }
    //如果是脚注式markdown格式的图片
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
    $ctu = $thumbUrl[1][0].$cai;
        }
    //以上都不符合，即随机输出图片
    else {
        $ctu = $random;
    }
    return $ctu;
}