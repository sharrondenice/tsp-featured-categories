<?php

// Default settings at install
$TSPFC_DEFAULTS        = array(
		'title'        => 'TSP Featured Categories',
		'numbercats'   => 5,
		'parentcat'       => '',
		'cattype'      => 'all',
		'hideempty'   => 1,
		'hidedesc'     => 'N',
		'maxdesc'      => 60,
		'layout'       => 0,
		'orderby'      => 'ID',
		'widththumb'   => 80,
		'heightthumb'  => 80,
		'beforetitle'  => '<h3>',
		'aftertitle'   => '</h3>'
	);
    
// These fields for the settings block which is located at the admin setting TSP Featured Posts page
$TSPFC_ADMIN_FIELDS = array (
		array( 'title', 'TEXT', __( 'Title', 'tsp_featured_categories' ), __( 'Title', 'tsp_featured_categories' ) ),
		array( 'numbercats', 'TEXT', __( 'How many categories do you want to display?', 'tsp_featured_categories' ), __( 'How many categories do you want to display', 'tsp_featured_categories' ) ),
		array( 'parentcat', 'TEXT', __( 'Category ID of Parent Category', 'tsp_featured_categories' ), __( 'Category ID of Parent Category', 'tsp_featured_categories' ) ),
		array( 'cattype', 'SELECT', __( 'Category Type', 'tsp_featured_categories' ), __( 'Category Type', 'tsp_featured_categories' ) ),
		array( 'hideempty', 'SELECT', __( 'Hide Empty Categories?', 'tsp_featured_categories' ), __( 'Hide Empty Categories?', 'tsp_featured_categories' ) ),
		array( 'hidedesc', 'SELECT', __( 'Hide Category Description?', 'tsp_featured_categories' ), __( 'Hide Category Description?', 'tsp_featured_categories' ) ),
		array( 'maxdesc', 'TEXT', __( 'Max chars to display for description', 'tsp_featured_categories' ), __( 'Max chars to display for description', 'tsp_featured_categories' ) ),
		array( 'layout', 'SELECT', __( 'Choose category layout', 'tsp_featured_categories' ), __( 'Choose category layout', 'tsp_featured_categories' ) ),
		array( 'orderby', 'SELECT', __( 'Choose how the categories will be ordered', 'tsp_featured_categories' ), __( 'Choose how the categories will be ordered', 'tsp_featured_categories' ) ),
		array( 'widththumb', 'TEXT', __( 'Thumbnail Width', 'tsp_featured_categories' ), __( 'Thumbnail Width', 'tsp_featured_categories' ) ),
		array( 'heightthumb', 'TEXT', __( 'Thumbnail Height', 'tsp_featured_categories' ), __( 'Thumbnail Height', 'tsp_featured_categories' ) ),
		array( 'beforetitle', 'TEXT', __( 'HTML Before Title', 'tsp_featured_categories' ), __( 'HTML Before Title', 'tsp_featured_categories' ) ),
		array( 'aftertitle', 'TEXT', __( 'HTML After Title', 'tsp_featured_categories' ), __( 'HTML After Title', 'tsp_featured_categories' ) ),
);


if (! function_exists('fn_tsp_plugins_add_menu_render') ){
	function fn_tsp_plugins_add_menu_render()
	{
		global $title;
		$active_plugins = get_option('active_plugins');
		$all_plugins = get_plugins();
	
		$array_activate = array();
		$array_install	= array();
		$array_recomend = array();
		$count_activate = $count_install = $count_recomend = 0;
		$array_plugins	= array(
			array( 'tsp_featured_categories\/tsp_featured_categories.php', 'Featured Categories', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/featured-categories-for-wordpress.html', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/featured-categories-for-wordpress.html', '/wp-admin/plugin-install.php?tab=search&type=term&s=TSP+Featured+Categories&plugin-search-input=Search+Plugins', 'admin.php?page=tsp_featured_categories.php' ), 
			array( 'tsp_featured_posts\/tsp_featured_posts.php', 'Featured Posts', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/featured-posts-for-wordpress.html', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/featured-posts-for-wordpress.html', '/wp-admin/plugin-install.php?tab=search&type=term&s=TSP+Featured+Posts&plugin-search-input=Search+Plugins', 'admin.php?page=tsp_featured_posts.php' ), 
			array( 'tsp_facepile\/tsp_facepile.php', 'Facepile', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/facepile-for-wordpress.html', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/facepile-for-wordpress.html', '/wp-admin/plugin-install.php?tab=search&type=term&s=TSP+Facepile&plugin-search-input=Search+Plugins', 'admin.php?page=tsp_facepile.php' ), 
			array( 'tsp_disable_autosave\/tsp_disable_autosave.php', 'Disable Auto-Save', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/disable-autosave-for-wordpress.html', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/disable-autosave-for-wordpress.html', '/wp-admin/plugin-install.php?tab=search&type=term&s=TSP+Disable+Autosave&plugin-search-input=Search+Plugins', '#' ), 
		);
		foreach ( $array_plugins as $plugins ) {
			if( 0 < count( preg_grep( "/".$plugins[0]."/", $active_plugins ) ) ) {
				$array_activate[$count_activate]["title"] = $plugins[1];
				$array_activate[$count_activate]["link"] = $plugins[2];
				$array_activate[$count_activate]["href"] = $plugins[3];
				$array_activate[$count_activate]["url"]	= $plugins[5];
				$count_activate++;
			} else if ( array_key_exists(str_replace( "\\", "", $plugins[0]), $all_plugins ) ) {
				$array_install[$count_install]["title"] = $plugins[1];
				$array_install[$count_install]["link"]	= $plugins[2];
				$array_install[$count_install]["href"]	= $plugins[3];
				$count_install++;
			} else {
				$array_recomend[$count_recomend]["title"] = $plugins[1];
				$array_recomend[$count_recomend]["link"] = $plugins[2];
				$array_recomend[$count_recomend]["href"] = $plugins[3];
				$array_recomend[$count_recomend]["slug"] = $plugins[4];
				$count_recomend++;
			}
		}
		$array_activate_pro = array();
		$array_install_pro	= array();
		$array_recomend_pro = array();
		$count_activate_pro = $count_install_pro = $count_recomend_pro = 0;
		$array_plugins_pro	= array(
		);
		foreach ( $array_plugins_pro as $plugins ) {
			if( 0 < count( preg_grep( "/".$plugins[0]."/", $active_plugins ) ) ) {
				$array_activate_pro[$count_activate_pro]["title"] = $plugins[1];
				$array_activate_pro[$count_activate_pro]["link"] = $plugins[2];
				$array_activate_pro[$count_activate_pro]["href"] = $plugins[3];
				$array_activate_pro[$count_activate_pro]["url"]	= $plugins[4];
				$count_activate_pro++;
			} else if( array_key_exists(str_replace( "\\", "", $plugins[0]), $all_plugins ) ) {
				$array_install_pro[$count_install_pro]["title"] = $plugins[1];
				$array_install_pro[$count_install_pro]["link"]	= $plugins[2];
				$array_install_pro[$count_install_pro]["href"]	= $plugins[3];
				$count_install_pro++;
			} else {
				$array_recomend_pro[$count_recomend_pro]["title"] = $plugins[1];
				$array_recomend_pro[$count_recomend_pro]["link"] = $plugins[2];
				$array_recomend_pro[$count_recomend_pro]["href"] = $plugins[3];
				$count_recomend_pro++;
			}
		} ?>
		<div class="wrap">
			<div class="icon32 icon32-tsp" id="icon-options-general"></div>
			<h2><?php echo $title;?></h2>
			<h3 style="color: #B4100E;"><?php _e( 'Professional WordPress Plugins', 'tsp_plugins' ); ?></h3>
				<?php if( 0 < $count_activate_pro ) { ?>
				<div style="padding-left:15px;">
					<h4><?php _e( 'Activated plugins', 'tsp_plugins' ); ?></h4>
					<?php foreach ( $array_activate_pro as $activate_plugin ) { ?>
					<div style="float:left; width:200px;"><?php echo $activate_plugin["title"]; ?></div> <p><a href="<?php echo $activate_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_plugins' ); ?></a> <a href="<?php echo $activate_plugin["url"]; ?>"><?php echo __( "Settings", 'tsp_plugins' ); ?></a></p>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if( 0 < $count_install_pro ) { ?>
				<div style="padding-left:15px;">
					<h4><?php _e( 'Installed plugins', 'tsp_plugins' ); ?></h4>
					<?php foreach ( $array_install_pro as $install_plugin) { ?>
					<div style="float:left; width:200px;"><?php echo $install_plugin["title"]; ?></div> <p><a href="<?php echo $install_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_plugins' ); ?></a></p>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if( 0 < $count_recomend_pro ) { ?>
				<div style="padding-left:15px;">
					<h4><?php _e( 'Recommended plugins', 'tsp_plugins' ); ?></h4>
					<?php foreach ( $array_recomend_pro as $recomend_plugin ) { ?>
					<div style="float:left; width:200px;"><?php echo $recomend_plugin["title"]; ?></div> <p><a href="<?php echo $recomend_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_plugins' ); ?></a> <a href="<?php echo $recomend_plugin["href"]; ?>" target="_blank"><?php echo __( "Purchase", 'tsp_plugins' ); ?></a></p>
					<?php } ?>
				</div>
				<?php } ?>
			<br />
			<h3 style="color: #1A77B1"><?php _e( 'Free WordPress Plugins', 'tsp_plugins' ); ?></h3>
				<?php if( 0 < $count_activate ) { ?>
				<div style="padding-left:15px;">
					<h4><?php _e( 'Activated plugins', 'tsp_plugins' ); ?></h4>
					<?php foreach( $array_activate as $activate_plugin ) { ?>
					<div style="float:left; width:200px;"><?php echo $activate_plugin["title"]; ?></div> <p><a href="<?php echo $activate_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_plugins' ); ?></a> <a href="<?php echo $activate_plugin["url"]; ?>"><?php echo __( "Settings", 'tsp_plugins' ); ?></a></p>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if( 0 < $count_install ) { ?>
				<div style="padding-left:15px;">
					<h4><?php _e( 'Installed plugins', 'tsp_plugins' ); ?></h4>
					<?php foreach ( $array_install as $install_plugin ) { ?>
					<div style="float:left; width:200px;"><?php echo $install_plugin["title"]; ?></div> <p><a href="<?php echo $install_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_plugins' ); ?></a></p>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if( 0 < $count_recomend ) { ?>
				<div style="padding-left:15px;">
					<h4><?php _e( 'Recommended plugins', 'tsp_plugins' ); ?></h4>
					<?php foreach ( $array_recomend as $recomend_plugin ) { ?>
					<div style="float:left; width:200px;"><?php echo $recomend_plugin["title"]; ?></div> <p><a href="<?php echo $recomend_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_plugins' ); ?></a> <a href="<?php echo $recomend_plugin["href"]; ?>" target="_blank"><?php echo __( "Download", 'tsp_plugins' ); ?></a> <a class="install-now" href="<?php echo get_bloginfo( "url" ) . $recomend_plugin["slug"]; ?>" title="<?php esc_attr( sprintf( __( 'Install %s' ), $recomend_plugin["title"] ) ) ?>" target="_blank"><?php echo __( 'Install now from wordpress.org', 'tsp_plugins' ) ?></a></p>
					<?php } ?>
				</div>
				<?php } ?>	
			<br />		
			<span style="color: rgb(136, 136, 136); font-size: 10px;"><?php _e( 'If you have any questions, please contact us via', 'tsp_plugins' ); ?> <a href="http://www.thesoftwarepeople.com/about-us/contact-us.html">http://www.thesoftwarepeople.com/about-us/contact-us.html</a></span>
		</div>
	<?php } 
}

// Function for display captcha settings page in the admin area
function fn_tsp_featured_categories_settings_page() {
	global $TSPFC_ADMIN_FIELDS;
	global $TSPFC_OPTIONS;

	$error = "";
	
	// Save data for settings page
	if( isset( $_REQUEST['tspfc_form_submit'] ) && check_admin_referer( plugin_basename(__FILE__), 'tspfc_nonce_name' ) ) {
		$tspfc_request_options = array();
		
		foreach( $TSPFC_OPTIONS as $key => $val ) 
		{
			$tspfc_request_options[$key] = $_REQUEST[$key];
		}
		
		// array merge incase this version has added new options
		$TSPFC_OPTIONS = array_merge( $TSPFC_OPTIONS , $tspfc_request_options );

		update_option( 'tsp_featured_categories_options', $TSPFC_OPTIONS );
		$message = __( "Options saved.", 'tsp_featured_categories' );
	}

	// Display form on the setting page
?>
<div class="tsp_container">
	<div class="icon32 tsp_icon" id="tsp_icon-options-general"></div>
	<h2><?php _e('Featured Categories Shortcode Settings (The Software People)', 'tsp_featured_categories' ); ?></h2>
	<div class="row">
		<div class="4u">
			<div class="updated fade" <?php if( ! isset( $_REQUEST['tspfc_form_submit'] ) || $error != "" ) echo "style=\"display:none\""; ?>><p><strong><?php echo $message; ?></strong></p></div>
			<div class="error" <?php if( "" == $error ) echo "style=\"display:none\""; ?>><p><strong><?php echo $error; ?></strong></p></div>
			<form method="post" action="admin.php?page=tsp_featured_categories.php">
				<fieldset>
				<?php foreach ($TSPFC_ADMIN_FIELDS as $fields): ?>
					<div class="tsp_form_element" id="<?php echo $fields[0]; ?>_container_div" style="">
						<label for="<?php echo $fields[0]; ?>"><?php echo __( $fields[2], 'tsp_featured_categories' ); ?></label>
						
						<?php if ($fields[1] == 'TEXT'): ?>
						   <input id="<?php echo $fields[0]; ?>" name="<?php echo $fields[0]; ?>" value="<?php echo $TSPFC_OPTIONS[$fields[0]]; ?>" />
						<?php elseif ($fields[1] == 'SELECT'): ?>
							<?php if ($fields[0] == 'cattype'): ?>
							   <select name="<?php echo $fields[0]; ?>" id="<?php echo $fields[0]; ?>" >
							      <option class="level-0" value="all" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "all") echo " selected='selected'" ?>><?php
							        _e('All', 'tsp_featured_categories') ?></option>
							      <option class="level-0" value="featured" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "featured") echo " selected='selected'" ?>><?php
							        _e('Featured Only', 'tsp_featured_categories') ?></option>
							   </select>
							<?php elseif ($fields[0] == 'hideempty'): ?>
							   <select name="<?php echo $fields[0]; ?>" id="<?php echo $fields[0]; ?>" >
							      <option class="level-0" value="1" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == 1) echo " selected='selected'" ?>><?php
							        _e('Yes', 'tsp_featured_categories') ?></option>
							      <option class="level-0" value="0" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == 0) echo " selected='selected'" ?>><?php
							        _e('No', 'tsp_featured_categories') ?></option>
							   </select>
							<?php elseif ($fields[0] == 'hidedesc'): ?>
							   <select name="<?php echo $fields[0]; ?>" id="<?php echo $fields[0]; ?>" >
							      <option class="level-0" value="Y" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "Y") echo " selected='selected'" ?>><?php
							        _e('Yes', 'tsp_featured_categories') ?></option>
							      <option class="level-0" value="N" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "N") echo " selected='selected'" ?>><?php
							        _e('No', 'tsp_featured_categories') ?></option>
							   </select>
							<?php elseif ($fields[0] == 'layout'): ?>
							   <select name="<?php echo $fields[0]; ?>" id="<?php echo $fields[0]; ?>" >
							      <option class="level-0" value="0" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "0") echo " selected='selected'" ?>><?php
        							_e('Image (left), Title, Text (right) [Horizontal]', 'tsp_featured_categories') ?></option>
							      <option class="level-0" value="1" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "1") echo " selected='selected'" ?>><?php
        							_e('Image (left), Title, Text (right) [Vertical]', 'tsp_featured_categories') ?></option>
							      <option class="level-0" value="2" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "2") echo " selected='selected'" ?>><?php
  							        _e('Scrolling Gallery [Horizontal]', 'tsp_featured_categories') ?></option>
							   </select>
							<?php elseif ($fields[0] == 'orderby'): ?>
							   <select name="<?php echo $fields[0]; ?>" id="<?php echo $fields[0]; ?>" >
							      <option class="level-0" value="none" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "none") echo " selected='selected'" ?>><?php
							        _e('None', 'tsp_featured_categories') ?></option>
							      <option class="level-0" value="name" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "name") echo " selected='selected'" ?>><?php
							        _e('Title', 'tsp_featured_categories') ?></option>
							      <option class="level-0" value="count" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "count") echo " selected='selected'" ?>><?php
							        _e('Count', 'tsp_featured_categories') ?></option>
							      <option class="level-0" value="ID" <?php
							        if ($TSPFC_OPTIONS[$fields[0]] == "ID") echo " selected='selected'" ?>><?php
							        _e('ID', 'tsp_featured_categories') ?></option>
							   </select>
							<?php endif; ?>
						<?php endif; ?>
						
						<div class="clear"></div>
						<div id="error-message-name"></div>
					</div>
				<?php endforeach; ?>
				</fieldset>
				<input type="hidden" name="tspfc_form_submit" value="submit" />
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
				</p>
				<?php wp_nonce_field( plugin_basename(__FILE__), 'tspfc_nonce_name' ); ?>
			</form>
		</div><!-- 4u -->
		<div class="8u">
			<div class="mycomment">
				<p><h3>Using Featured Categories Shortcode <a href="#" class="toggle">(hide/show details)</a>:</h3></p>
				<div class="note-details">
					<ul style="list-style-type:square;">
						<li>Changing the default post options below allows you to place <strong>[tsp_featured_categories]</strong> shortcode tag into any post or page with these options.</li>
						<li>However, if you wish to add different options to the <strong>[tsp_featured_categories]</strong> shortcode please use the following settings:
							<ul style="padding-left: 30px;">
								<li>Title: <strong>title="Title of Posts"</strong></li>
								<li>Number Categories: <strong>numbercats="5"</strong></li>
								<li>Parent Category: <strong>parentcat="5"</strong></li>
								<li>Category Type: <strong>cattype="all"</strong>(Options: all, featured)</li>
								<li>Hide Empty Categories: <strong>hideempty="1"</strong>(Options: 0,1)[0=No, 1=Yes]</li>
								<li>Hide Description: <strong>hidedesc="N"</strong>(Options: Y, N)</li>
								<li>Max Chars for Description: <strong>maxdesc="60"</strong></li>
								<li>Layout: <strong>layout="0"</strong>(Options: 0, 1, 2)
									<ul style="padding-left: 30px;">
										<li>0: Image (left), Title, Text (right) [Horizontal]</li>
										<li>1: Image (left), Title, Text (right) [Vertical]</li>
										<li>2: Scrolling Gallery [Horizontal]</li>
									</ul>
								</li>
								<li>Order By: <strong>orderby="rand"</strong>(Options: rand,name,date,count,ID)</li>
								<li>Thumbnail Width: <strong>widththumb="80"</strong></li>
								<li>Thumbnail Height: <strong>heightthumb="80"</strong></li>
								<li>HTML Tag Before Title: <strong>beforetitle="&lt;h3&gt;"</strong></li>
								<li>HTML Tag After Title: <strong>aftertitle="&lt;/h3&gt;"</strong></li>
							</ul>
						</li>
						<li>Insert your desired shortcode into any page or post.</li>
					</ul>
					<hr>
					A shortcode with all the options will look like the following:<br><br>
					<strong>[tsp_featured_categories title="Featured Categories"  numbercats="3" cattype="all" hideempty="1" hidedesc="N" maxdesc="60" layout="0" parentcat="3" orderby="count" widththumb="80" heightthumb="80" beforetitle="" aftertitle=""]</strong>
				</div>
			</div>
			<script>
				jQuery("div.tsp_container a.toggle").click(function () {
					jQuery(".note-details").toggle();
				});
			</script>
		</div><!-- 8u -->
	</div><!-- row -->
</div><!-- tsp_container -->
<?php } 

// register settings function
function fn_tsp_featured_categories_register_settings() {

	global $TSPFC_DEFAULTS,$TSPFC_OPTIONS;
			
	// install the option defaults
	if( !get_option( 'tsp_featured_categories_options' ) ) 
	{
		add_option( 'tsp_featured_categories_options', $TSPFC_DEFAULTS, '', 'yes' );
	}

	$TSPFC_OPTIONS = get_option( 'tsp_featured_categories_options' );// get options from the database
	
	// array merge incase this version has added new options
	
	if (empty($TSPFC_OPTIONS))
	{
		$TSPFC_OPTIONS = $TSPFC_DEFAULTS;
	}
	else
	{
		$TSPFC_OPTIONS = array_merge($TSPFC_DEFAULTS, $TSPFC_OPTIONS);
	}//endelse
}

function fn_tsp_featured_categories_add_admin_menu() 
{
	add_menu_page( 'TSP Plugins', 'TSP Plugins', 'manage_options', 'tsp_plugins', 'fn_tsp_plugins_add_menu_render', WP_CONTENT_URL."/plugins/tsp_featured_categories/images/tsp_icon_16.png", 2617638); 
	add_submenu_page('tsp_plugins', __( 'Featured Categories', 'tsp_featured_categories' ), __( 'Featured Categories', 'tsp_featured_categories' ), 'manage_options', "tsp_featured_categories.php", 'fn_tsp_featured_categories_settings_page');

	//call register settings function
	add_action( 'admin_init', 'fn_tsp_featured_categories_register_settings' );
}

function fn_tsp_featured_categories_plugin_init() 
{
}

function fn_tsp_featured_categories_delete_options() {
	delete_option( 'tsp_featured_categories_options' );
}

function fn_tsp_featured_categories_admin_head() 
{
	wp_register_script( 'tsp_plugin_skel_min', plugins_url( 'js/skel.min.js', __FILE__ ) );
	wp_enqueue_script( 'tsp_plugin_skel_min' );

	wp_register_style( 'tspfc_admin_stylesheet', plugins_url( 'css/style.css', __FILE__ ) );
	wp_enqueue_style( 'tspfc_admin_stylesheet' );
}

// Add global setting for Captcha
$TSPFC_OPTIONS = get_option( 'tsp_featured_categories_options' );// get the options from the database

add_action( 'init', 'fn_tsp_featured_categories_plugin_init' );
add_action( 'admin_init', 'fn_tsp_featured_categories_plugin_init' );
add_action( 'admin_menu', 'fn_tsp_featured_categories_add_admin_menu' );
add_action( 'admin_enqueue_scripts', 'fn_tsp_featured_categories_admin_head' );

register_uninstall_hook( __FILE__, 'fn_tsp_featured_categories_delete_options' );


?>