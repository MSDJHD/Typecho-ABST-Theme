<style>
    #cobody img{
        height: 46px;
        width: 46px;
        object-fit: cover;
        display: flex;
        border-radius: 50%;
        box-shadow: 0px 0px 5px black;
    }
</style>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
        <h2 class="display-6"><?php $this->commentsNum(_t('₍˄·͈༝·͈˄*₎◞ ̑̑发条评论吧…'), _t('＼(`Δ’)／只有一条评论'), _t('%d 条评论')); ?></h2>
        <?php function threadedComments($comments, $options) {
            $commentClass = '';
            if ($comments->authorId) {
                if ($comments->authorId == $comments->ownerId) {
                    $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
                } else {
                    $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
                }
            } 
            $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
        ?>
         
        <div class="mx-auto">
            <span id="cobody" itemprop="image"><?php $number=$comments->mail;
                if(preg_match('|^[1-9]\d{4,11}@qq\.com$|i',$number)){
                echo '<img src="https://q2.qlogo.cn/headimg_dl? bs='.$number.'&dst_uin='.$number.'&dst_uin='.$number.'&;dst_uin='.$number.'&spec=100&url_enc=0&referer=bu_interface&term_type=PC" width="46px" height="46px" style="border-radius: 50%;float: left;margin-top: 0px;margin-right: 10px;margin-bottom:-2px">'; 
                }else{
                echo '<img src="https://uploadbeta.com/api/pictures/random/?key=BingEverydayWallpaperPicture" width="46px" height="46px" style="border-radius: 50%;float: left;margin-top: 0px;margin-right: 10px;margin-bottom:-2px">';
                }
                ?>
            </span>
            <h3 class="text-dark"><?php $comments->author(); ?></h3>
            <p class="text-secondary">评论时间：<?php $comments->date('Y-m-d H:i'); ?></p>
            <div class="card p-3">
            <?php $comments->content(); ?>
            </div>
            <p><?php $comments->reply(); ?></p>
        </div>

        <?php if ($comments->children) { ?>
              <?php $comments->threadedComments($options); ?>
            <?php } ?>        
        <?php } ?>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo;', '&raquo;', '5'); ?>

    <?php endif; ?>

    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>

            <h2 id="response" class="display-6"><?php _e('发条评论吧…'); ?></h2>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <?php if ($this->user->hasLogin()): ?>
                    <p><?php _e('你是: '); ?><a class="text-secondary"
                            href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>&nbsp<a
                            href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                <?php else: ?>
                    <p>
                        <label for="author" class="required"><?php _e('你是谁?'); ?></label>
                        <input type="text" name="author" id="author" class="text form-control"
                               value="<?php $this->remember('author'); ?>" required/>
                    </p>
                    <p>
                        <label
                            for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email(建议QQ)'); ?></label>
                        <input type="email" name="mail" id="mail" class="text form-control"
                               value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </p>
                    <p>
                        <label
                            for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站(没有可不填)'); ?></label>
                        <input type="url" name="url" id="url" class="text form-control" placeholder="<?php _e('http://'); ?>"
                               value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                    </p>
                <?php endif; ?>
                <p>
                    <label for="textarea" class="required"><?php _e('评论'); ?></label>
                    <textarea rows="8" cols="50" name="text" id="textarea" class="textarea form-control"
                              required><?php $this->remember('text'); ?></textarea>
                </p>
                <p>
                    <button type="submit" class="submit btn btn-dark"><?php _e('发送评论'); ?></button>
                </p>
            </form>
        </div>
    <?php else: ?>
        <h3 class="display-6"><?php _e('_(:з」∠)_评论被关闭了'); ?></h3>
    <?php endif; ?>
</div>
