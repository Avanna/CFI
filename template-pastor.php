<?php 

/*
  Template Name: The Pastor
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
                        
         <div class="container pageContent clearfix">

            <div id="pastor-profile" class="clearfix">

            <?php
                global $paged;

                $args = array(
                    'post_type' => 'post',
                    'category_name' => 'pastor-profile',
                    'paged' => $paged
                );

                $pastor = new WP_Query($args);
            ?>
                        
            <?php if ($pastor->have_posts()) : while ($pastor->have_posts()) : $pastor->the_post(); ?>

                    <?php 
                        $position = get_post_meta(get_the_ID(), 'staff_member_position', true);
                    ?>  

                    <div class="profile-top">
                        <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/pastor-top.png" alt=""> -->
                    </div><!-- profile-top -->  

                    <div class="profile-info">
                        <?php the_content(); ?>
                    </div>           

                    <!-- <div id="profile-left">

                        <?php if(has_post_thumbnail()) : ?>
                            <div class="profile-thumb">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </div>
                        <?php endif; ?>

                        <h2><?php the_title(); ?></h2>
                        
                        <?php if($position) : ?>
                            <h3><?php echo $position; ?></h3>
                        <?php endif; ?>
                        
                    </div> --><!-- profile-left -->

                    <!-- <div id="profile-right">

                        
                        
                    </div> --><!-- profile-right -->

            <?php endwhile; endif; ?>
            
            </div><!-- pastor-profile -->

                <?php
                    kriesi_pagination();
                    dd_restore_query();
                ?>                                 
        </div>        
    </div>                   

<?php get_footer(); ?>