<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/admin/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/admin/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();


// General Settings

$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading"
				);


$of_options[] = array( 	"name" 		=> "Favicon",
						"desc" 		=> "You can put url of an ico image that will represent your website's favicon (16px x 16px).",
						"id" 		=> "favicon",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> "",
						"type" 		=> "upload"
				);

$of_options[] = array( "name" => "Apple iPhone Icon Upload",
					"desc" => "Icon for Apple iPhone (57px x 57px)",
					"id" => "iphone_icon",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => "Apple iPhone Retina Icon Upload",
					"desc" => "Icon for Apple iPhone Retina Version (114px x 114px)",
					"id" => "iphone_icon_retina",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => "Apple iPad Icon Upload",
					"desc" => "Icon for Apple iPhone (72px x 72px)",
					"id" => "ipad_icon",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => "Apple iPad Retina Icon Upload",
					"desc" => "Icon for Apple iPad Retina Version (144px x 144px)",
					"id" => "ipad_icon_retina",
					"std" => "",
					"type" => "upload");

$of_options[] = array( 	"name" 		=> "Twitter",
						"desc" 		=> "",
						"id" 		=> "twitter_intro",
						"std" 		=> "<h3>Twitter Options</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

$of_options[] = array( "name" => "Tweet Limit",
					"desc" => "Enter tweets limit number",
					"id" => "tweet_limit",
					"std" => "20",
					"type" => "text");

$of_options[] = array( "name" => "Twitter Username",
					"desc" => "Twitter Username",
					"id" => "twitter_username",
					"std" => "CfEntrepreneurs",
					"type" => "text");

$of_options[] = array( "name" => "Twitter Consumer Key",
					"desc" => "Twitter Consumer Key",
					"id" => "consumer_key",
					"std" => "y0tCjLKHedYBfc8ccqcW80Pyp",
					"type" => "text");

$of_options[] = array( "name" => "Twitter Consumer Secret",
					"desc" => "Twitter Consumer Secret",
					"id" => "consumer_secret",
					"std" => "CEfZFbSmyGVKrsC40LsQsE5vMTXrHr8jypJj7IcYUXvsf0eU9U",
					"type" => "text");

$of_options[] = array( "name" => "Twitter Access Token",
					"desc" => "Twitter Access Token",
					"id" => "access_token",
					"std" => "1259140800-Su7I5UougCVCF9fjIDfxuJtWuQLht3ExYzKkLsH",
					"type" => "text");

$of_options[] = array( "name" => "Twitter Access Token Secret",
					"desc" => "Twitter Access Token Secret",
					"id" => "access_token_secret",
					"std" => "oJhLqAeUrYhaZbMNqkOjDrgIRZ5jWUtGBRuMm5vkI8HnX",
					"type" => "text");


$of_options[] = array( 	"name" 		=> "Tracking",
						"desc" 		=> "",
						"id" 		=> "tracking_intro",
						"std" 		=> "<h3>Tracking Code</h3>",
						"icon" 		=> true,
						"type" 		=> "info"
				);

				
$of_options[] = array( 	"name" 		=> "Tracking Code",
						"desc" 		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		=> "google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea"
				);
$of_options[] = array( "name" => "Space before &lt;/head&gt;",
					"desc" => "Add code before the &lt;/head&gt; tag.",
					"id" => "space_head",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => "Space before &lt;/body&gt;",
					"desc" => "Add code before the &lt;/body&gt; tag.",
					"id" => "space_body",
					"std" => "",
					"type" => "textarea");
				
				

// Header Settings

$of_options[] = array( 	"name" 		=> "Header Settings",
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => "Header Top Margin",
					"desc" => "(in pixels)",
					"id" => "margin_header_top",
					"std" => "0px",
					"type" => "text");

$of_options[] = array( "name" => "Header Bottom Margin",
					"desc" => "(in pixels)",
					"id" => "margin_header_bottom",
					"std" => "0px",
					"type" => "text");



$of_options[] = array( 	"name" 		=> "Main Logo",
						"desc" 		=> "Upload logo.",
						"id" 		=> "upload_logo",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> get_bloginfo('template_directory')."/images/logo.png",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Reduced Logo",
						"desc" 		=> "Upload logo.",
						"id" 		=> "upload_logo_reduced1",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> get_bloginfo('template_directory')."/images/logo.png",
						"type" 		=> "upload"
				);



$of_options[] = array( "name" => "Logo (Retina Version @2x)",
					"desc" => "Please choose an image file for the retina version of the logo. It should be 2x the size of main logo.",
					"id" => "logo_retina",
					"std" => "",
					"mod" => "",
					"type" => "media");

$of_options[] = array( "name" => "Standard Logo Width for Retina Logo",
					"desc" => "If retina logo is uploaded, please enter the standard logo (1x) version width, do not enter the retina logo width.",
					"id" => "retina_logo_width",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Standard Logo Height for Retina Logo",
					"desc" => "If retina logo is uploaded, please enter the standard logo (1x) version height, do not enter the retina logo height.",
					"id" => "retina_logo_height",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Logo Alignment",
					"desc" => "Note: center only works on 5th header layout",
					"id" => "logo_alignment",
					"std" => "Left",
					"type" => "select",
					"options" => array('left' => 'Left', 'center' => 'Center', 'right' => 'Right',));

$of_options[] = array( "name" => "Logo Left Margin",
					"desc" => "(in pixels)",
					"id" => "margin_logo_left",
					"std" => "0px",
					"type" => "text");

$of_options[] = array( "name" => "Logo Right Margin",
					"desc" => "(in pixels)",
					"id" => "margin_logo_right",
					"std" => "0px",
					"type" => "text");

$of_options[] = array( "name" => "Logo Top Margin",
					"desc" => "(in pixels)",
					"id" => "margin_logo_top",
					"std" => "0px",
					"type" => "text");

$of_options[] = array( "name" => "Logo Bottom Margin",
					"desc" => "(in pixels)",
					"id" => "margin_logo_bottom",
					"std" => "0px",
					"type" => "text");
				
$of_options[] = array( 	"name" 		=> "Secondary Logo",
						"desc" 		=> "Upload logo.",
						"id" 		=> "upload_logo_two",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> get_bloginfo('template_directory')."/images/logo.png",
						"type" 		=> "upload"
				);

$of_options[] = array( 	"name" 		=> "Secondary Reduced Logo",
						"desc" 		=> "Upload logo.",
						"id" 		=> "upload_logo_three",
						// Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
						"std" 		=> get_bloginfo('template_directory')."/images/logo.png",
						"type" 		=> "upload"
				);

$of_options[] = array( "name" => "URL of Secondary Logo",
					"desc" => "",
					"id" => "url_secondary_logo",
					"std" => "http://www.startupbritain.co/",
					"type" => "text");



// Styling options

$of_options[] = array( 	"name" 		=> "Styling Options",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Body Background Color",
						"desc" 		=> "Pick a background color for the theme (default: #fff).",
						"id" 		=> "body_background",
						"std" 		=> "",
						"type" 		=> "color"
				);
								
$of_options[] = array( 	"name" 		=> "Footer Background Color",
						"desc" 		=> "Pick a background color for the footer (default: #091e28).",
						"id" 		=> "footer_background",
						"std" 		=> "#091e28",
						"type" 		=> "color"
				);
				
$of_options[] = array( 	"name" 		=> "Body Font",
						"desc" 		=> "Specify the body font properties",
						"id" 		=> "body_font",
						"std" 		=> array('size' => '12px','face' => 'arial','style' => 'normal','color' => '#000000'),
						"type" 		=> "typography"
				);  
				
$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Quickly add some CSS to your theme by adding it to this block.",
						"id" 		=> "custom_css",
						"std" 		=> "",
						"type" 		=> "textarea"
				);

				

// Social sharing links

$of_options[] = array( "name" => "Social Sharing Links",
					"type" => "heading");
					
$of_options[] = array( "name" => "Facebook",
					"desc" => "Place the link you want and facebook icon will appear. To remove it, just leave it blank.",
					"id" => "facebook_link",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Twitter",
					"desc" => "Place the link you want and twitter icon will appear. To remove it, just leave it blank.",
					"id" => "twitter_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Google Plus",
					"desc" => "Place the link you want and g+ icon will appear. To remove it, just leave it blank.",
					"id" => "google_link",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "LinkedIn",
					"desc" => "Place the link you want and linkedin icon will appear. To remove it, just leave it blank.",
					"id" => "linkedin_link",
					"std" => "",
					"type" => "text");



// Custom css

$of_options[] = array( "name" => "Custom CSS",
					"type" => "heading");

$of_options[] = array( "name" => "Advanced CSS Customizations",
					"desc" => "",
					"id" => "advanced_css_intro",
					"std" => "<h3 style='margin: 0;'>Advanced CSS Customizations</h3><p style='margin-bottom:0;'>Paste your css code. Do not include <stlye></stlye> tags or any html tag in this field.</p>",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => "CSS Code",
                    "desc" => "Any custom CSS from the user should go in this field, it will override the theme CSS",
                    "id" => "custom_css",
                    "std" => "",
                    "type" => "textarea");



				
// Backup Options
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
