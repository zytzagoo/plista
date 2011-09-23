<?php
	/***
	Plugin Name: plista
	Plugin URI: http://www.plista.com
	Description: Plugin for displaying plista Recommendations
	Author: msch (wordpress@plista.com)
	Version: 1.1
	Author URI: http://www.plista.com
	*y**/

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

	// autoinsert widget after content or not
	$autoinsert = get_option('plista_autoinsert');
	if ($autoinsert != 'checked="checked"') {
		add_filter('the_content', 'plista_integration');

	}

	// function for finding the first image in a post
	function get_first_plista_image() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches [1] [0];

		return $first_img;
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
		if ($isreclist === false) {
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
			'@<script[^>]*?>.*?</script>@si',	// Strip out javascript
			'@<iframe[^>]*?>.*?</iframe>@si',	// Strip out iframe
			'@<style[^>]*?>.*?</style>@siU',	// Strip style tags properly
			'@<[\/\!]*?[^<>]*?>@si',			// Strip out HTML tags
			'@<![\s\S]*?--[ \t\n\r]*>@'			// Strip multi-line comments including CDATA
		);
		$text = strip_tags(preg_replace($bad, '', $text));
		// strip out caption tags
		$text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text );
		$id = get_the_id();
		// first try to get the article thumbnail image
		if ( function_exists('has_post_thumbnail') && has_post_thumbnail($id) ) {
			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($id), full );
			$imgsrc = $thumbnail[0];
		// if we couldn't find one, check for other images in the article
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

	// only allow access to plista Admin Menu if user is Admin
	add_action('admin_menu', 'plista_admin_actions');

	function plista_admin_actions() {
		if( current_user_can('level_10')) {
			add_options_page("plista", "plista", 1, "plista", "plista_admin");
			}

	}
?>
