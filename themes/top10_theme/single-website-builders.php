<?php get_header(); ?>

    	<div id="main" class="wrapper">

        <?php if ( function_exists('yoast_breadcrumb') ) {

yoast_breadcrumb('<div id="breadcrumbs">','</div>');

} ?>

        <?php

					while(have_posts()): the_post();

					$meta = get_post_meta( get_the_ID() );

				?>

        	<div id="content" class="review">

            	

                <h3><?php echo the_review_title(); ?></h3>

                <?php

                    	if($meta['topten_intro'][0] != '') :

					?>

                <div class="review-intro">

                	<p><?php echo $meta['topten_intro'][0]; ?></p>

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

                </div>

                <?php

					endif;

				?>

                <a name="overall"></a>

					<div id="ratings">

					<div class="ratingsbox">

                    	<h2>Ratings &amp; Review</h2>

                        <table>

                        	<tr>

                            	<th>Features</th><td><?php topten_calcreview($meta['topten_rating_features'][0]) ;?></td>

                            </tr>

                            <tr>

                            	<th>Credibility</th><td><?php topten_calcreview($meta['topten_rating_cred'][0]) ;?></td>

                            </tr>

                            <tr>

                            	<th>Ease of Use</th><td><?php topten_calcreview($meta['topten_rating_ease'][0]) ;?></td>

                            </tr>

                            <tr>

                            	<th>Price</th><td><?php topten_calcreview($meta['topten_rating_price'][0]) ;?></td>

                            </tr>

                            <tr>

                            	<th>Help &amp; Support</th><td><?php topten_calcreview($meta['topten_rating_support'][0]) ;?></td>

                            </tr>

                            <tr>

                            	<th>Overall</th><td><div class="overreview"><?php echo $meta['topten_rating'][0] ;?><br/><span>

                              <?php

                                if($meta['topten_rating'][0] < 3) {

									echo 'OK';

								} elseif($meta['topten_rating'][0] >= 3 && $meta['topten_rating'][0] <4.5 ) {

									echo 'Good';

								} elseif($meta['topten_rating'][0] >= 4.5) {

									echo 'Excellent';

								}

                               ?>

                                </span></div></td>

                            </tr>

                         </table>

                         </div>

                         <div class="trycontain"><a href="<?php echo $meta['topten_link'][0]; ?>" class="tryit">Try It Now</a></div>

                    </div>

                    <?php

                    	if($meta['topten_overall_text'][0] != '') :

					?>

						<?php echo wpautop($meta['topten_overall_text'][0]) ;?>	

                     <?php

                         endif;

                    ?>

                    <?php

                    	if($meta['topten_ease_text'][0] != '') :

					?>

                            <a name="ease"></a>

                            <h2><span>Ease of Use</span></h2>

                            <?php echo wpautop($meta['topten_ease_text'][0]) ;?>

                    <?php

						endif;

						if($meta['topten_support_text'][0] != '') :

					?>

                            <a name="support"></a>

                            <h2><span>Help &amp; Support</span></h2>

                            <?php echo wpautop($meta['topten_support_text'][0] );?>	

                    <?php

						endif;

						if($meta['topten_templates_text'][0] != '') :

					?>

                            <a name="templates"></a>

                            <h2><span>Templates</span></h2>

                            <?php echo wpautop($meta['topten_templates_text'][0]) ;?>	

                    <?php

						endif;

						if($meta['topten_who_text'][0] != '') :

					?>

                            <a name="who"></a>

                            <h2><span>Who is <?php the_title(); ?> For?</span></h2>

                            <?php echo wpautop($meta['topten_who_text'][0]) ;?>	

                    <?php

						endif;

						if($meta['topten_standout_text'][0] != '') :

					?>

                            <a name="standout"></a>

                            <h2><span>Standout Features</span></h2>

                            <?php echo wpautop($meta['topten_standout_text'][0]) ;?>	

                    <?php

						endif;

						if($meta['topten_sites'][0] != '') :

					?>

                            <a name="sites"></a>

                            <h2><span><?php the_title();?> Sites</span></h2>

                            <?php $gallery = do_shortcode( $meta['topten_sites'][0] ); 

									echo jqlb_apply_lightbox($gallery)

							?> 

                            <?php

						endif;

						if($meta['topten_prices_text'][0] != '') :

					?>

                            <a name="prices"></a>

                            <h2><span><?php the_title();?> Prices &amp; Plans</span></h2>

                            <?php echo wpautop( $meta['topten_prices_text'][0] ); 

									

							?>

                     <?php

						endif;

						

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

				  echo '<a href="'.$meta['topten_link'][0].'">'.the_post_thumbnail('big-review').'</a>';

				} 

				?>

                <div class="bigtrycontain"><a class="bigtry" href="<?php echo $meta['topten_link'][0]; ?>">Try It Now</a></div>

                <div class="quicknav">

                <h3 >Quick Navigation!</h3>

                <ul>

                	<?php

                    	if($meta['topten_overall_text'][0] != '') echo '<li><a href="#overall">Overall Ratings</a></li>';

                    	if($meta['topten_ease_text'][0] != '') echo '<li><a href="#ease">Ease of Use</a></li>';

                    	if($meta['topten_support_text'][0] != '') echo '<li><a href="#support">Help &amp; Support</a></li>';

                    	if($meta['topten_templates_text'][0] != '') echo '<li><a href="#templates">Templates</a></li>';

                    	if($meta['topten_who_text'][0] != '') echo '<li><a href="#who">Who is <?php the_title(); ?> For?</a></li>';

                    	if($meta['topten_standout_text'][0] != '') echo '<li><a href="#standout">Standout Features</a></li>';

						if($meta['topten_sites'][0] != '') echo '<li><a href="#sites">Example Sites</a></li>';

						if($meta['topten_prices_text'][0] != '') echo '<li><a href="#prices">Prices &amp; Plans</a></li>';

                    	if($faqs == 1) echo '<li><a href="#faq"><?php the_title(); ?> FAQs</a></li>';

                    	if($meta['topten_conclusion_text'][0] != '') echo '<li><a href="#conclusion">Conclusion</a></li>';

					?>

                 </ul>

                 </div>

            </div>

            <?php endwhile; ?>

            <div class="clear"></div>

    </div>

<?php get_footer(); ?>