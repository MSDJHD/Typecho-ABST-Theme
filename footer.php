<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<script>
//获取网站当前域名
function getBaseUrl() {
  var ishttps = 'https:' == document.location.protocol ? true : false;
  var url = window.location.host;
  if (ishttps) {
    url = 'https://' + url;
  } else {
    url = 'http://' + url;
  }
  return url;
}
let url = '"'+getBaseUrl()+'"';
$(document).pjax('a[href^='+ url +']:not(a[target="_blank"], a[no-pjax])', {
  container: '#pjax',//DIV容器的ID
  fragment: '#pjax',//作为整个pjax框架，必须写上
  timeout: 8000 //超时就会被迫页面就会完全刷新，单位毫秒
})
$(document).on('pjax:start', function() { NProgress.start(); });
$(document).on('pjax:end', function() { NProgress.done(); });
</script>
</div>
</div>
</div><!-- end #body -->

<footer class="p-3 bg-dark text-center text-secondary" id="footer" role="contentinfo" style="height:200px;display: flex;justify-content: center;align-items: center;">
    &copy; <?php echo date('Y'); ?>&nbsp<a class="text-secondary" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>,
    <?php _e('<a class="text-secondary" href="https://typecho.org">Typecho</a>'); ?>.
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
