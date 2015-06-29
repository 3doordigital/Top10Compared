<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php wp_title(''); ?></title>

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>?version=1.0" />

<link href="<?php bloginfo('stylesheet_directory'); ?>/jquery-ui-1.10.3.custom.css" rel="stylesheet">

<!--Start of Zopim Live Chat Script-->

<script type="text/javascript">

window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=

d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.

_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');

$.src='//v2.zopim.com/?2cpG89cLyINGatojTzdKl38BcA3AcPWB';z.t=+new Date;$.

type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');

</script>

<!--End of Zopim Live Chat Script-->

<?php wp_head(); ?>

<script>

	jQuery(function($) {

		$( "#accordion" ).accordion({

			  heightStyle: "content"

			});

		jQuery('#mailinglist').focus(function() {

			if(jQuery(this).val() == 'enter email here...') {

				jQuery(this).val('');	

			}

		}).blur(function() {

			if(jQuery(this).val() == '') {

				jQuery(this).val('enter email here...');	

			}

		});

		jQuery("#newsletter").submit(function() {

			var fields = jQuery(this).serialize();

				jQuery.ajax({

						  type: 'POST',

						  url: '/wp-content/themes/top10_theme/ajax/newsletter.php',

						  data: fields,

						  success: function(data) 	

						  { 	

							jQuery(".newsletterinfo").html(data); 

						  }

					});

			return false;

		});	

		

		$(".soon_link").hover(

			function(event) {

				$(this).html('Coming Soon');

			}, 

			function(event) {

				$(this).html('Read Reviews');

			}

		).click(function(event) {

			event.preventDefault();

		});

		var itemwidth = '';

		var itemtext ='';

		var itempadding ='';

		$(".coming_soon a").hover(

			function(event) {

				itemwidth = $(this).outerWidth();

				itemtext = $(this).html();

				itempadding = $(this).css('padding');

				$(this).css('width', itemwidth).css('padding', '18px 0px').css('padding-bottom', '19px');

				$(this).html('Coming Soon');

			}, 

			function(event) {

				$(this).html(itemtext);

				$(this).css('padding', itempadding).css('padding-bottom', '19px').css('width', 'auto');

			}

		).click(function(event) {

			event.preventDefault();

		});

		

		function matchHeight(classname,padding) {

			var maxh = 0;

			var height = 0;

			$(classname).each(function () {

				$(this).height('auto');

				height = $(this).height();

				if(maxh < height) {

					maxh = height;	

				}

			});

			

				$(classname).each(function () {

					$(this).height(maxh+padding);

				});

				

			

		}

	

		matchHeight('.box',30);

		

	});

	

	jQuery(document).ready(function($) {

		<?php if(!is_archive()) : ?>

		var offset = $('#sidebar').offset(); 

		var height = $('#sidebar').outerHeight(true);

		var footer = $('#footer').outerHeight(true);

		var bottom = offset.top + height;

		var offset2 = $('#footer').offset();

		var liveoffset = $('#sidebar').offset();

		var abspos = offset2.top-height+100;

		$(window).scroll(function () { 

			$('#sidebar.slidebar').removeClass('fixedbottom').css({top: ''}); 

			liveoffset = $('#sidebar').offset();

			bottom = liveoffset.top + height;  

			 

			var scrollTop = $(window).scrollTop(); 

			if (offset.top<scrollTop) {

				$('#sidebar.slidebar').addClass('fixed'); 

			} else {

				$('#sidebar.slidebar').removeClass('fixed');   

			}

			 if (bottom>=offset2.top) {

				$('#sidebar.slidebar').addClass('fixedbottom').css({top: abspos}); 

			} else {

				$('#sidebar.slidebar').removeClass('fixedbottom').css({top: ''});   

			}

			

						console.log('Bottom: '+bottom+' Offset2: '+offset2.top+' Height: '+height+' Liveoffset: '+liveoffset.top+' abspos: '+abspos);

		});

		<?php endif; ?>

	});

</script>

</head>

<body <?php echo body_class(); ?>>



	<div id="headwrap">

    	<div id="header" class="wrapper">

        	<div id="topsocial">

            <a href="https://www.facebook.com/top10compared" target="_blank" onClick="_gaq.push(['_trackEvent', 'TopSocial_WB_LP0', 'Facebook', 'Clicked',,  false]);"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/fb.png" width="29" height="29" alt=""/></a>

            <a href="https://plus.google.com/u/0/b/103637390754582140885/103637390754582140885/posts" target="_blank" onClick="_gaq.push(['_trackEvent', 'TopSocial_WB_LP0', 'Google+', 'Clicked',,  false]);"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gplus.png" width="29" height="29" alt=""/></a>

            <a href="https://twitter.com/top10compared" target="_blank" onClick="_gaq.push(['_trackEvent', 'TopSocial_WB_LP0', 'Twitter', 'Clicked',,  false]);"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter.png" width="29" height="29" alt=""/></a>

            <a href="http://www.youtube.com/channel/UCXA-ov1HCkX07mFuf-hNxHQ" target="_blank" onClick="_gaq.push(['_trackEvent', 'TopSocial_WB_LP0', 'YouTube', 'Clicked',,  false]);"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube.png" width="29" height="29" alt=""/></a>

            <br/>

            <a class="bdr" href="/about-us/">About Us</a>

            <a class="bdr"  href="/blog/">Blog</a>

            <a href="/contact-us/">Contact</a>

            </div>

        	<div id="logo">

            	<a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-new.png" height="114" width="164" alt=""/></a>

            </div>

            <div id="social"></div>

        </div>

    </div>

    <div id="topnavwrap">

    	<div id="topnav" class="wrapper">

        	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

            <div class="clear"></div>	

        </div>

    </div>

    <div id="mastheadwrap">

    	<div id="masthead" class="wrapper">

        <?php 

				global $wp_query;

				$term = $wp_query->get_queried_object();

				//print_r($term->rewrite);

				$slug = $term->rewrite['slug'];
                
				$type = $term->post_type;

				if($type != '') {

						$cpt = $type;
				} elseif($type == '' && $term->taxonomy == 'builder-type') {
					$cpt = 'website-builders';
					} else {

						$cpt = $slug;

					}

				if(is_home() || is_singular('post')) {

					$cpt = 'blog';	

				} elseif(is_404()) {

					$cpt = '404';	

				} elseif($cpt == 'online-fax-services') {

					$cpt = 'online-fax';

				} elseif($cpt == 'backup-software') {

					$cpt = 'data-storage';

				}

				//echo $cpt;

				//echo 'Slug: '.print_r($type, true);	

				if(is_front_page()) {

					?>

				

				<?php if( have_rows('box_boxes') ): 

					$i =0;

				?>

				

                    <div class="boxes">

                

                    <?php while( have_rows('box_boxes') ): the_row(); 

                		$i++;

                        // vars

                        $title = get_sub_field('box_title');

						$image = get_sub_field('box_image');

                        $content = get_sub_field('box_text');

                        $link = get_sub_field('box_link');

                

                        ?>

                

                        <div class="box <?php if($i ==3) { echo 'last'; $i=0; } ?>" style="background-image:url('<?php echo $image; ?>');">

                

                            <h2><?php echo $title; ?></h2>

                           	<p><?php echo $content; ?></p>

	                        <?php if(get_sub_field('box_soon') == 1) { ?>

                            	<p><a class="soon_link" href="#">Read Reviews</a></p>

                			<?php } else { ?>

                            	<p><a href="<?php echo $link; ?>">Read Reviews</a></p>

                            <?php } ?>

                        </div>

                

                    <?php endwhile; ?>

                

                    </div>

                

                <?php endif; ?>

				

				<?php

				} else {

					if( is_tax() ) {

					

					$t_id = $term->term_id; // You will want to retrieve this somehow

					if($toptags = get_option( "taxonomy_".$t_id )) 

					{

					?>

                        <h1 class="pageheader"><?php echo $toptags['custom_term_meta']; ?></h1>

                        <h2 class="pagesub"><?php echo $toptags['custom_term_meta2']; ?></h2>

              <?php } else { ?>

                        <h1 class="pageheader">Find and Compare the Best Website Builders</h1>

                        <h2 class="pagesub">Creating beautiful and effective websites has never been so easy!</h2>

            <?php } 

			

				} else {

					

					$values = get_option( 'cpt_titles_option' );

					echo '<h1 class="pageheader">'.$values[$cpt]['h1'].'</h1>';

                    echo '<h2 class="pagesub">'.$values[$cpt]['h2'].'</h2>';

				}?>

        	<?php

            	if($slug == 'website-builders' || $type == 'website-builders' || $cpt == 'website-builders' ) {

			?>

            	<div id="mainnav">

            		<?php wp_nav_menu( array( 'theme_location' => 'category' ) ); ?>

                	<div class="clear"></div>

            	</div>

            <?php } 

			

				}?>

        </div>

    </div>