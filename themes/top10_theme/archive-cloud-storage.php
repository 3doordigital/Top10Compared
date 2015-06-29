<?php get_header(); ?>
<div id="homeintrowrap">
    	<div id="homeintro" class="wrapper">
        	<?php 
				output_cpt_header();
			?>
            <div id="sharebuttons">
            <div class="social-button">
            <div class="fb-like" data-href="<?php the_permalink(); ?>" data-width="80" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
			</div>
            <div class="social-button">
            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
            
            <div class="social-button">
<!-- Place this tag where you want the share button to render. -->
<div class="g-plus" data-action="share" data-annotation="bubble"></div>


</div>
            <div class="social-button">
<script src="//platform.linkedin.com/in.js" type="text/javascript">
 lang: en_US
</script>
<script type="IN/Share" data-counter="right"></script>
</div></div>
            <?php 
			?>
        </div>
    </div>
    <div id="mainwrap">
    	<div id="main" class="wrapper">
        	<div id="content">
            	<table id="listings" style="width: 100%;">
                	<tr>
                    	<th></th>
                        <th>Provider</th>
                        <th>Storage &amp; Pricing</th>
                        <th>Sharing</th>
                        <th>System</th>
                        <th width="150">Bottom Line</th>
                        <th>Our Rating</th>
                        <th></th>
                    </tr>
                    <?php
						$args = array(
							'post_type' => 'cloud-storage',
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'posts_per_page' => 10,
							
							
						);
						$loop = new WP_Query($args);
						//echo var_dump($loop);
						// The Loop
						if($loop->have_posts()) :
						$i = 0;
				?>
                    <?php
						while( $loop->have_posts() ) : 
						$loop->the_post();
					?>	
                    <?php //$meta = get_post_meta( get_the_ID() ); ?>
                    <?php if($i == 0) { echo '<tr class="first">'; } else { echo '<tr>';  } $i ++; ?>
                    	<td class="bignumber"><?php echo $i; ?></td>
                        <td><a href="<?php the_field('cs_link'); ?>"><?php the_post_thumbnail('home-table'); ?></a></td>
                        <td><?php the_field('cs_table_storage'); ?></td>
                        <td><?php topten_tick(get_field('cs_table_sharing')); ?></td>
                        <td class="cs_systems"><?php topten_systems(get_field('cs_table_system')); ?></td>
                        <td class="bottomline"><?php the_field('cs_table_bottom_line'); ?></td>
                      <td width="100">
                        	<div class="review">
                       	  		<?php topten_calcreview(get_field('cs_table_rating')); ?>
                           </div>
                           <a class="viedwreviewlink" href="<?php the_permalink(); ?>">Read Review</a>
                      </td>
                        <td><strong><?php the_title(); ?></strong><br/><div class="trycontain"><a href="<?php echo get_field('cs_link'); ?>" class="tryit">Try It Now</a></div></td>
                    </tr>
                    <?php
						//$i++;
						endwhile; // end of the loop. 
						wp_reset_postdata();
					?>
                    <?php else: ?>
                    <tr><td colspan="8">No data.</td></tr>
                    <?php endif; ?>
                </table>
            </div>
            <div id="info">
            	<?php
						$args = array(
							'post_type' => 'builder-boxes',
							'section' => 'cloud-storage',
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'posts_per_page' => 4
						);
						$loop = new WP_Query($args);
						// The Loop
						if($loop->have_posts()) :
						$i = 0;
				?>
                    <?php
						while( $loop->have_posts() ) : 
						$loop->the_post();
					?>	
					<div class="infobox <?php if($i ==3) echo 'last'; ?>">
						<div class="infoimg"><?php the_post_thumbnail();?></div>
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
					</div>
					<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
                <div class="clear"></div>
            </div>
            <div id="resources">
            	<div id="faq">
                <h4 class="linehead">Our Most Asked Questions</h4>
                	<div id="accordion">
                    <?php
						//$tags = get_terms('faq-tag', array('fields'=>'ids') );
						$args = array(
							'post_type' => 'faq',
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'posts_per_page' => 10,
							'tax_query' => array(
								array(
									'taxonomy' => 'section',
									'field' => 'slug',
									'terms' => 'cloud-storage',
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
                <div id="bloglist">
                	<h4 class="linehead2">Latest Resources &amp; Advice</h4>
                    <?php
						$args = array(
							'post_type' => 'post',
							'orderby' => 'date',
							'order' => 'DESC',
							'posts_per_page' => 3,
							'tax_query' => array(
								'relation' => 'OR',
								array(
									'taxonomy' => 'category',
									'field' => 'slug',
									'terms' => 'general',
									'operator' => 'IN'
								),
								array(
									'taxonomy' => 'category',
									'field' => 'slug',
									'terms' => 'cloud-storage',
									'operator' => 'IN'
								)
							)
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
    </div>
<?php get_footer(); ?>