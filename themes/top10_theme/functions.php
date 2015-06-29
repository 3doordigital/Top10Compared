<?php

	add_theme_support( 'post-thumbnails' );
	
	register_nav_menu( 'primary', 'Primary Menu' );
	
	register_nav_menu( 'category', 'Category Menu' );
	
	add_image_size( 'home-thumb', 48, 48, true );
	
	add_image_size( 'home-table', 125 );
	
	add_image_size( 'big-review', 289);
	
	add_image_size( 'foot-thumb', 75);
	
	function wpseo_disable_rel_next_home( $link ) {
		return false;
	}
	add_filter( 'wpseo_next_rel_link', 'wpseo_disable_rel_next_home' );
	
	class Excerpt {

	  // Default length (by WordPress)
	  public static $length = 55;
	
	  // So you can call: my_excerpt('short');
	  public static $types = array(
		  'short' => 15,
		  'regular' => 55,
		  'long' => 95
		);
	
	  /**
	   * Sets the length for the excerpt,
	   * then it adds the WP filter
	   * And automatically calls the_excerpt();
	   *
	   * @param string $new_length 
	   * @return void
	   * @author Baylor Rae'
	   */
	  public static function length($new_length = 55) {
		Excerpt::$length = $new_length;
	
		add_filter('excerpt_length', 'Excerpt::new_length');
	
		Excerpt::output();
	  }
	
	  // Tells WP the new length
	  public static function new_length() {
		if( isset(Excerpt::$types[Excerpt::$length]) )
		  return Excerpt::$types[Excerpt::$length];
		else
		  return Excerpt::$length;
	  }
	
	  // Echoes out the excerpt
	  public static function output() {
		the_excerpt();
	  }
	
	}
	
	// An alias to the class
	function my_excerpt($length = 55) {
	  Excerpt::length($length);
	}
	
	function new_excerpt_more($more) {
		global $post;
		return '... <a href="'. get_permalink($post->ID) . '">Read more &raquo;</a>';
	}
	
	add_filter('excerpt_more', 'new_excerpt_more');
	function topten_enqueue_script() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-widget' );
	}
	
	register_sidebar( array(
		'name' => 'Footer 1',
		'id' => 'footer-1',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => 'Footer 2',
		'id' => 'footer-2',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
	
	

	
	register_sidebar( array(
		'name' => 'Footer Newsletter',
		'id' => 'footer-4',
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => '<div class="textwidget">',
		'after_title' => '</div>',
	) );
	
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'before_widget' => '<div class="sidebox">',
		'after_widget' => "</div>",
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	
	function topten_admin_theme_style() {
    	wp_enqueue_style('topten-admin-theme', get_template_directory_uri() . '/wp-admin.css');
	}
	
	add_action('admin_enqueue_scripts', 'topten_admin_theme_style');
	
	add_action( 'wp_enqueue_scripts', 'topten_enqueue_script' );
	

	register_post_type('website-builders', 
		array(	
			'label' => 'Website Builders',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'capability_type' => 'page',
			'hierarchical' => true,
			'rewrite' => array('slug' => 'website-builders',
			'with_front' => false, 'pages' => false),
			'query_var' => true,
			'has_archive' => true,
			'menu_position' => 28,
			'description' => 'Creating a website has never been so easy! There are many free website builders that offer a range of professional and beautiful site templates. To get started, take a look at our Top 10 Website Builders (below) and read our in-depth reviews. Additionally use the links above to see our Top 10 Website Creators for Ecommerce, Photography, Wedding and Restaurant websites. ',
			'supports' => array('title','editor','thumbnail','page-attributes', 'comments'),
			'labels' => array (
				  'name' => 'Website Builders',
				  'singular_name' => 'Website Builder',
				  'menu_name' => 'Website Builders',
				  'add_new' => 'Add Website Builder',
				  'add_new_item' => 'Add New Website Builder',
				  'edit' => 'Edit Website Builder',
				  'edit_item' => 'Edit Website Builder',
				  'new_item' => 'New Website Builder',
				  'view' => 'View Website Builder',
				  'view_item' => 'View Website Builder',
				  'search_items' => 'Search Website Builders',
				  'not_found' => 'No Website Builders Found',
				  'not_found_in_trash' => 'No Website Builders Found in Trash',
				  'parent' => 'Parent Website Builder'),
			'taxonomies' => array('builder-type')
		)
	);
	
	register_post_type('builder-boxes', 
		array(	
			'label' => '4 Content Boxes',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => false,
			'capability_type' => 'page',
			'hierarchical' => false,
			'query_var' => true,
			'has_archive' => false,
			'description' => '',
			'menu_position' => 27,
			'supports' => array('title','editor','thumbnail','page-attributes'),
			'labels' => array (
				  'name' => 'Content Boxes',
				  'singular_name' => 'Content Box',
				  'menu_name' => '4 Content Boxes',
				  'add_new' => 'Add Content Box',
				  'add_new_item' => 'Add Content Box',
				  'edit' => 'Edit Content Box',
				  'edit_item' => 'Edit Content Box',
				  'new_item' => 'New Content Box',
				  'view' => 'View Content Box',
				  'view_item' => 'View Content Box',
				  'search_items' => 'Search Content Boxes',
				  'not_found' => 'No Content Boxes Found',
				  'not_found_in_trash' => 'No Content Boxes Found in Trash',
				  'parent' => 'Parent Content Box'),
			'taxonomies' => array('builder-type')
		)
	);
	
	register_post_type('faq', 
		array(	
			'label' => 'FAQs',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug' => 'faqs',
								'with_front' => false),
			'menu_icon' => 'dashicons-format-status',
			'query_var' => true,
			'has_archive' => true,
			'menu_position' => 26,
			'supports' => array('title','editor','page-attributes'),
			'labels' => array (
				  'name' => 'FAQs',
				  'singular_name' => 'FAQ',
				  'menu_name' => 'FAQs',
				  'add_new' => 'Add FAQ',
				  'add_new_item' => 'Add New FAQ',
				  'edit' => 'Edit FAQ',
				  'edit_item' => 'Edit FAQ',
				  'new_item' => 'New FAQ',
				  'view' => 'View FAQ',
				  'view_item' => 'View FAQ',
				  'search_items' => 'Search FAQs',
				  'not_found' => 'No FAQs Found',
				  'not_found_in_trash' => 'No FAQs Found in Trash',
				  'parent' => 'Parent FAQ'),
			'taxonomies' => array('category', 'post_tag')
		)
	);
	function add_custom_taxonomies() {
		// Add new "Locations" taxonomy to Posts
		register_taxonomy('builder-type', array('website-builders','builder-boxes', 'faq'), array(
			// Hierarchical taxonomy (like categories)
			'hierarchical' => true,
			// This array of options controls the labels displayed in the WordPress Admin UI
			'labels' => array(
				'name' => 'Builder Types',
				'singular_name' => 'Builder Type',
				'search_items' =>  'Search Builder Types',
				'all_items' => 'All Builder Types' ,
				'parent_item' =>  'Parent Builder Type',
				'parent_item_colon' =>  'Parent Builder Type:' ,
				'edit_item' =>  'Edit Builder Type' ,
				'update_item' =>  'Update Builder Type' ,
				'add_new_item' =>  'Add New Builder Type' ,
				'new_item_name' =>  'New Builder Type Name' ,
				'menu_name' =>  'Builder Types' ,
			),
			'show_admin_column' => true,
			// Control the slugs used for this taxonomy
			'rewrite' => array(
				'slug' => 'website-builder-type', // This controls the base slug that will display before each term
				'with_front' => false, // Don't display the category base before "/locations/"
				'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
			),
		));
		
		register_taxonomy('faq-tag', array('website-builders', 'faq'), array(
			// Hierarchical taxonomy (like categories)
			'hierarchical' => false,
			// This array of options controls the labels displayed in the WordPress Admin UI
			'labels' => array(
				'name' => 'FAQ Tag',
				'singular_name' => 'FAQ Tag',
				'search_items' =>  'Search FAQ Tags',
				'all_items' => 'All FAQ Tags' ,
				'parent_item' =>  'Parent FAQ Tag',
				'parent_item_colon' =>  'Parent FAQ Tag:' ,
				'edit_item' =>  'Edit FAQ Tag' ,
				'update_item' =>  'Update FAQ Tag' ,
				'add_new_item' =>  'Add New FAQ Tag' ,
				'new_item_name' =>  'New FAQ Tag Name' ,
				'menu_name' =>  'FAQ Tags' ,
			),
			// Control the slugs used for this taxonomy
			'rewrite' => array(
				'slug' => 'builder-type', // This controls the base slug that will display before each term
				'with_front' => false, // Don't display the category base before "/locations/"
				'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
			),
		));
	}
	add_action( 'init', 'add_custom_taxonomies', 0 );
	
	add_action( 'add_meta_boxes', 'topten_reviewdetail' );
	
	function topten_reviewdetail() {
		 add_meta_box( 
			'topten_reviewdetail',
			'Review Details',
			'topten_definereviewbox',
			'website-builders',
			'advanced',
			'core' 
		);
	}
	
	function topten_definereviewbox() {
		global $post;
		  // Use nonce for verification
		echo '<div id="message" class="error below-h2"><p>Please only use the fields below and the upload thumbnail field. All other fields are not used.</p></div>';
		  // The actual fields for data entry
		echo'
			<h2>Homepage Table Details</h2>
			<p><label for="topten_freetrial">Free Trial</label> <input type="text" name="topten_freetrial" id="topten_freetrial" value="'.htmlspecialchars(get_post_meta($post->ID, 'topten_freetrial', true)).'"/> <i>Example: Yes or 3 Months</i></p>';
		echo'
			<p><label for="topten_price">Price</label> <input type="text" name="topten_price" id="topten_price" value="'.htmlspecialchars(get_post_meta($post->ID, 'topten_price', true)).'"/> <i>Example: Free or $4.99</i></p>';
		echo'
			<p><label for="topten_templates">Templates</label> <input type="text" name="topten_templates" id="topten_templates" value="'.htmlspecialchars(get_post_meta($post->ID, 'topten_templates', true)).'"/> <i>Example: 100+</i></p>';
		
		echo'
			<p><label for="topten_bottomline">Bottom Line</label> <textarea cols="30" rows="5" type="text" name="topten_bottomline" id="topten_bottomline">'.htmlspecialchars(get_post_meta($post->ID, 'topten_bottomline', true)).'</textarea></p>';
		echo'<h2>Ratings</h2>
		<p><i>Use the sliders to set the values from 0 to 5 in 0.5 increments.</i></p>
			<p><label for="topten_rating_features">Features Rating</label> <input type="text" class="ratinginput" name="topten_rating_features" id="topten_rating_features" value="'.htmlspecialchars(get_post_meta($post->ID, 'topten_rating_features', true)).'"/>  <span id="slider5" class="slide"></span></p>';	
		echo'
			<p><label for="topten_rating_cred">Credibility Rating</label> <input type="text" class="ratinginput" name="topten_rating_cred" id="topten_rating_cred" value="'.htmlspecialchars(get_post_meta($post->ID, 'topten_rating_cred', true)).'"/>  <span id="slider4" class="slide"></span></p>';	
		echo'
			<p><label for="topten_rating_ease">Ease of Use Rating</label> <input type="text" class="ratinginput" name="topten_rating_ease" id="topten_rating_ease" value="'.htmlspecialchars(get_post_meta($post->ID, 'topten_rating_ease', true)).'"/>  <span id="slider3" class="slide"></span></p>';
		echo'
			<p><label for="topten_rating_price">Price Rating</label> <input type="text" class="ratinginput" name="topten_rating_price" id="topten_rating_price" value="'.htmlspecialchars(get_post_meta($post->ID, 'topten_rating_price', true)).'"/>  <span id="slider2" class="slide"></span></p>';
		echo'
			<p><label for="topten_rating_support">Support Rating</label> <input type="text" class="ratinginput" name="topten_rating_support" id="topten_rating_support" value="'.htmlspecialchars(get_post_meta($post->ID, 'topten_rating_support', true)).'"/>  <span id="slider1" class="slide"></span></p>';	
		echo'
			<p><label for="topten_rating">Rating</label> <input type="text" name="topten_rating" class="ratinginput" id="topten_rating" value="'.htmlspecialchars(get_post_meta($post->ID, 'topten_rating', true)).'"/> <i>Example: 3 or 4.5</i> <span id="slider" class="slide"></span></p>';	
			echo '
				<p><label for="topten_link">Link</label>';
			echo '<input type="text" name="topten_link" id="topten_link" value="'.htmlspecialchars(get_post_meta($post->ID, 'topten_link', true)).'"/>';
						
			echo '<h2>Full Detail</h2>
			<p><i>Add full information in all of the tabs below.</i></p>
			<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Intro</a></li>
    <li><a href="#tabs-2">Overall</a></li>
    <li><a href="#tabs-3">Ease of Use</a></li>
	<li><a href="#tabs-4">Help &amp; Support</a></li>
	<li><a href="#tabs-5">Templates</a></li>
	<li><a href="#tabs-6">Who Is This For</a></li>
	<li><a href="#tabs-7">Standout Features</a></li>
	<li><a href="#tabs-8">Example Sites</a></li>
	<li><a href="#tabs-9">Plans &amp; Prices</a></li>
	<li><a href="#tabs-10">Conclusion</a></li>
  </ul>
  <div id="tabs-1"><p><i>Add the short introduction here.</i></p>';
  	wp_editor( htmlspecialchars(get_post_meta($post->ID, 'topten_intro', true)), 'topten_intro',array( 'media_buttons' => false ) );
  echo '</div>
  <div id="tabs-2"><p><i>Add the overall section here.</i></p>';
  	wp_editor( get_post_meta($post->ID, 'topten_overall_text', true), 'topten_overall_text',array( 'media_buttons' => false, 'textarea_rows' => 10 ) );
  echo '</div>
  <div id="tabs-3"><p><i>Add the ease of use section here.</i></p>';
  	wp_editor( get_post_meta($post->ID, 'topten_ease_text', true), 'topten_ease_text',array( 'media_buttons' => false, 'textarea_rows' => 10 ) );
  echo '</div>
  <div id="tabs-4"><p><i>Add the help &amp; support section here.</i></p>';
  	wp_editor( get_post_meta($post->ID, 'topten_support_text', true), 'topten_support_text',array( 'media_buttons' => false, 'textarea_rows' => 10 ) );
  echo '</div>
  <div id="tabs-5"><p><i>Add the templates section here.</i></p>';
  	wp_editor( get_post_meta($post->ID, 'topten_templates_text', true), 'topten_templates_text',array( 'media_buttons' => false, 'textarea_rows' => 10 ) );
  echo '</div>
  <div id="tabs-6"><p><i>Add the who is this for section here.</i></p>';
  	wp_editor( get_post_meta($post->ID, 'topten_who_text', true), 'topten_who_text',array( 'media_buttons' => false, 'textarea_rows' => 10 ) );
  echo '</div>
  <div id="tabs-7"><p><i>Add the standout features section here.</i></p>';
  	wp_editor( get_post_meta($post->ID, 'topten_standout_text', true), 'topten_standout_text',array( 'media_buttons' => false, 'textarea_rows' => 10 ) );
  echo '</div>
  <div id="tabs-8"><p><i>Add a gallery of sites below using the media upload feature.</i></p>';
  	wp_editor( get_post_meta($post->ID, 'topten_sites', true), 'topten_sites',array( 'media_buttons' => true, 'textarea_rows' => 10 ) );
	echo '</div>
  <div id="tabs-9"><p><i>Add plans and prices here.</i></p>';
  	wp_editor( get_post_meta($post->ID, 'topten_prices_text', true), 'topten_prices_text',array( 'media_buttons' => true, 'textarea_rows' => 10 ) );
	echo '</div>
  <div id="tabs-10"><p><i>Add conclusion here.</i></p>';
  	wp_editor( get_post_meta($post->ID, 'topten_conclusion_text', true), 'topten_conclusion_text',array( 'media_buttons' => true, 'textarea_rows' => 10 ) );
	echo '</div></div>';
	}
	
	function topten_review_save_postdata( $post_id ) {
	  
	  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		  return;
	
	  if ( 'page' == $_POST['post_type'] ) 
	  {
		if ( !current_user_can( 'edit_page', $post_id ) )
			return;
	  }
	  else
	  {
		if ( !current_user_can( 'edit_post', $post_id ) )
			return;
	  }
	if($_POST['topten_link'] == 'none') {
		$toptenlink = '';
	} else {
		$toptenlink = $_POST['topten_link'];
	}
	$mydata = array(
		'topten_freetrial' => $_POST['topten_freetrial'], 
		'topten_price' => $_POST['topten_price'],
		'topten_templates' => $_POST['topten_templates'],
		'topten_link' => $toptenlink,
		'topten_bottomline' => $_POST['topten_bottomline'],
		'topten_rating' => $_POST['topten_rating'],
		'topten_rating_features' => $_POST['topten_rating_features'],
		'topten_rating_cred' => $_POST['topten_rating_cred'],
		'topten_rating_ease' => $_POST['topten_rating_ease'],
		'topten_rating_price' => $_POST['topten_rating_price'],
		'topten_rating_support' => $_POST['topten_rating_support'],
		'topten_intro' => $_POST['topten_intro'],
		'topten_overall_text' => $_POST['topten_overall_text'],
		'topten_ease_text' => $_POST['topten_ease_text'],
		'topten_support_text' => $_POST['topten_support_text'],
		'topten_templates_text' => $_POST['topten_templates_text'],
		'topten_who_text' => $_POST['topten_who_text'],
		'topten_standout_text' => $_POST['topten_standout_text'],
		'topten_sites' => $_POST['topten_sites'],
		'topten_prices_text' => $_POST['topten_prices_text'],
		'topten_conclusion_text' => $_POST['topten_conclusion_text']
	);
	
	  // Do something with $mydata 
	  // probably using add_post_meta(), update_post_meta(), or 
	  // a custom table (see Further Reading section below)
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE || defined('DOING_AJAX') && DOING_AJAX ) {
		return;
	} else {
		foreach($mydata as $key=>$value) {
			update_post_meta($post_id, $key, $value) or add_post_meta($post_id, $key, $value, true);
		}
	}
}
	add_action( 'save_post', 'topten_review_save_postdata' );
	function round_to_half($num)
	{
	  if($num >= ($half = ($ceil = ceil($num))- 0.5) + 0.25) return $ceil;
	  else if($num < $half - 0.25) return floor($num);
	  else return $half;
	}
	function topten_calcreview($number) {
		$repeat = round_to_half($number);
		//echo $repeat;
		$n = 0;
		for($i=1;$i<=$repeat;$i++) {
			echo '<img src="'.get_template_directory_uri().'/images/star.png" width="19" height="19" alt=""/>';
			$n++;
		}
		$decimal = split('\.', $repeat);
		if($decimal[1] == '5') {
			echo '<img src="'.get_template_directory_uri().'/images/star-half.png" width="19" height="19" alt=""/>';	
			$n++;
		}
		$blanks = 5 - $n;
		for($i=0;$i<$blanks;$i++) {
			echo '<img src="'.get_template_directory_uri().'/images/star-blank.png" width="19" height="19" alt=""/>';
			$n++;
		}
	}
	
	// Creating the widget 
	class wpb_widget extends WP_Widget {
	
		function __construct() {
			parent::__construct(
				// Base ID of your widget
				'wpb_widget', 
				
				// Widget name will appear in UI
				'Text &amp; Image Box', 
				
				// Widget description
				array( 'description' => 'Add homepage small boxes with an image.')
			);
		}
		
		// Creating widget front-end
		// This is where the action happens
		public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$image = $instance['image'];
		$content = $instance['content'];
		$last = $instance['last'];
		$link = $instance['link'];
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if($last == 1) {
			echo ' last">';
		} else {
			echo '">';
		}
		
		// This is where you run the code and display the output
		echo '<div class="infoimg">';
		echo '<img src="'.$image.'" width="60" height="60" alt=""/>';
        echo '</div>';
        echo $args['before_title'] . $title . $args['after_title'];
        echo '<p>'.$content;
		if($link != '') echo ' <a href="'.$link.'">Read More &raquo;</a>';
		echo '</p>';
		
		echo $args['after_widget'];
		}
				
		// Widget Backend 
		public function form( $instance ) {
		if ( isset( $instance[ 'image' ] ) ) {
			$image = $instance[ 'image' ];
		} else {
			$image ='';
		}
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title ='';
		}
		if ( isset( $instance[ 'content' ] ) ) {
			$content = $instance[ 'content' ];
		} else {
			$content ='';
		}
		if ( isset( $instance[ 'last' ] ) ) {
			$last = $instance[ 'last' ];
		} else {
			$last ='';
		}
		if ( isset( $instance[ 'link' ] ) ) {
			$link = $instance[ 'link' ];
		} else {
			$link ='';
		}
		// Widget admin form
		?>
		<p>
        <img class="custom_media_image" src="<?php echo esc_attr( $image ); ?>" width="48" height="48" />
		<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image URL:' ); ?></label> 
		<input class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>" /><input type="button" class="button action custom_media_upload" value="Upload Image" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" type="text"><?php echo esc_attr( $content ); ?></textarea>
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Read More Link:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
        <br/><i>Please use relative links such as <code>/sub-page/page-name/</code>.</i>
		</p>
        <p>
		<label for="<?php echo $this->get_field_id( 'last' ); ?>"><?php _e( 'Last Box?' ); ?></label> 
		<input id="<?php echo $this->get_field_id( 'last' ); ?>" name="<?php echo $this->get_field_name( 'last' ); ?>" <?php if(esc_attr( $last ) == 1) echo 'checked="checked"'; ?> type="checkbox" value="1" /><br/><i>Only select this for the last box, this will fix margin issues.</i>
		</p>
        
		<?php 
		}
			
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['content'] = ( ! empty( $new_instance['content'] ) ) ? strip_tags( $new_instance['content'] ) : '';
		$instance['last'] = ( ! empty( $new_instance['last'] ) ) ? strip_tags( $new_instance['last'] ) : '';
		$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
		return $instance;
		}
	} // Class wpb_widget ends here
	
	// Register and load the widget
	function wpb_load_widget() {
		register_widget( 'wpb_widget' );
	}
	add_action( 'widgets_init', 'wpb_load_widget' );
	
	function my_enqueue($hook) {
		wp_enqueue_media();
		wp_enqueue_script( 'my_custom_script', '/wp-content/themes/top10_theme/js/admin-js.js' );
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-slider');
		wp_register_style( 'custom_wp_admin_css', 'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css	', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
	}
	
	add_action( 'admin_enqueue_scripts', 'my_enqueue' );
	
	

	add_action( 'admin_head-nav-menus.php', 'inject_cpt_archives_menu_meta_box');
	  function inject_cpt_archives_menu_meta_box( $object ) {
		add_meta_box( 'add-cpt', __( 'CPT Archives' ), 'wp_nav_menu_cpt_archives_meta_box', 'nav-menus', 'side', 'default' );
	
		return $object; /* pass */
	  }
	
	  /* render custom post type archives meta box */
	  function wp_nav_menu_cpt_archives_meta_box() {
		/* get custom post types with archive support */
		$post_types = get_post_types( array( 'show_in_nav_menus' => true, 'has_archive' => true ), 'object' );    
		
		/* hydrate the necessary object properties for the walker */
		foreach ( $post_types as &$post_type ) {
			$post_type->classes = array();
			$post_type->type = $post_type->name;
			$post_type->object_id = $post_type->name;
			$post_type->title = $post_type->labels->name . ' ' . __( 'Archive', 'default' );
			$post_type->object = 'cpt-archive';
		}
	
	
		$walker = new Walker_Nav_Menu_Checklist( array() );
	
		?>
		<div id="cpt-archive" class="posttypediv">
		  <div id="tabs-panel-cpt-archive" class="tabs-panel tabs-panel-active">
			<ul id="ctp-archive-checklist" class="categorychecklist form-no-clear">
			  <?php
				echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $post_types), 0, (object) array( 'walker' => $walker) );
			  ?>
			</ul>
		  </div><!-- /.tabs-panel -->
		</div>
		<p class="button-controls">
		  <span class="add-to-menu">
			<img class="waiting" src="<?php echo esc_url( admin_url( 'images/wpspin_light.gif' ) ); ?>" alt="" />
			<input type="submit"<?php disabled( $nav_menu_selected_id, 0 ); ?> class="button-secondary submit-add-to-menu" value="<?php esc_attr_e('Add to Menu'); ?>" name="add-ctp-archive-menu-item" id="submit-cpt-archive" />
		  </span>
		</p>
		<?php
	  }
	
	  add_filter( 'wp_get_nav_menu_items', 'cpt_archive_menu_filter', 10, 3 );
	  function cpt_archive_menu_filter( $items, $menu, $args ) {
		/* alter the URL for cpt-archive objects */
		foreach ( $items as &$item ) {
		  if ( $item->object != 'cpt-archive' ) continue;
		  $item->url = get_post_type_archive_link( $item->type );
		}
	
		return $items;
	  }
	  
	  add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2 );
		function current_type_nav_class($classes, $item) {
			$post_type = get_post_type();
			if ($item->attr_title != '' && $item->attr_title == $post_type && !is_tax()) {
				array_push($classes, 'current-menu-item');
			};
			return $classes;
		}
		
			// Add term page
			function pippin_taxonomy_add_new_meta_field() {
				// this will add the custom meta field to the add new term page
				echo '<div class="form-field">
					<label for="term_meta[custom_term_meta]">Page Title</label>
					<input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="">
					<p class="description">Enter a value for this field</p>
				</div>';
				echo '<div class="form-field">
					<label for="term_meta[custom_term_meta2]">Sub Title</label>
					<input type="text" name="term_meta[custom_term_meta2]" id="term_meta[custom_term_meta2]" value="">
					<p class="description">Enter a value for this field</p>
				</div>';
				echo '<div class="form-field">
					<label for="term_meta[custom_term_meta3]">H1</label>
					<input type="text" name="term_meta[custom_term_meta3]" id="term_meta[custom_term_meta3]" value="">
					<p class="description">Enter a value for this field</p>
				</div>';

			}
			add_action( 'builder-type_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2 );
			
			function pippin_taxonomy_edit_meta_field($term) {
 
				// put the term ID into a variable
				$t_id = $term->term_id;
			 
				// retrieve the existing value(s) for this meta field. This returns an array
				$term_meta = get_option( "taxonomy_$t_id" ); 
				echo '<tr class="form-field">
				<th scope="row" valign="top"><label for="term_meta[custom_term_meta]">Page Title</label></th>
					<td>
						<input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="'.esc_attr( $term_meta['custom_term_meta'] ) .'">
						<p class="description">Enter a value for this field</p>
					</td>
				</tr>';
				echo '<tr class="form-field">
				<th scope="row" valign="top"><label for="term_meta[custom_term_meta2]">Subtitle</label></th>
					<td>
						<input type="text" name="term_meta[custom_term_meta2]" id="term_meta[custom_term_meta2]" value="'.esc_attr( $term_meta['custom_term_meta2'] ) .'">
						<p class="description">Enter a value for this field</p>
					</td>
				</tr>';
				echo '<tr class="form-field">
				<th scope="row" valign="top"><label for="term_meta[custom_term_meta2]">H1</label></th>
					<td>
						<input type="text" name="term_meta[custom_term_meta3]" id="term_meta[custom_term_meta3]" value="'.esc_attr( $term_meta['custom_term_meta3'] ) .'">
						<p class="description">Enter a value for this field</p>
					</td>
				</tr>';

			}
			add_action( 'builder-type_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2 );
			
			function save_taxonomy_custom_meta( $term_id ) {
				if ( isset( $_POST['term_meta'] ) ) {
					$t_id = $term_id;
					$term_meta = get_option( "taxonomy_$t_id" );
					$cat_keys = array_keys( $_POST['term_meta'] );
					foreach ( $cat_keys as $key ) {
						if ( isset ( $_POST['term_meta'][$key] ) ) {
							$term_meta[$key] = $_POST['term_meta'][$key];
						}
					}
					// Save the option array.
					update_option( "taxonomy_$t_id", $term_meta );
				}
			}  
			add_action( 'edited_builder-type', 'save_taxonomy_custom_meta', 10, 2 );  
			add_action( 'create_builder-type', 'save_taxonomy_custom_meta', 10, 2 );
			
	function topten_tick($value = false) {
		if($value)	{
			echo '<img src="'.get_stylesheet_directory_uri().'/images/tick.png" />';
		} else {
			echo '<img src="'.get_stylesheet_directory_uri().'/images/cross.png" />';
		}
	}
	
	function topten_systems($value) {
		if(is_array($value)) {
			foreach($value as $system) {
				switch($system) {
					case 'windows' :
						echo '<img src="'.get_stylesheet_directory_uri().'/images/windows.png" /><br/>';
						break;
					case 'osx' :
						echo '<img src="'.get_stylesheet_directory_uri().'/images/osx.png" /><br/>';
						break;
					case 'linux' : 
						echo '<img src="'.get_stylesheet_directory_uri().'/images/linux.png" /><br/>';
						break;
				}
			}
		}
	}
	
	function output_cpt_header() {
		global $wp_query;
				$term = $wp_query->get_queried_object();
				$slug = $term->rewrite['slug'];
				$type = $term->post_type;
				if($type != '') {
						$cpt = $type;
					} else {
						$cpt = $slug;
					}
				if($cpt == 'online-fax-services') {
					$cpt = 'online-fax';
				} elseif($cpt == 'backup-software') {
					$cpt = 'data-storage';
				}
				$values = get_option( 'cpt_titles_option' );
				echo wpautop(stripslashes($values[$cpt]['intro']));	
	}
	
	function top10_footer_table() {
		if(!is_front_page() && !is_page() && !is_singular('post') && !is_home() && !is_404()) {
			global $wp_query;
			$term = $wp_query->get_queried_object();
			$slug = $term->rewrite['slug'];
			//echo '<pre>'.print_r($term, true).'</pre>';
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
		} else {
			$args = array(
			   'public'   => true,
			   '_builtin' => false,
			   'hierarchical' => true,
			);
			
			$output = 'objects'; // names or objects, note names is the default
			$operator = 'and'; // 'and' or 'or'
			$cpt_choices = array();
			$post_types = get_post_types( $args, $output, $operator );
			foreach ( $post_types  as $post_type ) {
				$cpt_choices[] = $post_type->name;	
			}
			$rand = rand(0, count($post_types)-1);
			$cpt = $cpt_choices[$rand];
		}
		$cpt_title = str_replace('-', ' ', $cpt);
		$cpt_title = ucwords($cpt_title);
		?>
        	<h4>Top <?php echo $cpt_title; ?></h4>
            	<table id="listings" style="width: 100%;">
                    <?php
						if($cpt == 'website-builders') {
							$args = array(
								'post_type' => 'website-builders',
								'builder-type' => 'homepage',
								'orderby' => 'menu_order',
								'order' => 'ASC',
								'posts_per_page' => 5
							);
						} else {
							$cpt_prefix = '';
							$args = array(
								'post_type' => $cpt,
								'orderby' => 'menu_order',
								'order' => 'ASC',
								'posts_per_page' => 5
							);	
							switch($cpt) {
								case 'project-management' :
									$cpt_prefix = 'pm_';
									break;
								case 'cloud-storage' :
									$cpt_prefix = 'cs_';
									break;
							}
						}
						$loop = new WP_Query($args);
						// The Loop
						if($loop->have_posts()) :
						$i = 0;
				?>
                    <?php
						while( $loop->have_posts() ) : 
						$loop->the_post();
					?>	
                    <?php if($cpt == 'website-builders') { ?>
						<?php $meta = get_post_meta( get_the_ID() ); ?>
                        <?php if($i == 0) { echo '<tr class="first">'; } else { echo '<tr>';  } $i ++; ?>
                            <td class="bignumber"><?php echo $i; ?></td>
                            <td><a href="<?php echo $meta['topten_link'][0]; ?>"><?php the_post_thumbnail('foot-thumb'); ?></a></td>
                          <td>
                                <div class="review">
                                    <?php topten_calcreview($meta['topten_rating'][0]) ;?>
                               </div>
                               <p><a class="viedwreviewlink" href="<?php the_permalink(); ?>">Read Review</a> | <a class="footgo" href="<?php echo $meta['topten_link'][0]; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/go-button.png"></a></p>
                          </td>
                         </tr>
                    <?php } else { ?>
                        <?php if($i == 0) { echo '<tr class="first">'; } else { echo '<tr>';  } $i ++; ?>
                            <td class="bignumber"><?php echo $i; ?></td>
                            <td><a href="<?php echo get_field($cpt_prefix.'link'); ?>"><?php the_post_thumbnail('foot-thumb'); ?></a></td>
                          <td>
                                <div class="review">
                                    <?php topten_calcreview(get_field($cpt_prefix.'table_rating')) ;?>
                               </div>
                               <p><a class="viedwreviewlink" href="<?php the_permalink(); ?>">Read Review</a> | <a class="footgo" href="<?php echo get_field($cpt_prefix.'link'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/go-button.png"></a></p>
                          </td>
                         </tr>
                    <?php } ?>
                    <?php
						//$i++;
						endwhile; // end of the loop. 
						wp_reset_postdata();
					?>
                    <?php else: ?>
                    <tr><td colspan="8">No posts found.</td></tr>
                    <?php endif; ?>
                </table>
                
        <?php	
	}
	function the_review_title() {
		global $wp_query;
		$term = $wp_query->get_queried_object();
		//print_r($term);
		$slug = $term->rewrite['slug'];
		$type = $term->post_type;
		if($type != '') {
				$cpt = $type;
			} else {
				$cpt = $slug;
			}
		$values = get_option( 'cpt_titles_option' );
		$title = $values[$cpt]['title'];
		if($title == '') {
			echo get_the_title($post->ID);
		} else {
			$gettitle = get_the_title($post->ID);
			$newtitle = str_replace('%title%', $gettitle, $title);
			echo $newtitle;
		}
	}
