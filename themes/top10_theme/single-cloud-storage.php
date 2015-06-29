<?php get_header(); ?>
    	<div id="main" class="wrapper">
        <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<div id="breadcrumbs">','</div>');
} ?>
        <?php
					while(have_posts()): the_post();
					$meta = get_fields( get_the_ID() );
				?>
        	<div id="content" class="review">
            	
                <h3><?php echo the_review_title(); ?></h3>
                
                <?php 
					$i =0;
					foreach($meta as $key=>$value) {
						if(!preg_match('#(table_|rb_|link)#is', $key)) {
							$value = preg_replace('#<h([1-6])>(.+?)</h\1>#is', '<h$1><span>$2</span></h2>', $value);
							if($i == 1) { ?>
								<a name="overall"></a>
					<div id="ratings">
					<div class="ratingsbox">
                    	<h2>Ratings &amp; Review</h2>
                        <table>
                        <tr>
                            	<th>Ease of Use</th><td><?php topten_calcreview(get_field('cs_rb_ease')) ;?></td>
                            </tr>
                        	<tr>
                            	<th>Features</th><td><?php topten_calcreview(get_field('cs_rb_features')) ;?></td>
                            </tr>
                            <tr>
                            	<th>Security</th><td><?php topten_calcreview(get_field('cs_rb_security')) ;?></td>
                            </tr>
                            <tr>
                            	<th>Performance</th><td><?php topten_calcreview(get_field('cs_rb_support')) ;?></td>
                            </tr>
                            <tr>
                            	<th>Price</th><td><?php topten_calcreview(get_field('cs_rb_price')) ;?></td>
                            </tr>
                            
                            <tr>
                            	<th>Overall</th><td><div class="overreview"><?php echo get_field('cs_table_rating') ;?><br/><span>
                              <?php
                                if(get_field('cs_table_rating') < 3) {
									echo 'OK';
								} elseif(get_field('cs_table_rating') >= 3 && get_field('cs_table_rating') <4.5 ) {
									echo 'Good';
								} elseif(get_field('cs_table_rating') >= 4.5) {
									echo 'Excellent';
								}
                               ?>
                                </span></div></td>
                            </tr>
                         </table>
                         </div>
                         <div class="trycontain"><a href="<?php echo get_field('cs_link'); ?>" class="tryit">Try It Now</a></div>
                    </div>
							<?php }
							echo '<div '.($i == 0 ? 'class="review-intro"' : '').' id="'.$key.'">
									'.$value;
									
									if($i ==0) { ?>
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

<!-- Place this tag after the last share tag. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'en-GB'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</div>
            <div class="social-button">
<script src="//platform.linkedin.com/in.js" type="text/javascript">
 lang: en_US
</script>
<script type="IN/Share" data-counter="right"></script>
</div></div>
                            <?php }
									
								echo '</div>';
							 
								$i++;
						}
					}
				?>
                
                
                    
                     <?php
						//$tags = get_terms('faq-tag', array('fields'=>'ids') );
						if($terms = get_the_terms(get_the_ID(), 'faq-tag')) :
						foreach($terms as $term) {
							$tags[] = $term->term_id;	
						}
						$args = array(
							'post_type' => 'faq',
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'tax_query' => array(
								array(
									'taxonomy' => 'faq-tag',
									'field' => 'id',
									'terms' => $tags,
									'operator' => 'IN'
								)
							)
						);
						$loop = new WP_Query($args);
						// The Loop
						$i = 1;
						if($loop->have_posts()):
						$faqs =1;
					?>
                    <a name="faq"></a>
                	<h2><span><?php the_title();?> FAQs</span></h2>
                    
                    <div id="accordion">
                   	<?php
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
                    <?php
						endif; endif;
						if($meta['topten_conclusion_text'][0] != '') :
					?>
                            <a name="conclusion"></a>
                            <h2><span>Conclusion</span></h2>
                            <?php echo wpautop( $meta['topten_conclusion_text'][0] ); 
									
							?>
                    <?php
						endif;
					?>
                    <h2><span>Your Opinion &amp Reviews</span></h2>
            <?php if(is_single()) { comments_template( '', true ); } ?>
            </div>
            <div id="sidebar" class="slidebar">
            	<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				  echo '<a href="'.get_field('cs_link').'">'.the_post_thumbnail('big-review').'</a>';
				} 
				?>
                <div class="bigtrycontain"><a class="bigtry" href="<?php echo get_field('cs_link'); ?>">Try It Now</a></div>
                <div class="quicknav">
                <h3 >Quick Navigation!</h3>
                <ul>
                	<?php 
					foreach($meta as $key=>$value) {
						if(!preg_match('#(table_|rb_|link)#is', $key)) {
							if(preg_match('#<h2>(.+?)</h2>#is', $value, $matches)) {
								echo '<li>
										<a href="#'.$key.'">'.$matches[1].'</a>
									</li>';
							}
						}
					}
					?>
                 </ul>
                 </div>
            </div>
            <?php endwhile; ?>
            <div class="clear"></div>
    </div>
<?php get_footer(); ?>