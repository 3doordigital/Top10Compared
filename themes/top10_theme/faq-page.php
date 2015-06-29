<?php
/*
Template Name: FAQ Page
*/
?>
<?php get_header(); ?>
    	<div id="main" class="wrapper">
        <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<div id="breadcrumbs">','</div>');
} ?>
        	<div id="content" class="page">
            <?php
					while(have_posts()): the_post();
				?>
            <div id="pageintro">
				<h4><?php the_title(); ?></h4>
               	<?php the_content() ;?>
             </div>
                <?php endwhile; ?>
                <div id="accordion">
                    <?php
						//$tags = get_terms('faq-tag', array('fields'=>'ids') );
						$args = array(
							'post_type' => 'faq',
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'tax_query' => array(
								array(
									'taxonomy' => 'faq-tag',
									'field' => 'slug',
									'terms' => 'main',
									'operator' => 'IN'
								)
							)
						);
						$loop = new WP_Query($args);
						// The Loop
						$i = 1;
						while( $loop->have_posts() ) : 
						$loop->the_post();
					?>	
                      <h3><?php the_title(); ?></h3>
                      <div>
                        <?php the_content();?>
                      </div>
                    <?php
						endwhile; // end of the loop. 
						wp_reset_postdata();
					?>
                      
                    </div>
            </div>
            <div id="sidebar">
            	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
            </div>
            <div class="clear"></div>
    </div>
<?php get_footer(); ?>