<!-- Site template footer -->

                    </div><!--.site-content-->
                </div><!--.page-container-->
            </main>

            <footer id="site-footer" class="site-footer page-footer">

                <div class="section footer1">
                    <div class="container wide">
                        <?php dynamic_sidebar('footer1'); ?>
                    </div>
                </div>

                <div class="section footer2">
                    <div class="container wide clearfix">
                        <?php dynamic_sidebar('footer2'); ?>
                    </div>
                </div>

            </footer>

            <!--WordPress footer-->
            <?php wp_footer(); ?>
            <!--End WordPress footer-->

        </div><!-- #page -->

        <!--Custom javascript in theme footer.php file -->
        <script>
            jQuery(document).bind('keyup', function(e){
                if(e.which==68) {
                    // "d"
                    jQuery('#debug').toggle();
                }
            });                
        </script>

    </body>

</html>