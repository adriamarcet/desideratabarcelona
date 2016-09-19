<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php 
				// If has image gallery show it here
				if(get_field('image_gallery')): 
				?>
				<div class="c-starred-content">
				
					<ul class="list--float-row group">
					<?php while(the_repeater_field('image_gallery')): ?>
						
						<?php 
							$image = wp_get_attachment_image_src(get_sub_field('single_image'), 'full'); 
							$thumb = wp_get_attachment_image_src(get_sub_field('single_image'), 'thumbnail'); 
						?>
						<li class="col-unit col-1-2--tablet col-1-4--desktop">
							<img src="<?php echo $image[0]; ?>" alt="<?php  the_sub_field('title');?>" rel="<?php echo $thumb[0]; ?>" />
						</li>
				    <?php endwhile; ?>
					</ul>
				</div>

				<?php endif; ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( is_front_page() ) { ?>
					<!--
					<h2 class="entry-title">
					-->
						<?php // the_title(); ?>
					<!--
					</h2>
					-->
					
					
				<?php } else { ?>	
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php } ?>

					<div class="entry-content">

						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
				<?php comments_template( '', true ); ?>
<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>