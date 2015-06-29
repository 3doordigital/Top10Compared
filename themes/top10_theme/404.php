<?php get_header(); ?>
    	<div id="main" class="wrapper">
        <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<div id="breadcrumbs">','</div>');
} ?>
        	<div id="content" class="page">
            
            	
                <?php $values = get_option( 'cpt_titles_option' ); echo wpautop($values['404']['intro']); ?>
            </div>
            <div id="sidebar">
            	<?php dynamic_sidebar( 'blog-sidebar' ); ?>
            </div>
            <div class="clear"></div>
    </div>
<?php get_footer(); ?>