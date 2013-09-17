<?php 
/*
  Template Name: Staff Members
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
            
                 <ul id="staff" class="clearfix">
 
                    <?php
                        global $paged;

                        $args = array(
                            'post_type' => 'post',
                            'category_name' => 'staff',
                            'paged' => $paged,
                            'order' => 'ASC'
                        );

                        $staff = new WP_Query($args);
                    ?>
                                
                    <?php if ($staff->have_posts()) : while ($staff->have_posts()) : $staff->the_post(); ?>
  
                    <li class="staff-member clearfix">

                        <?php 
                            $position = get_post_meta(get_the_ID(), 'staff_member_position', true);
                        ?>                    
                    
                        <div class="postListDetails">                           

                             <div class="postListMeta">

                            <?php if(has_post_thumbnail()) : ?>
                            
                                <div class="rounded-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </div>

                            <?php endif; ?>
                                
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p class="orange-text"><?php echo $position; ?></p>  
                            
                             </div>
                             
                             <!-- <div class="postListExcerpt">
                                 
                                <?php the_excerpt(); ?>
                                 <a class="button-small rounded3 brown" href="<?php the_permalink(); ?>">
                                    <?php _e('CONTINUE READING', 'localization'); ?>
                                </a>
                                 
                             </div> -->
                             
                         </div>
                    </li>

                    <?php endwhile; endif; ?>       
                 </ul>

                <?php
                    kriesi_pagination();
                    dd_restore_query();
                ?>                                 
        </div>        
    </div>                   

<?php get_footer(); ?>