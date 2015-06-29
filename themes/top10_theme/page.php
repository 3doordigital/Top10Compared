<?php get_header(); ?>
    	<div id="main" class="wrapper">
        <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<div id="breadcrumbs">','</div>');
} ?>
        	<div id="content" class="page">
            
            	<?php
					while(have_posts()): the_post();
				?>
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
            <div id="sidebar">
            	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
            </div>
            <div class="clear"></div>
    </div>
<?php get_footer(); ?>