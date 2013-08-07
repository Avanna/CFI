<?php /*
  Template Name: Member Churches
 */ ?>

<?php get_header(); ?>

   <?php 


$bannerimg = get_post_meta(get_the_ID(), 'bannerimg', true);
$wmodulepage = get_post_meta(get_the_ID(), 'wmodulepage', true);
$pagedescription = get_post_meta(get_the_ID(), 'pagedescription', true);

?>


    <div class="topModule clearfix">

        
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
                        
       
     
             <!--  <div class="container pageTitle">
            
                <div class="ten columns">
                    
                    <h1><?php the_title(); ?></h1>
                    
                                   <?php if( $pagedescription) { ?>
                        
                        <h2><?php echo $pagedescription; ?></h2>
                        
                                    <?php } else { ?>
                        
                        <style>
                            
                            .tagline h1, .pageTitle h1 {
                                margin-top: 18px;
                            }
                            
                        </style>
                        
                        <?php } ?>
                    
                    
                </div>
                
                <div class="six columns">
                    
                    <?php get_search_form(); ?>
                    
                                        
                </div>
            
        </div> -->
             <div class="container pageContent clearfix">
            
                 <ul class="churches clearfix">
 
                    <?php
                        global $paged;

                        $args = array(
                            'post_type' => 'church',
                            'post_status' => 'publish',
                            'paged' => $paged
                        );

                        $churches = new WP_Query($args);
                    ?>
                                
                    <?php if ($churches->have_posts()) : while ($churches->have_posts()) : $churches->the_post(); ?>
  
                    <li class="church">

                        <?php 
                            $thumbimg = get_post_meta(get_the_ID(), 'thumbimg', true);
                            $city = get_post_meta(get_the_ID(), 'city', true);
                            $state = get_post_meta(get_the_ID(), 'state', true);

                            $location = $city.', '.$state;
                        ?>

                        <?php if( $thumbimg) : ?>
                        
                            <div class="postListThumb">  
                                <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo $thumbimg; ?>" /></a>
                            </div>
                            
                        <?php endif; ?>
                        
                    
                        <div class="postListDetails">                           

                             <div class="postListMeta">
                            

                                 
                             <div class="postListTitle">                                
                                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <p class="orange-text"><?php echo $location; ?></p>   
                             </div>
                            
                             </div>
                             
                             <div class="postListExcerpt">
                                 
                                <?php the_excerpt(); ?>
                                 <a class="button-small rounded3 brown" href="<?php the_permalink(); ?>">
                                    <?php _e('CONTINUE READING', 'localization'); ?>
                                </a>
                                 
                             </div>
                             
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