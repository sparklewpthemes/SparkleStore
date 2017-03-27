<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sparkle_Store
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="http://schema.org/BlogPosting" itemtype="http://schema.org/BlogPosting">

	<div class="post-container">
		<?php 
			if ( has_post_thumbnail() ) { 
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'sparklestore-blogs', true);
		?>
			<div class="post-img">

				<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
					 <figure>
						<img src="<?php echo esc_url( $image[0] ); ?>" class="img-responsive" alt="<?php the_title(); ?>">											 
					</figure>
				</a>	   									   
			</div>
		<?php } ?>
		<div class="post-detail-container">
			<div class="title">	
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>										
			</div>
			<ul class="list-info">
				<li><i class="fa fa-user"></i> <?php _e('By','sparklestore'); ?>  <?php the_author(); ?></li>
				<li><i class="fa fa-folder-open"></i> <?php the_category(', '); ?></li>
				<li><i class="fa fa-comment"></i> <?php comments_popup_link( '0 Comments', '1 Comments', '% Comments' );?></li>
				<li><i class="fa fa-tag"></i> <?php the_tags( ' ' ); ?></li>							
			</ul>

			<div class="blogdesc-wrap">
			  	<div class="blogdesc">								
		   			<?php the_excerpt(); ?> 
			  	</div>
				<a href="<?php the_permalink(); ?>" class="btn-mega">
                	<?php _e('Read More','sparklestore'); ?>
            	</a>
			</div>								
  		</div>
		
	</div>

</article><!-- #post-## -->
