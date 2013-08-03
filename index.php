<?php get_header(); ?>

<div class="topModule clearfix">

  <div class="container slider">

    <div class="flexslider">
      <ul class="slides">

        <?php if ( function_exists( 'ot_get_option' ) ) {

          /* get the slider array */
          $slides = ot_get_option( 'my_slider', array() );

          if ( ! empty( $slides ) ) {
            foreach( $slides as $slide ) {

              echo '<li><img src="'.$slide['image'].'" alt="'.$slide['title'].'" /><div class="slideContent slideLeft">';

              if($slide['title']) {
                echo '<h1>'.$slide['title'].'</h1>';
              }
              if($slide['title2']) {

               echo ' <h2>'.$slide['title2'].'</h2> ';
             }

             if($slide['btnurl']) { 

               echo ' <a class="button-big rounded3 '.$slide['btncolor'].'" href="'.$slide['btnurl'].'">'.$slide['btntext'].'</a>';

             }

             echo ' </div></li>';

           }

         } 

       }

       ?>
     </ul>
   </div>

 </div>

 <div class="container tagline">

  <h1><?php echo ot_get_option('tagline') ?></h1>
  <h2><?php echo ot_get_option('taglinedescription') ?></h2>

</div>
<div class="container topModuleDetails clearfix">

  <div class="eight columns topModuleAbout">

    <?php echo ot_get_option('leftcontent') ?>

  </div>

  <div class="eight columns topModuleTestimonial">

    <?php echo ot_get_option('rightcontent') ?>             

  </div>

</div>

</div>


<?php if (ot_get_option('wmodulehome') == 'yes') {  ?>

<?php if (ot_get_option('wmoduletop') == 'yes') {  ?>

<div class="infoModule clearfix">

  <div class="container">


    <?php if (ot_get_option('wmoduleevent') == 'yes') { ?>


    <?php
    global $paged;


    $arguments = array(
      'post_type' => 'events',
      'post_status' => 'publish',
      'paged' => $paged,
      'showposts' => 1
      );

    $events_query = new WP_Query($arguments);

    dd_set_query($events_query);

    ?>

    <?php if ($events_query->have_posts()) : while ($events_query->have_posts()) : $events_query->the_post(); ?>

    <div class="eight columns nextEvent clearfix">

     <?php 

     $thumbimg = get_post_meta(get_the_ID(), 'thumbimg', true);
     $facebookurl = get_post_meta(get_the_ID(), 'facebookurl', true);


     ?>

     <?php if( $thumbimg ) { ?>


     <div class="nextEventThumb">

      <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo $thumbimg; ?>" /></a>

    </div>

    <?php } ?>

    <div class="nextEventInfo">

      <h3>NEXT EVENT :</h3>
      <h4><?php the_title(); ?></h4>


      <a class="button-small rounded3 brown" href="<?php the_permalink(); ?>"><?php _e('CONTINUE READING', 'localization'); ?></a>

      <?php if( $facebookurl ) { ?>

      <span class="or">OR</span>
      <a class="button-small facebookBtn rounded3 blue" target="blank" href="<?php echo $facebookurl; ?>">SEE FACEBOOK PAGE</a>

      <?php } ?>

    </div>

  </div>

<?php endwhile; ?>

<?php endif; ?>

<div class="eight columns churchInfo">

  <?php } else { ?>   <div class="sixteen columns churchInfo"> <?php } ?>

  <?php echo ot_get_option('wmoduleright') ?>

</div>

</div>

</div>

<?php } ?>

<div class="postsModule clearfix">

  <div class="container postsModuleLists">

    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Widgetized Module")) ; ?>

  </div>     

</div>

<?php } ?>

<?php get_footer(); ?>