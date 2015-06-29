<?php get_header(); ?>
    <div id="mainwrap">
    	<div id="main" class="wrapper">
        	<div id="frontcontent">
            	<h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
            <div id="blog">
                	<h4 class="linehead2">From The Blog...</h4>
                    <?php
						$args = array(
							'post_type' => 'post',
							'orderby' => 'date',
							'order' => 'DESC',
							'posts_per_page' => 3,
						);
						$loop = new WP_Query($args);
						// The Loop
						$i = 1;
						if($loop->have_posts()) :
						while( $loop->have_posts() ) : 
						$loop->the_post();
					?>
                    <div class="blog">
               	    	<?php the_post_thumbnail('home-thumb'); ?> 
                    	<small>By <?php the_author(); ?></small>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div>
                        	<p><?php my_excerpt('short'); ?></p>
                        </div>
                    </div>
                     <?php
						endwhile; // end of the loop. 
						else: 
						?>
                        <div class="blog">
                        <div>
                        	<p>Sorry no blogs for this category.</p>
                        </div>
                    </div>
                        <?php
						endif;
						wp_reset_postdata();
					?>
                    <a class="viewall" href="/blog/">See all articles &raquo;</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php get_footer(); ?>