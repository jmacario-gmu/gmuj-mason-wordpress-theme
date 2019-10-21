<?php
/**
 * The theme footer.
 *
 * @package bootstrap-basic4
 */
?>
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

            </footer><!--.page-footer-->


            <!--wordpress footer-->
            <?php wp_footer(); ?>
            <!--end wordpress footer-->

        </div><!-- #page -->
        <script>
        jQuery( document ).ready(function() {


          var timeref = setInterval(function(){
          jQuery(".caret-down").click(function () {
          //alert("asdas");
        });
        });
        }, 1000);

        jQuery(function ($) {
            $.ajaxSetup({ cache: false });
            var $ed = $('.so-widget-sow-editor');
            if($ed.length) {
                $ed.each(function(){
                    var $wt = $(this).find('h3.widget-title');
                    var $ct = $(this).find('.textwidget h2');
                    if($wt.length && $ct.length){
                        $wt.hide();
                        if($wt.html().length < 3){
                            $ct.html($wt.html()+' '+$ct.html());
                            $wt.remove();
                        } else {
                            $wt.show();
                        }
                    }
                });
            }

        });

        </script>

        <!--Custom javascript in theme footer.php file -->
        <script>
            jQuery(document).bind('keyup', function(e){
                if(e.which==68) {
                    // "d"
                    //jQuery('div#debug').css('display','block');
                    jQuery('div#debug').toggle();
                }
            });                
        </script>

    </body>

</html>
