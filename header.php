<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
      

        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        <meta name="format-detection" content="telephone=no" />
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
          <?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	
        <!-- CSS
  ================================================== -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/base.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/skeleton.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/btn.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/flexslider.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/superfish.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/prettyPhoto.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/jPlayer/css/style.css">
        
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
            
       
        <!-- Google Fonts -->
            
        <link href='http://fonts.googleapis.com/css?family=Copse|Courgette|Oswald:400,300,700|Droid+Serif:400,700,400italic,700italic|Droid+Sans:400,700|Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        
        
        <!-- Atoms & Pingback
        ================================================== -->

        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
        <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!-- Theme Hook -->
    
        <?php wp_head(); ?>


   <!--[if IE 8]>
<style type="text/css">
   
   .button-big, .button-small, .portfolio_cats a, .pagination a, .pagination .current, .portfolio_previous a, .portfolio_next a  { color: #fff !important; }
   .main ul li a .description { font-size: 12px; }
   
</style>
<![endif]-->
   
    <!--[if IE 7]>
<style type="text/css">
   
	 .button-big, .button-small, .portfolio_cats a, .pagination a, .pagination .current, .portfolio_previous a, .portfolio_next a  { color: #fff !important; }
   .main ul li a .description { font-size: 12px; }
    
   }
   
</style>
<![endif]-->
    
     <!--[if IE 6]>
<style type="text/css">
   
	 .button-big, .button-small, .portfolio_cats a, .pagination a, .pagination .current, .portfolio_previous a, .portfolio_next a  { color: #fff !important; }
   .main ul li a .description { font-size: 12px; }
   }
   
</style>
<![endif]-->
    
     <?php $headerbg = explode(",", get_option_tree('headerbg')); ?>
     <?php $footerbg = explode(",", get_option_tree('footerbg')); ?>
     <?php $bodybg = explode(",", get_option_tree('bodybg')); ?>
 
    
     <style>
         
        .pageContent a {
             color: <?php echo ot_get_option('linkscolor') ?>;    
         }
         .pageContent a:hover {
             color: <?php echo ot_get_option('linkshovercolor') ?>;    
         }
         
     </style>
       <?php if (ot_get_option('headercustombg') == 'yes') {  ?>

     <style>
         
         header {
background: url(<?php echo $headerbg[4] ?>) <?php echo $headerbg[1] ?> <?php echo $headerbg[2] ?> <?php echo $headerbg[3] ?> <?php echo $headerbg[0] ?>;
}
    

     </style>
     
         <?php } ?>
     
       <?php if (ot_get_option('bodycustombg') == 'yes') {  ?>

     <style>
         
         body {
background: url(<?php echo $bodybg[4] ?>) <?php echo $bodybg[1] ?> <?php echo $bodybg[2] ?> <?php echo $bodybg[3] ?> <?php echo $bodybg[0] ?>;
}
    

     </style>
     
         <?php } ?>
     
     <?php if (ot_get_option('footercustomgb') == 'yes') {  ?>
     
     <style>
         
           footer {
background: url(<?php echo $footerbg[4] ?>) <?php echo $footerbg[1] ?> <?php echo $footerbg[2] ?> <?php echo $footerbg[3] ?> <?php echo $footerbg[0] ?>;
}
         
     </style>
     
         <?php } ?>
     
</head>

    <body data-spy="scroll" data-target=".subnav" data-offset="50" <?php body_class(); ?>>

    <header> 
            
        <div class="navBg"></div>
        
        <div class="container">
            
            <div class="logo">
                <a href="<?php echo home_url(); ?>">
                    <h2><?php echo bloginfo('name'); ?></h2>
                    <!-- <img src="<?php echo ot_get_option('logo') ?>" /> -->
                </a>
            </div>

            
             <nav class="mainNav">

                    <?php
                    wp_nav_menu(array(
                        'container' => false,
                        'menu_class' => 'nav sf-menu sf-js-enabled sf-shadow',
                        'theme_location' => 'main_menu',
                        'echo' => true,
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'fallback_cb' => 'display_home2',
                        'link_after' => '',
                        'depth' => 0,
                        'walker' => new description_walker())
                    );
                    ?>
                 
                 <div class="container mobileNav">
                
                <div class="sixteen columns"></div>
                
            </div>

                </nav>
            
        </div>
    
    </header>        