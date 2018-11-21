            </div>
	</div>
	
</div>
        </div><!-- close .*-inner (main-content) -->
    </div><!-- close .container -->
</div><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
       <div id="footer-info">
        <div class="container">
            <div class="site-info">
				Copyright &copy;gvlads 2018 All rights reserved.
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php print HTTP_JS_PATH; ?>jquery.min.js"></script>
    <script src="<?php echo HTTP_JS_PATH; ?>jquery-ui.js"></script>
    <script type="text/javascript" src="<?php print HTTP_JS_PATH; ?>bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php print HTTP_JS_PATH; ?>common.js"></script>
    <script type="text/javascript" src="<?php print HTTP_JS_PATH; ?>toastr.min.js"></script>
    <script type="text/javascript" src="/application/js/main.js"></script>

    <?php
    if (isset($this->outputData['js']) and is_array($this->outputData['js'])) {
        foreach ($this->outputData['js'] as $js) {
            echo '<script src="' . base_url($js) . '"></script>' . "\n";
        }
    }
    ?>

    <script>
        var site_url = "<?php echo site_url(); ?>";
        m.init();
        <?php echo $this->outputData['js_init']; ?>
    </script>

</footer><!-- close #colophon -->
</body>
</html>
