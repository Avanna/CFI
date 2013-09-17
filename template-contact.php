<?php 
/*
  Template Name: Contact
*/

?>

<?php get_header(); ?>

<?php 
    $bannerimg = get_post_meta(get_the_ID(), 'bannerimg', true);
    $wmodulepage = get_post_meta(get_the_ID(), 'wmodulepage', true);
    $pagedescription = get_post_meta(get_the_ID(), 'pagedescription', true);
?>


    <div class="topModule clearfix">
        <?php get_template_part( 'content', 'page-top' ); ?>
    
        <?php if( $bannerimg) { ?>

            <div class="container headerImg">
            
                <img alt="" src="<?php echo $bannerimg; ?>" />

                <div id="header-info">
                    <h2 id="header-heading"><?php the_title(); ?></h2> 

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, ducimus, explicabo molestias minima sed non corporis inventore fugiat. Nulla, culpa, quasi corrupti aspernatur cumque architecto sint sit officiis voluptatem maxime?
                    </p>  
                </div>
         
            </div>

        <?php } ?>
                                             
        <div class="container headerImg">

            <div id="contact">
                <h2><?php the_title(); ?></h2>
                <?php while(have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div><!-- contact -->
                             
        </div>        
    </div>                   

<?php get_footer(); ?>