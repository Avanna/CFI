    <footer>
        
        <div class="container">
        
            <?php echo ot_get_option('footercontent') ?>
        
            </div>
        
    </footer>
    
    <div class="smallFooter">
        
        <div class="container">
            
            <div class="eight columns smallFooterLeft"><?php echo ot_get_option('smallfooterleftcontent') ?></div>
            
            <div class="eight columns smallFooterRight"><?php echo ot_get_option('smallfooterrightcontent') ?></div>
            
        </div>
        
    </div>

   
      <script type="text/javascript">
 
    jQuery(window).load(function(){
      jQuery('.flexslider').flexslider({
        animation: "fade",
        controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
directionNav: true, 
slideshow: false,
        start: function(slider){
          jQuery('body').removeClass('loading');
        }
      });
    });
  </script>

      <?php wp_footer(); ?> 
      
  </body>
  
</html>

