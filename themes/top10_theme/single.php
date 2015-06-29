<?php get_header(); ?>
    	<div id="main" class="wrapper">
        <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<div id="breadcrumbs">','</div>');
} ?>
        	<div id="content" class="blog single">
             	<?php
					while(have_posts()): the_post();
				?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(array('article')); ?>> 
                <h1><?php the_title(); ?></h2>
                <?php 
					 if ( has_post_thumbnail()) {
					   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
					   echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" rel="lightbox">';
					   the_post_thumbnail('thumbnail');
					   echo '</a>';
					 }
				 ?>
				<?php the_content(); ?>
            </div>
            <?php if ( is_singular() && get_the_author_meta( 'description' ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' )); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About the Author %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
                        
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'All Posts by %s', 'twentytwelve' ), get_the_author() ); ?></a><?php if(get_the_author_meta('twitter')) { ?>
                             | <a href="http://twitter.com/<?php echo get_the_author_meta('twitter'); ?>">@<?php echo get_the_author_meta('twitter'); ?></a>
                            <?php } ?>
                            <?php if(get_the_author_meta('facebook')) { ?>
                            | <a href="<?php echo get_the_author_meta('facebook'); ?>">Facebook</a>
                            <?php } ?>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
            <h2>Your Opinion &amp Reviews</h2>
            <?php if(is_single()) { comments_template( '', true ); } ?>
                <?php endwhile; ?>
                
            </div>
            <div id="sidebar">
            	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
            </div>
            <div class="clear"></div>
    </div>
<?php get_footer(); ?>