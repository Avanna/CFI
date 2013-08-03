jQuery(document).ready(function() {

jQuery(".gallery-icon a").prettyPhoto({animationSpeed:'normal',theme:'light_square', show_title : false}); jQuery("a[rel^='prettyPhoto'], .gallery-icon a").prettyPhoto({animationSpeed:'normal',theme:'light_square', show_title : false});

 jQuery("#videoWrapper").fitVids();
jQuery('#s').attr('placeholder', 'Enter Keywords ...');
  
  jQuery('.player-container').hide();
  jQuery('.showMp3').on('click', function(e) {
     
     jQuery('.player-container').slideToggle();     
      
      e.preventDefault();
      
  });
  
function prettyPhoto() {
    
    jQuery("area[rel^='prettyPhoto']").prettyPhoto();
				
				jQuery(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				jQuery(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				jQuery("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){initialize();}
				});

				jQuery("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){_bsap.exec();}
				});
    
}

 function subNav() { 

    jQuery(".subNavContent li").hide();
    jQuery(".subNavContent li:first").fadeIn();
    jQuery(".subNavItems li:first a").css('opacity', 1);
    jQuery(".subNavItems li a").on('click', function(e) {
       
       var itemClass = jQuery(this).attr('class');
       
        jQuery(".subNavItems li a").css('opacity', 0.35);
        jQuery(this).css('opacity', 1);
        
         jQuery(".subNavContent li").hide();
         
         jQuery('.subNavContent .' + itemClass + '').fadeIn();
                 
                         
        e.preventDefault();
        
        
    });

}

 function mobileMenu() {
            
        // Create the dropdown base
        jQuery("<select />").appendTo("nav .container .sixteen");
        jQuery("nav select").hide();
        
        // Create default option "Go to..."
        jQuery("<option />", {
            "selected": "selected",
            "value"   : "",
            "text"    : "Go to..."
        }).appendTo("nav select");

        // Populate dropdown with menu items
        jQuery("nav a").each(function() {
            var el = jQuery(this);
            jQuery("<option />", {
                "value"   : el.attr("href"),
                "text"    : el.text()
            }).appendTo("nav select");
        });

        jQuery("nav select").change(function() {
            window.location = jQuery(this).find("option:selected").val();
        });
            
        }
        
          
        function select() {
            
        
              // FOR EACH SELECT
    jQuery('nav select').each(function() {
        
        // LET'S PUT OUR MARKUP BEFORE IT
        jQuery(this).before('<div class="select-wrapper">');
        
        // LETS PUR OUR MARKUP AFTER IT
        jQuery(this).after('<span class="select-container"></span></div>');
        
        // UPDATES THE INITIAL SELECTED VALUE
        var initialVal = jQuery(this).children('option:selected').text();
        jQuery(this).siblings('span.select-container').text(initialVal);
        
        // HIDES SELECT BUT LET THE USER STILL CLICK IT
        jQuery(this).css({opacity: 0});  
        
        // WHEN USER CHANGES THE SELECT, WE UPDATE THE SPAN BOX
        jQuery(this).change(function() {
            
            // GETS NEW SELECTED VALUE
            var newSelVal = jQuery(this).children('option:selected').text();
            
            // UPDATES BOX
            jQuery(this).siblings('span.select-container').text(newSelVal);
            
        });
        
    }); 
            
        }
        
   
    jQuery(window).load(function() {
            
         
  
            jQuery(".wsubnav").fadeIn();
  jQuery(".slider").slideDown();
   jQuery('ul.sf-menu').superfish(); 
  
         mobileMenu();
        select();
        subNav();
        prettyPhoto();
    
        
    });
    
    
    jQuery(window).resize(function() {
       
   
      
    });

});
