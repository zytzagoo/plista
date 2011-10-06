<?php
	/***
	Plugin Name: plista
	Plugin URI: http://www.plista.com
	Description: Plugin for displaying plista Recommendations
	Author: msch (wordpress@plista.com)
	Version: 1.2
	Author URI: http://www.plista.com
	***/

	/* check php and wordpress version */
	global $wp_version;
	$exit_msg_wp='plista requires WordPress 2.5 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';
	$exit_msg_php='plista requires php 5.2 or newer. Your are using PHP Version: '.PHP_VERSION.'. Please contact wordpress@plista.com if you get this message.';
	if ((version_compare($wp_version,"2.5","<")) && (version_compare(PHP_VERSION,"5.2","<"))){
		exit ($exit_msg_wp.'<br />'.$exit_msg_php);
	}
	else if (version_compare(PHP_VERSION,"5.2","<=")){
		exit ($exit_msg_php);
	}
	else if (version_compare($wp_version,"2.5","<")){
		exit ($exit_msg_wp);
	}

	$plugin_path = plugin_basename( dirname( __FILE__ ) .'/lang' );
    	load_plugin_textdomain( 'plista', '', $plugin_path );

	// autoinsert widget after content or not
	$autoinsert = get_option('plista_autoinsert');
	if ($autoinsert != 'checked="checked"') {
		add_filter('the_content', 'plista_integration');

	}

	function get_youtube_img() {
		global $post, $posts;
		$youtube_img = '';
		ob_start();
		ob_end_clean();
		$pattern = "/http:\/\/www\.youtube\.com\/(v|embed)\/([1-9|_|A-z]+)/";
		$output = preg_match_all($pattern, $post->post_content, $matches);
		$youtubeid = $matches [2] [0];
		$youtube_img = 'http://img.youtube.com/vi/'.$youtubeid.'/0.jpg';
		return $youtube_img;
	}

	// function for finding the first image in a post
	function get_first_plista_image() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$pattern = "/src=[\"']?([^\"']?.*(png|jpg|gif|jpeg))[\"']?/i";
		$output = preg_match_all($pattern, $post->post_content, $matches);
		$first_img = $matches [1] [0];
		
		// add an extra check for img size cause sometimes they use ad pixels in the article
		// ad pixels are normaly only 1px x 1px but too be sure set it to 20px x 20px
		if ($first_img) {
			list($width, $height, $type, $attr) = @getimagesize($first_img);

			if ($height >= '20' && $height >= '20') {
				return $first_img;
			} 
		}
		return '';
	}
	
	// return the plista js
	function plista_content($plista_data) {
		$widgetname = get_option('plista_widgetname');  
       	$jspath = get_option('plista_jspath');
		$hlcolor = get_option('plista_hlcolor');
		$hlbgcolor = get_option('plista_hlbgcolor');
		$imgsize = get_option('plista_imgsize');
		$imgheight = get_option('plista_imgheight');
		$ttlcolor = get_option('plista_ttlcolor');
		$ttlsize = get_option('plista_ttlsize');
		$txtcolor = get_option('plista_txtcolor');
		$txtsize = get_option('plista_txtsize');
		$txthover = get_option('plista_txthover');
		$editcss = get_option('plista_editcss');
		$setpicads = get_option('plista_setpicads');
		$setblacklist = get_option('plista_setblacklist');
		$blacklistpicads = get_option('plista_blacklistpicads');
		$blacklistrecads = get_option('plista_blacklistrecads');
		$categories = get_option('plista_categories');
		$cat_ID = array();
		$post_categories = get_the_category(); //get all categories for this post
		foreach($post_categories as $category) {
			array_push($cat_ID,$category->cat_ID);
		}
		$iscategory = is_array($categories) ? array_intersect($cat_ID, $categories) : '';
		$plistacss || $plistapicads = '';
		$postid = get_the_ID();
		$ispiclist = array_search((string)$postid, explode(',', $blacklistpicads));
		$isreclist = array_search((string)$postid, explode(',', $blacklistrecads));
		if ($editcss == 'checked="checked"') {
				$plistacss = "var sn = document.createElement('style');
				sn.setAttribute('type', 'text/css');
				var tn = document.createTextNode('.plistaWidgetHead {color: ".$hlcolor." !important;background-color: ".$hlbgcolor." !important;}.plistaItem img {width: ".$imgsize." !important;max-height: ".$imgheight." !important;}.itemTitle {color: ".$ttlcolor." !important;font-size: ".$ttlsize." !important}.itemText {color: ".$txtcolor." !important;font-size: ".$txtsize." !important}.itemMore {color: ".$txtcolor." !important;}.plistaWidgetList a:hover,.plistaWidgetList a:active,.plistaWidgetList a:focus{background-color:  ".$txthover."  !important}.itemDate{color: ".$datecolor." !Important;font-size: ".$datesize." !Important;}'),
				ht = document.getElementsByTagName('head')[0];
				sn.appendChild(tn);
				ht.appendChild(sn)";
		}

		if ($setpicads == 'checked="checked"' && $ispiclist === false) {
				$plistapicads = 'PLISTA.pictureads.enable(true);';
		}

		$plistapush = json_encode($plista_data);
		//blacklist some pages where widget should never be shown
		if ($isreclist === false && empty($iscategory)) {
			if(strpos($_SERVER['REQUEST_URI'], '/attachment/') == false) {
				if((is_single() || is_page()) &&
					!is_attachment() &&
					!is_admin() &&
					get_post_status() != 'private' &&
					!post_password_required() &&
					!is_404() &&
					!is_preview() &&
					!is_feed() &&
					!is_trackback() &&
					!is_archive() &&
					!is_search()) {

					return '<!-- plista wp Version 1.1 - PHP Version: '.PHP_VERSION.'--><div id="'.$widgetname.'"></div>
					<script type="text/javascript" src="'.$jspath.'"></script>
					<script type="text/javascript">
						/* <![CDATA[ */
						PLISTA.items.push('.$plistapush.');
						'.$plistapicads.'
						PLISTA.partner.init();
						'.$plistacss.'
						/* //]]> */
					</script>';

				}
			} 
		}
	}

	// get current objectid, title, text, url and image
	function plista_integration ($content) {
		global $post;
		$text = get_the_content();
		// filter all the bad stuff out
		$bad = array(
			'@<script[^>]*?>.*?</script>@si',	// strip out javascript
			'@<iframe[^>]*?>.*?</iframe>@si',	// strip out iframe
			'@<style[^>]*?>.*?</style>@siU',	// strip style tags properly
			'@<[\/\!]*?[^<>]*?>@si',			// strip out HTML tags
			'@<![\s\S]*?--[ \t\n\r]*>@'			// strip multi-line comments including CDATA
		);
		$text = strip_tags(preg_replace($bad, '', $text));
		// strip out caption tags
		$text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text );
		$id = get_the_id();
		$youtubepattern = "/http:\/\/www\.youtube\.com\/(v|embed)\/([1-9|_|A-z]+)/";
		$isyoutube = preg_match($youtubepattern, $post->post_content);

		// first try to get the article thumbnail image
		if ( function_exists('has_post_thumbnail') && has_post_thumbnail($id) ) {
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), full );
			$imgsrc = $thumbnail[0];	
		// if we couldn't find one, check for other images in the article
		} else if (!empty($isyoutube)) {
			$imgsrc = get_youtube_img();
		} else {
			$imgsrc = get_first_plista_image();
		}

		$content .= plista_content(array(
			'objectid' => get_the_id(),
			'title' => get_the_title(),
			'text' => $text,
			'url' => get_permalink(),
			'img' => $imgsrc
		));

		return $content;
	}


	// plista admin
	function plista_admin() {
		include('plista_integration_admin.php');
	}

	// only allow access to plista admin Menu if user is admin
	add_action('admin_menu', 'plista_admin_actions');

	function plista_admin_actions() {
		if( current_user_can('level_10')) {
			wp_enqueue_style( 'plista-admin', plugins_url('/css/plista-admin.css', __FILE__), array(), '1.0' );
			add_options_page("plista", "plista", 1, "plista", "plista_admin");
		}

	}
?>
