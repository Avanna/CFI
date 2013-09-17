<div id="page-top" class="clearfix">

	<?php 

		if($post->post_parent) 
  			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
  		else
  			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
  		if ($children) { ?>
			<div id="page-nav" class="clearfix">
  				<ul>
  					<?php echo $children; ?>
  				</ul>
			</div><!-- page-nav -->
  		<?php } ?>

</div><!-- page-top -->