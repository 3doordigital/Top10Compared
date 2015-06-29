<?php get_header(); ?>

    	<div id="main" class="wrapper">

        <?php if ( function_exists('yoast_breadcrumb') ) {

yoast_breadcrumb('<div id="breadcrumbs">','</div>');

} ?>

        	<div id="content" class="blog">

            <div id="pageintro">

				<?php

                    if( is_home() && get_option('page_for_posts') ) {

                        $blog_page_id = get_option('page_for_posts');

                        echo '<h3>'.get_page($blog_page_id)->post_title.'</h3>';

                        echo wpautop(get_page($blog_page_id)->post_content);

                    }

                ?>

             </div>

            	<?php

					while(have_posts()): the_post();

				?>

            <div class="article"> 

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <?php 

					if ( has_post_thumbnail() ) { 

					  the_post_thumbnail('thumbnail');

					} 

				?>

				<?php my_excerpt('long'); ?>

            </div>

                <?php endwhile; ?>

                <?php wp_pagenavi(); ?>

            </div>

            <div id="sidebar">

            	<?php dynamic_sidebar( 'blog-sidebar' ); ?>

            </div>

            <div class="clear"></div>

    </div>

<?php get_footer(); ?>