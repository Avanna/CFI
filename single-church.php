<?php get_header(); ?>

    <?php 
        $bannerimg = get_post_meta(get_the_ID(), 'bannerimg', true);
        $sidebar = get_post_meta(get_the_ID(), 'sidebar', true);
        $wmodulepage = get_post_meta(get_the_ID(), 'wmodulepage', true);
    ?>
       
    <div class="topModule clearfix">
        
            <?php if( $bannerimg) : ?>
                                             
                <div class="container headerImg">            
                    <img alt="" src="<?php echo $bannerimg; ?>" />              
                </div>

            <?php endif ?>
                        
            <div class="container pageTitle">
            
                <div class="ten columns">
                    <div class="postListTitle">    
                        <h1><a href="#"><?php the_title(); ?></a></h1>
                    </div>        
                </div>
                
                <div class="six columns">                   
                    <?php get_search_form(); ?>                                    
                </div>
            
            </div>

            <div class="container pageContent clearfix"> 

                <?php
                    if (have_posts()) : 
                    while (have_posts()) : the_post();
                ?>

                <?php 
                    $street_add = get_post_meta($post->ID, 'street_add', true);
                    $city = get_post_meta($post->ID, 'city', true);
                    $phone = get_post_meta($post->ID, 'phone', true);
                    $state = get_post_meta($post->ID, 'state', true);
                    $zipcode = get_post_meta($post->ID, 'zipcode', true);
                    $pastor = get_post_meta( $post->ID, 'pastor', true);
                ?>   

                <div id="church-content">
                    <h3><?php the_title(); ?></h3>

                    <p><strong>About The Church</strong></p>
                    <?php the_content(); ?>
                    <?php // comments_template(); ?>
                </div><!-- church-content -->

                <div id="church-meta">

                    <h3>address</h3>

                    <address id="church-address">
                        <?php if($street_add) : ?>
                            <p><?php echo $street_add; ?></p>
                        <?php endif; ?>
                        <?php if($city) : ?>
                            <p><?php echo $city; ?></p>
                        <?php endif; ?>
                        <?php if($state) : ?>
                            <p><?php echo $state; ?></p>
                        <?php endif; ?>
                        <?php if($zipcode) : ?>
                            <p><?php echo $zipcode; ?></p>
                        <?php endif; ?>
                    </address>
                    
                    <h3>contact info</h3>

                    <?php if($zipcode) : ?>
                        <p><?php echo $phone; ?></p>
                    <?php endif; ?>
                    
                    <?php if($pastor) : ?>
                        <h3>Pastor: <?php echo $pastor; ?></h3>

                        <?php if(has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                        
                </div><!-- church-meta -->                      
                
                <?php endwhile; endif; ?>
            </div><!-- container -->   

        </div><!-- top-module -->
             
<?php get_footer(); ?>
