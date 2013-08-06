<?php get_header(); ?>

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
   </div><!-- flex-slider -->

 </div><!-- container slider -->

 <div class="tagline">

      <h1><?php echo ot_get_option('tagline') ?></h1>
      <h2><?php echo ot_get_option('taglinedescription') ?></h2>

  </div>

 <!--  <div class="container topModuleDetails clearfix">

      <div class="eight columns topModuleAbout">

          <?php echo ot_get_option('leftcontent') ?>

      </div>

      <div class="eight columns topModuleTestimonial">

         <?php echo ot_get_option('rightcontent') ?>             

      </div>

  </div> -->

<div id="front-content-wrapper" class="clearfix">
    <div id="front-sidebar">
      <div id="front-sermons">
        <h2><a href="<?php echo home_url( '/sermons' ); ?>">listen to sermons</a></h2>
      </div><!-- front-sermons -->

      <div id="pastor">
          <div class="rounded-thumbnail">
            <img src="<?php echo get_template_directory_uri(); ?>/images/pastor.jpg" alt="our pastor">
          </div>
          <h2>our pastor</h2>
          <h3>Pastor Ndemera</h3>
      </div><!-- pastor -->

      <ul id="front-events">

        <h2>upcoming events</h2>

      <?php
          $arguments = array(
              'post_type' => 'events',
              'post_status' => 'publish',
              'paged' => $paged
          );

          $events_query = new WP_Query($arguments);

          dd_set_query($events_query);
      ?>
                               
      <?php 
          if ($events_query->have_posts()) : 
          while ($events_query->have_posts()) : $events_query->the_post(); 
      ?>
        
        <li class="clearfix">
                          
        <?php 

          $thumbimg = get_post_meta(get_the_ID(), 'thumbimg', true);
          $facebookurl = get_post_meta(get_the_ID(), 'facebookurl', true);
          $location = get_post_meta(get_the_ID(), 'location', true);
          $date = get_post_meta(get_the_ID(), 'date', true);
          $time = get_post_meta(get_the_ID(), 'time', true);
          $price = get_post_meta(get_the_ID(), 'price', true);

        ?>

        <?php if($thumbimg) : ?>
            <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo $thumbimg; ?>" /></a>
        <?php endif; ?>

        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <?php if($date) : ?>
          <p><?php echo $date; ?></p>
        <?php endif; ?>

        <?php if($location) : ?>
          <p><?php echo $location; ?></p>
        <?php endif; ?>

        </li>



    <?php endwhile; endif; ?>

    </ul><!-- front-events -->
  
    <div id="front-gallery">
      <h2>Recent Pictures</h2>
        <?php echo do_shortcode( '[recent max=6 order_by="alttext"]' ); ?>
    </div><!-- front-gallery -->

    </div><!-- front-sidebar -->

    <div id="front-content">
      <ul id="front-news">
        <h2>News and Announcements</h2>

        <?php
          $args = array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'posts_per_page' => 3
          );

          $query = new WP_Query($args); 

          while($query->have_posts()) : $query->the_post(); 
        ?>

        <li class="clearfix">

          <?php 
              $day = get_the_date('d');
              $month = get_the_date('M'); 
              $year  = get_the_date('Y');
          ?>

          <div class="date">
            <h3><?php echo $month; ?></h3>
            <h4><?php echo $day; ?></h4>
            <!-- <p><?php echo $year; ?></p> -->
          </div>

          <?php if(has_post_thumbnail()) : ?>

              <?php the_post_thumbnail(array('72', '72')); ?>

          <?php endif; ?>
          
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php ks_excerpt(); ?>

        </li>

      <?php endwhile; ?>
      </ul><!-- front-news -->

        <h2>welcome to the christian fellowship international</h2>
        <p>It is not by accident that God has directed you to this website. Pilgrims Community Church under the cutting edge and dynamic leadership of our visionary founding Pastor, Dr Japhat Ndemera is a holistic, life changing, bible based, coaching clinic and fountain of eternal life. We are a church that is planted, positioned and prepared for, "Empowering You For the Journey", through this life into eternity.
 
As we celebrate and reflect on these ten fruitful years of flourishing in the favor of God, we bear witness that God has exceeded our greatest imaginations. At Pilgrims Community; The word is proclaimed, souls are being set free, yokes broken, lives changed, favor received and God is glorified. All that we have ever needed as Pilgrims, God's hand has provided without measure. There is an atmosphere of miracles that pronounces that, the best is yet to come!</p>


        <h2>featured video</h2>

        <iframe width="100%" height="315" src="//www.youtube.com/embed/IeUAwvovJ8g" frameborder="0" allowfullscreen></iframe>
    </div><!-- front-content -->
</div><!-- front-content-wrapper -->

<!-- <div class="topModule clearfix">

</div> --><!-- top-module -->


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