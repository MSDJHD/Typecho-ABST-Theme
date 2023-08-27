<?php $this->need('header.php'); ?>
<div class="container-fluid" style="height:112px"></div>
<div class="container p-3">
<h1 class="display-3"><?php $this->title() ?></h1>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 归档页面
 *
 * @package custom
 */
    $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
    $year=0; $mon=0; $i=0; $j=0;   
    $output = '<div class="rounded-4 p-3 bg-light border" id="archives">';   
    while($archives->next()):   
        $year_tmp = date('Y',$archives->created);   
        $mon_tmp = date('m',$archives->created);   
        $y=$year; $m=$mon;   
        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
        if ($year != $year_tmp && $year > 0) $output .= '</ul>';   
        if ($year != $year_tmp) {   
            $year = $year_tmp;   
            $output .= '<h3 class="display-4">'. $year .' 年</h3><ul class="al_mon_list"><hr />'; //输出年份   
        }   
        if ($mon != $mon_tmp) {   
            $mon = $mon_tmp;   
            $output .= '<p><span class="display-5">'. $mon .' 月</span></p>'; //输出月份   
        }   
        $output .= '<p>'.date('d日: ',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a> <em>('. $archives->commentsNum.')</em></p>'; //输出文章日期和标题   
    endwhile;   
    $output .= '</li></ul></div>';
    echo $output;
?>
</div>
<br />
<?php $this->need('footer.php'); ?>
