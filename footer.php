<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer class="p-3 bg-dark text-center text-secondary" id="footer" role="contentinfo" style="height:200px;line-height:200px">
    &copy; <?php echo date('Y'); ?> <a class="text-secondary" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('<a class="text-secondary" href="https://typecho.org">Typecho</a>'); ?>.
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
