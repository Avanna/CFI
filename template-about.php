<?php 
/*
  Template Name: about
 */ 
?>

<?php get_header(); ?>

<?php 
    $bannerimg = get_post_meta(get_the_ID(), 'bannerimg', true);
    $pagedescription = get_post_meta(get_the_ID(), 'pagedescription', true);
    $sidebar = get_post_meta(get_the_ID(), 'sidebar', true);
    $wmodulepage = get_post_meta(get_the_ID(), 'wmodulepage', true);
?>

<div class="topModule clearfix">

    <?php get_template_part( 'content', 'page-top' ); ?>

    <div class="container headerImg">
        <img alt="" src="<?php echo $bannerimg; ?>" />

        <div id="header-info">
            <h2 id="header-heading"><?php the_title(); ?></h2> 
            <p>
                CFI seeks to bring churches, fellowships, organizations and individuals  together for worship, fellowship, support, education, training, accountability, sharing of ideas and resources for ministry and evangelism of the gospel of Jesus Christ.
            </p>  
        </div>
    </div><!-- container headerImg -->

    <div class="container pageContent padding-5 clearfix">
       <div class="mainContent columns wsidebar">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
        </div>
    </div><!-- container -->
<?php get_footer(); ?>
