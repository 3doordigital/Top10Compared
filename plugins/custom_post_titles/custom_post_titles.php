<?php
/*
Plugin Name: Custom Post Titles
Description: Adds header titles to each custom post type
Version: 1.0
Author: Dan Taylor
Author URI: http://www.dantaylor.co
*/
?>
<?php

    add_action( 'admin_enqueue_scripts', 'jk_load_dashicons' );
    function jk_load_dashicons() {
        wp_enqueue_style( 'dashicons' );
    }

    
	add_action( 'admin_menu', 'cpt_titles_create_menu' );
	
	function cpt_titles_create_menu() {
		add_menu_page( 'Section Titles', 'Section Titles', 'manage_options', __FILE__, 'cpt_titles_page', 'dashicons-editor-textcolor', 58 ); 	
	}
	
	function cpt_titles_page() {
		
		if(isset($_POST['cpt_titles_submit'])) {
				$array = get_option( 'cpt_titles_option' );
				foreach($_POST as $key=>$value) {
					$array[$key]['h1'] = $value['h1'];
					$array[$key]['h2'] = $value['h2'];
					$array[$key]['intro'] = $value['intro'];
					$array[$key]['title'] = $value['title'];
                    $array[$key]['live'] = $value['live'];
				}
				//print_r($array);
				
				update_option('cpt_titles_option', $array);
				$_GET['updated'] = 'true';

		}
		
		$args = array(
		   'public'   => true,
		   '_builtin' => false,
		   'hierarchical' => true,
		);
		
		$output = 'objects'; // names or objects, note names is the default
		$operator = 'and'; // 'and' or 'or'
		
		$post_types = get_post_types( $args, $output, $operator );
		
		$values = get_option( 'cpt_titles_option' );
		?>
        	<div class="wrap">
            	<h2>Section Titles</h2>
                <p>Use the below form to add the section headings to the listings pages</p>
                
                <?php if(!isset($_GET['edit']) || isset($_GET['updated'])) {
						if(isset($_GET['updated'])) {
								echo '<div class="updated">
									<p>Titles Updated</p>
								</div>';
						}
					 ?>
                     <style>
					 	.inline-edit-row h3 {
							margin: 0;
							margin-bottom: 5px;	
							text-align: center;
						}
						.inline-edit-row p {
							text-align: center;	
						}
                         .tick:before {
                            font-family: "dashicons";
                            content: "\f100";
                        }  
					 </style>
                <table class="widefat fixed" cellspacing="0">
                    <thead>
                    <tr>
                
                            <th width="150" id="columnname" class="manage-column column-section" scope="col">Section Name</th>
                            <th width="50" id="columnname" class="manage-column column-sectionh1" scope="col">Live?</th>     
                            <th width="150" id="columnname" class="manage-column column-sectionh1" scope="col">H1</th> 
                            <th width="150" id="columnname" class="manage-column column-sectionh2" scope="col">H2</th> 
                            <th id="columnname" class="manage-column column-sectionh2" style="text-align: center;" scope="col">Intro</th> 
                    </tr>
                    </thead>
                
                    
                
                    <tbody>
                    	<?php
							foreach ( $post_types  as $post_type ) {
						?>
                        <tr valign="top"> 
                            <td class="column-section">
                            <?php echo $post_type->labels->name; ?>
                            <div class="actions">
                            	<span><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&edit=<?php echo $post_type->name; ?>">Edit</a></span>
                            </div>
                            </td>
                            <td class="column-sectionh1 inline-edit-row "><?php if($values[$post_type->name]['live'] == 1) { echo '<span class="dashicons-before dashicons-yes"></span>'; } else { echo '<span class="dashicons-before dashicons-no"></span>'; } ?></td>
                            <td class="column-sectionh1 inline-edit-row "><?php echo $values[$post_type->name]['h1']; ?></td>
                            <td class="column-sectionh2 inline-edit-row "><?php echo $values[$post_type->name]['h2']; ?></td>
                            <td class="column-sectionh2 inline-edit-row "><?php echo wpautop($values[$post_type->name]['intro']); ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                        <h2>Core Page Titles</h2>
                        <table class="widefat fixed" cellspacing="0">
                        <thead>
                        <tr>
                    
                                <th width="150" id="columnname" class="manage-column column-section" scope="col">Section Name</th>
                                <th width="150" id="columnname" class="manage-column column-sectionh1" scope="col">H1</th> 
                                <th width="150" id="columnname" class="manage-column column-sectionh2" scope="col">H2</th> 
                                <th id="columnname" class="manage-column column-sectionh2" style="text-align: center;" scope="col">Intro</th> 
                        </tr>
                        </thead>
                        <tbody>
                        <tr valign="top"> 
                            <td class="column-section">
                            Blog
                            <div class="actions">
                            	<span><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&edit=blog">Edit</a></span>
                            </div>
                            </td>
                            <td class="column-sectionh1 inline-edit-row "><?php echo $values['blog']['h1']; ?></td>
                            <td class="column-sectionh2 inline-edit-row "><?php echo $values['blog']['h2']; ?></td>
                            <td class="column-sectionh2 inline-edit-row "><?php echo wpautop($values['blog']['intro']); ?></td>
                        </tr>
                        <tr valign="top"> 
                            <td class="column-section">
                            404
                            <div class="actions">
                            	<span><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&edit=404">Edit</a></span>
                            </div>
                            </td>
                            <td class="column-sectionh1 inline-edit-row "><?php echo $values['404']['h1']; ?></td>
                            <td class="column-sectionh2 inline-edit-row "><?php echo $values['404']['h2']; ?></td>
                            <td class="column-sectionh2 inline-edit-row "><?php echo wpautop($values['404']['intro']); ?></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                
				<?php } else { ?>
                <form method="post">
                <table class="form-table">
                	<tr>
                    	<th>Section Live?</th>
                        <td class="inline-edit-row"><span class="input-text-wrap"><input class="" type="checkbox" name="<?php echo $_GET['edit']; ?>[live]" value="1" <?php echo ( $values[$_GET['edit']]['live'] == 1 ? 'checked' : '') ; ?>></span><p class="description">Tick this box to make the section live.</p></td>
                    </tr>
                    <tr>
                    	<th>Title Format</th>
                        <td class="inline-edit-row"><span class="input-text-wrap"><input class="regular-text code" type="text" name="<?php echo $_GET['edit']; ?>[title]" value="<?php echo $values[$_GET['edit']]['title']; ?>" ></span><p class="description">Use %title% to output the title of the page eg. %title% Cloud Storage Review</p></td>
                    </tr>
                    <tr>
                    	<th>Main Heading</th>
                        <td class="inline-edit-row"><span class="input-text-wrap"><input class="regular-text code" type="text" name="<?php echo $_GET['edit']; ?>[h1]" value="<?php echo $values[$_GET['edit']]['h1']; ?>" ></span></td>
                    </tr>
                    <tr>
                    	<th>Sub Heading</th>
                        <td class="inline-edit-row"><span class="input-text-wrap"><input class="regular-text code" type="text" name="<?php echo $_GET['edit']; ?>[h2]" value="<?php echo $values[$_GET['edit']]['h2']; ?>" ></span></td>
                    </tr>
                    <tr>
                    	<th>Intro Content</th>
                        <td>
                        	<?php
								$settings = array( 
											'media_buttons' => false,
											'textarea_name' => $_GET['edit'].'[intro]'
											);
								wp_editor( stripslashes($values[$_GET['edit']]['intro']), $_GET['edit'], $settings );
							?>
                        </td>
                    </tr>
                </table>
                <button class="button-primary save" name="cpt_titles_submit" type="submit">Save Changes</button>
                </form>
                <?php } ?>
                
				
                
				
				
                
            </div>
            
            
        <?php
	}