=== TSP Featured Categories ===
Contributors: thesoftwarepeople, sharrondenice
Donate link: http://www.thesoftwarepeople.com/software/plugins/wordpress/featured-categories-for-wordpress.html
Tags: categories, category, category images, featured categories, display gallery, slider, jquery, moving boxes, the software people
Requires at least: 3.5.1
Tested up to: 3.8
Stable tag: 1.2.1
License: Apache v2.0
License URI: http://www.apache.org/licenses/LICENSE-2.0

Featured Categories allows you to add featured categories with images to your blog's website.

== Description ==

The Software People's (TSP) Featured Categories plugin allows you to add featured categories with images to your blog's website. Featured categories have three (3) layouts and include category thumbnails and scrolling category gallery.

= Shortcodes =

Add a `Featured Categories` to posts and pages by using a shortcode inside your text or evaluated from within your theme. You may override page/post `Featured Categories` options with shortcode attributes defined on the plugin's settings page.

* `[tsp-featured-categories]` - Will display posts with the default options defined in the plugin's settings page.
* `[tsp-featured-categories title="Featured Categories" title_pos="below" number_cats="3" cat_ids="5,3,4" cat_type="all" hide_empty="1" hide_desc="N" max_desc="60" layout="0" parent_cat="3" box_width=500 box_height=300 order_by="count" thumb_width="80" thumb_height="80" before_title="" after_title=""]` - Will override all attributes defined on the plugin's settings page.

== Installation ==

BEFORE YOU BEGIN: Requires the installation and activation of [TSP Easy Dev Latest Version](http://wordpress.org/plugins/tsp-easy-dev)

1. Upload `tsp-featured-categories` to the `/wp-content/plugins/` directory
2. Activate the plugin through the `Plugins` menu in WordPress
3. After installation, refer to the `TSP Featured Categories` settings page for more detailed instructions on setting up your shortcodes.
4. `Featured Categories` widgets can be added to the sidemenu bar by visiting `Appearance > Widgets` and dragging the `TSP Featured Categories` widget to your sidebar menu.
5. Add some widgets to the sidemenu bar, Add shortcodes to pages and posts (see Instructions)
6. View your site
7. Adjust your CSS for your theme by visiting `Appearance > Edit CSS`
8. Adjust the `Sliding Gallery` settings, if necessary, by visiting `Plugins > Editor`, Select `TSP Featured Categories` and edit the `tsp-featured-categories.css` and `js/gallery-scripts.js` files
9. Manipulating the CSS for `#makeMeScrollable` and `#tsp-featured-categories` entries changes the gallery and category styles respectfully

== Frequently asked questions ==

= I've installed the plugin but my posts are not displaying? =

1. Make sure the folder `/wp-content/uploads/` has recursive, 777 permissions
2. Make sure you are listing all `categories` and/or `parent_cat` is empty or the `parent_cat` has children categories.

= How can I display category images at run-time? =

1. You can add similar code to your PHP file. This will display the category title, description and thumbnail at runtime. Remember you can use shortcodes to display category information at design time. 
`
			<div class="row" style="margin: 20px 0px;">
			    <div class="2u">
					<?php 
						// get category ID
						$cat_id =  get_cat_ID( single_cat_title(null,false) );
						
						// get options for tsp featured categories
						$options = get_option('tsp-featured-categories-option-term-data');
 
 						// check to see if the category has term data
						if ( array_key_exists( $cat_id, $options )):
							if ( $options[$cat_id]['image'] != null ):
								// display the image
					?>		
								<img class="image" src="<?php echo $options[$cat_id]['image'];?>" width="125" height="125" border="0">
					<?php
							endif;
						endif;

					?>
			    </div>
			    <div class="10u">
					<h2><?php _e("Browsing category", "site5framework"); ?> / <span><?php single_cat_title(); ?></span></h2>
					<h4><em><?php echo category_description(); ?></em></h4>
			    </div>
			</div>
`

== Screenshots ==

1. Admin area widget settings.
2. Featured Categories displayed on the front-end.
3. Featured Categories gallery.
4. Admin area shortcode settings area.

== Changelog ==

= 1.2.1 =
* Enhancement: Set max width for horizontal display of categories
* Enhancement: Include instructions on how to display categories at runtime
* Enhancement: Allow spaces between commas when listing category IDs
* Enhancement: Replace shortcode setting with shortcode generator

= 1.2.0 =
* Fixed bug. Correctly locates TSP Easy Dev.

= 1.1.9 =
* Fixed bug, incorrect logic with `title_pos` in readme, config & templates

= 1.1.8 =
* New Feature. Added new attribute `title_pos` for title placement options. 
* New Feature. Category image is now clickable.

= 1.1.7 =
* Enhancement. Added new attribute `cat_ids` to support specific categories

= 1.1.6 =
* Enhancement. Updated support link

= 1.1.5 =
* Removed inline function from widget_init hook to support older versions of PHP.

= 1.1.4 =
* Required fix to properly load media upload script.

= 1.1.3 =
* Required fix to properly store new widget/shortcode attributes into database. (Update to Easy Dev 1.2.2).

= 1.1.2 =
* Added back in assets folder

= 1.1.1 =
* Fixed issues with encrypted libraries.

= 1.1.0 =
* Now uses Easy Dev Pro for easy plugin development, <a href="https://twitter.com/#bringbackOOD">#bringbackOOD</a>
* No longer uses a seperate termsdata table in WP database, all data will be copied over on upgrade
* Handled all PHP notices
* Renamed attributes to prevent red spell checks when editing (old attributes still supported)
* Decreased plugin size by using Easy Dev

= 1.0.3 =
* Updated path for smarty compile and cache directories. User no longer required to change directory permissions.

= 1.0.2 =
* Fixed bug that caused images to not be added to posts.

= 1.0.1 =
* Checks for existence of parent settings menu before overwriting it
* Added in default images. TSP Plugins menu icon missing.

= 1.0 =
* Launch

== Upgrade notice ==

= 1.2.1 =
Enhancement. Set max width for horizontal display of categories
Enhancement. Include instructions on how to display categories at runtime
Enhancement. Allow spaces between commas when listing category IDs
Enhancement. Replace shortcode setting with shortcode generator

= 1.2.0 =
Fixed bug. Correctly locates TSP Easy Dev.

= 1.1.9 =
Fixed bug, incorrect logic with `title_pos` in readme, config & templates

= 1.1.8 =
New Features. Added new attribute `title_pos` for title placement options. Category image is now clickable.

= 1.1.7 =
Enhancement. Added new attribute `cat_ids` to support specific categories

= 1.1.6 =
Enhancement. Updated support link

= 1.1.5 =
Required fix to properly initialize widgets for older versions of PHP.

= 1.1.4 =
Required fix to properly load media upload script.

= 1.1.3 =
Required fix to properly store new widget/shortcode attributes into database. (Update to Easy Dev 1.2.2).

= 1.1.2 =
Required Bug Fixes.

= 1.1.1 =
Required Bug Fixes.

= 1.1.0 =
Plugin now requires TSP Easy Dev. Uses TSP Easy Dev Pro. New features.

= 1.0.3 =
Setting directory permissions no longer required.

= 1.0.2 =
Image attachment fix.

= 1.0.1 =
Menu fix. Added in default images.